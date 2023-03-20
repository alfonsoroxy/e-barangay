@extends('layouts.layout')
@section('title', 'Update User Privilege')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
           <div class="col-sm-6">
               <h1 class="m-0">Update User Privilege</h1>
           </div>
           <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item"><a href="{{ route('admin.admin-dashboard') }}">Dashboard</a></li>
                   <li class="breadcrumb-item"><a href="{{ url('admin/users')}}">User Privilege</a></li>
                   <li class="breadcrumb-item active">Update User Privilege</li>
                </ol>
           </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update User Privilege</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <p class="form-control bg-light">
                                        {{ $user->first_name }} {{ $user->last_name }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group .bg-light">
                                    <label>Email</label>
                                    <p class="form-control bg-light">
                                        {{ $user->email }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <form action="{{ url('admin/update-user/'.$user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row justify-content-center">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>User Privilege <code>*</code></label>
                                        <select class="form-control" name="is_admin">
                                            <option value="USR" {{ $user->is_admin == 'USR' ? 'selected':''}}>
                                                USR
                                            </option>
                                            <option value="ADM" {{ $user->is_admin == 'ADM' ? 'selected':'' }}>
                                                ADM
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-right">
                                Update Privilege
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection