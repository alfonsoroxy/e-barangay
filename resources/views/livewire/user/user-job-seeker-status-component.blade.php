@section('title', 'First Time Job Seeker Status')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">First Time Job Seeker Status</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('user.user-dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                    <a href="{{ route('user.user-job-seeker') }}">
                                        First Time Job Seeker
                                    </a>
                                </li>
                            <li class="breadcrumb-item active">First Time Job Seeker Status</li>
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

                        @if(Session::has('job_seeker_msg'))
                            <div class="alert alert-success" role="alert">
                            <i class="fas fa-check-circle"></i> {{Session::get('job_seeker_msg')}}
                        </div>
                        @endif

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">List of First Time Job Seeker Request</h3>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Job Seeker No</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Address</th>

                                            <th>Age</th>
                                            <th>Year Stay in Barangay</th>

                                            <th>Status</th>
                                            <th>Update Status</th>
                                            <th>Valid Document</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($job_seekers->chunk(100) as $row)
                                        @foreach ($row as $job_seeker)
                                        
                                        <tr class="text-capitalize">
                                            <td>{{ $job_seeker->id }}</td>
                                            <td>{{ $job_seeker->jobSeekerFname }}</td>
                                            <td>{{ $job_seeker->jobSeekerLname }}</td>
                                            <td>
                                                {{ $job_seeker->jobSeekerHousenumber }} {{ $job_seeker->jobSeekerStreetname }} 
                                                {{-- {{ $job_seeker->jobSeekerMunicipal }} {{ $job_seeker->jobSeekerCity }} --}}
                                            </td>
                                            <td>{{ $job_seeker->age() }}</td>
                                            <td>
                                                {{ $job_seeker->getStayYears()}}
                                            </td>
                                            <td>
                                                @if($job_seeker->jobSeekerStatus == 'pending')

                                                    <span class="badge bg-warning">Pending</span>

                                                @elseif($job_seeker->jobSeekerStatus == 'approved')

                                                    <span class="badge bg-success">Approved</span>

                                                @elseif($job_seeker->jobSeekerStatus == 'denied')

                                                    <span class="badge bg-danger">Denied</span>

                                                @elseif($job_seeker->jobSeekerStatus == 'processed')

                                                    <span class="badge bg-info">Processed</span>

                                                @elseif($job_seeker->jobSeekerStatus == 'claimed')

                                                    <span class="badge bg-success">Claimed</span>

                                                @elseif($job_seeker->jobSeekerStatus == 'canceled')

                                                    <span class="badge bg-danger">Canceled</span>

                                                @endif
                                            </td>
                                            <td>
                                                @if($job_seeker->jobSeekerStatus == 'pending')

                                                    <button class="btn btn-danger"  
                                                        wire:click.prevent="cancelJobSeeker({{$job_seeker->id}}, 'canceled')">
                                                        <strong>Cancel Request</strong>
                                                    </button>

                                                @else

                                                    <em>NULL</em>
                                                
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ asset('assets/dist/img/job-seekers/'.$job_seeker->jobSeekerImage) }}" 
                                                    target="_blank" rel="noopener noreferrer">
                                                    <img alt="Valid Job Seeker" class="profile-user-img img-fluid img-square"
                                                    src="{{ asset('assets/dist/img/job-seekers/'.$job_seeker->jobSeekerImage) }}" />
                                                </a>
                                            </td>                                      
                                        </tr>
                                        @endforeach
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