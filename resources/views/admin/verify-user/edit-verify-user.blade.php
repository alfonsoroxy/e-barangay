@extends('layouts.layout')
@section('title', 'Update Account Status')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
           <div class="col-sm-6">
               <h1 class="m-0">Update Account Status</h1>
           </div>
           <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item"><a href="{{ route('admin.admin-dashboard') }}">Dashboard</a></li>
                   <li class="breadcrumb-item"><a href="{{ url('admin/verify')}}">Account Verification</a></li>
                   <li class="breadcrumb-item active">Update Account Status</li>
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
                        <h3 class="card-title">Update Account Status</h3>
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
                                <div class="form-group">
                                    <label>Email</label>
                                    <p class="form-control bg-light">
                                        {{ $user->email }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <form action="{{ url('admin/update-verify/'.$user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row justify-content-center">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Account Status <code>*</code></label>
                                        <select class="form-control" name="is_resident">
                                            <option value="Approved" {{ $user->is_resident == 'Approved' ? 'selected':''}}>
                                                Approved
                                            </option>
                                            <option value="Denied" {{ $user->is_resident == 'Denied' ? 'selected':'' }}>
                                                Denied
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-right">
                                Update Status
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection