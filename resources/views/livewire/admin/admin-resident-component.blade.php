@section('title', 'List of Barangay Resident')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List of Barangay Residents</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">
                                List of Barangay Residents
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle"></i> {{Session::get('message')}}
                </div>
            @endif

            <div class="container-fluid">     
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">List of Barangay Residents</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Barangay ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Address</th>

                                            <th>Age</th>
                                            <th>Nationality</th>
                                            <th>Gender</th>
                                            <th>Marital Status</th> 

                                            <th>Contact No</th>

                                            <th>Tool</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)

                                        <tr class="text-capitalize">
                                            
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>
                                                {{ $user->houseNumber }} {{ $user->streetName }}
                                            </td>
                                            <td>{{ auth()->user()->getAge() }}</td>                
                                            <td>{{ $user->nationality }}</td>
                                            <td>{{ $user->gender }}</td>
                                            <td>{{ $user->maritalStatus }}</td>

                                            <td>{{ $user->contact }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.admin-update-resident', 
                                                        ['user_id' => $user->id]) }}" 
                                                        rel="noopener" class="btn btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" rel="noopener" class="btn btn-danger" 
                                                        onclick="confirm('Are you sure, You want do delete this Barangay Resident? ') || 
                                                        event.stopImmediatePropagation()" wire:click.prevent="deleteResident({{$user->id}})">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
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
    </div>
</div>