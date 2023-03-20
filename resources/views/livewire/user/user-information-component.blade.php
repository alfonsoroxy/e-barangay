@section('title', 'My Information')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">My Information</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('user.user-dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">
                                My Information
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        <i class="fas fa-check-circle"></i> {{Session::get('message')}}
                    </div>
                @endif

                <div class="row text-capitalize">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile" style="text-transform: capitalize;">
                                <div class="profile-username text-center">
                                    <a href="{{ asset('assets/dist/img/verification/'.Auth::user()->image) }}" target="_blank" rel="noopener noreferrer">
                                        <img alt="User Profile" class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('assets/dist/img/verification/'.Auth::user()->image) }}" />
                                    </a>
                                </div>
                                
                                <h3 class="profile-username text-center">
                                    {{ $user->first_name }} {{ $user->mname }} 
                                    {{ $user->last_name }} {{ $user->suffix }}
                                </h3>
              
                                <p class="text-muted text-center">User ID ({{ $user->id }})</p>
              
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <strong>Address</strong> 
                                        <a class="float-right">
                                            {{ $user->houseNumber }} {{ $user->streetName }},
                                            Tondo Manila
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Age</strong> 
                                        <a class="float-right">
                                            {{ auth()->user()->getAge() }}
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Nationality</strong> 
                                        <a class="float-right">
                                            {{ $user->nationality }}
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Gender</strong> 
                                        <a class="float-right">
                                            {{ $user->gender }}
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Marital Status</strong> 
                                        <a class="float-right">
                                            {{ $user->maritalStatus }}
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Contact No.</strong> 
                                        <a class="float-right">
                                            {{ $user->contact }}
                                        </a>
                                    </li>
                                    
                                </ul>
              
                                <a href="{{ route('user.user-update-information', ['user_id' => $user->id]) }}" 
                                    class="btn btn-primary btn-block">
                                    <strong>Update my Information</strong>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>