@extends('layouts.layout')
@section('title', 'User Privilege')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
           <div class="col-sm-6">
               <h1 class="m-0">User Privilege</h1>
           </div>
           <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item">
                        <a href="{{ url('admin/dashboard')}}">Dashboard</a>
                    </li>
                   <li class="breadcrumb-item">
                        User Privilege
                    </li>
                </ol>
           </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        <i class="fas fa-check-circle"></i> {{Session::get('message')}}
                    </div>
                @endif
                
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">User Privilege</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Barangay ID</th>
                                    <th>Barangay Profile</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>User Privilege</th>
                                    <th>Tool</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{asset('assets/dist/img/verification/'.Auth::user()->image)}}" target="_blank" rel="noopener noreferrer">
                                            <img alt="User Profile" class="profile-user-img img-fluid img-circle"
                                            src="{{asset('assets/dist/img/verification/'.Auth::user()->image)}}" />
                                        </a>
                                    </td>
                                    <td>{{ $item->first_name }}</td>
                                    <td>{{ $item->last_name}}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if($item->is_admin == 'ADM')

                                            <span class="badge bg-success">Admin</span>

                                        @elseif($item->is_admin == 'USR')

                                            <span class="badge bg-danger">User</span>

                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <div class="btn-group">
                                                <a href="{{ url('admin/users/'.$item->id) }}" 
                                                    rel="noopener" class="btn btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection