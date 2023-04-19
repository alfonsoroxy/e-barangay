@section('title', 'List of First Time Job Seeker Request')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List First Time Job Seeker Request</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">
                                List First Time Job Seeker Request
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

            @if(Session::has('job_seeker_msg'))
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle"></i> {{Session::get('job_seeker_msg')}}
                </div>
            @endif

            <div class="container-fluid">     
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">List of First Time Job Seeker Request</h3>
                                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modalJobSeeker">
                                    Add New First Time Job Seeker
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Job Seeker No</th>
                                            <th>Date Created</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Address</th>

                                            <th>Age</th>
                                            <th>Year Stay in Barangay</th>
                                            <th>Status</th>

                                            <th>Tool</th>

                                            <th>Valid Document</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-capitalize">
                                        @foreach ($job_seekers as $job_seeker)

                                        <tr class="text-capitalize">
                                            <td>{{ $job_seeker->id }}</td>
                                            <td>{{ $job_seeker->created_at->toFormattedDateString() }}</td>
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
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.admin-print-job-seeker', 
                                                        ['job_seeker_id' => $job_seeker->id]) }}" 
                                                        rel="noopener" class="btn btn-info" target="__blank">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                    <a href="{{ route('admin.admin-update-job-seeker', 
                                                        ['job_seeker_id' => $job_seeker->id]) }}" 
                                                        rel="noopener" class="btn btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" rel="noopener" class="btn btn-danger" 
                                                        onclick="confirm('Are you sure, You want do delete this First Time Job Seeker? ') || 
                                                        event.stopImmediatePropagation()" wire:click.prevent="deleteJobSeeker({{$job_seeker->id}})">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>

                                                <div class="dropdown show mt-3">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" 
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Update Status
                                                    </a>
                                                  
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        @if($job_seeker->jobSeekerStatus == 'pending')

                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateJobSeekerStatus({{$job_seeker->id}}, 'approved')">
                                                            <strong class="text-success">
                                                                Approved
                                                            </strong>
                                                        </a>
                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateJobSeekerStatus({{$job_seeker->id}}, 'denied')">
                                                            <strong class="text-danger">
                                                                Denied
                                                            </strong>
                                                        </a>
                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateJobSeekerStatus({{$job_seeker->id}}, 'canceled')">
                                                            <strong class="text-danger">
                                                                Canceled
                                                            </strong>
                                                        </a>
                                                        @elseif($job_seeker->jobSeekerStatus == 'approved')

                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateJobSeekerStatus({{$job_seeker->id}}, 'processed')">
                                                            <strong class="text-info">
                                                                Processed
                                                            </strong>
                                                        </a>
                                                        @elseif($job_seeker->jobSeekerStatus == 'processed')
                                                        
                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateJobSeekerStatus({{$job_seeker->id}}, 'claimed')">
                                                            <strong class="text-success">
                                                                Claimed
                                                            </strong>
                                                        </a>
                                                        @elseif($job_seeker->jobSeekerStatus == 'claimed')

                                                        <a href="#" class="dropdown-item">
                                                            <em>NULL</em>
                                                        </a>
                                                        @else
                                                        <a href="#" class="dropdown-item">
                                                            <em>NULL</em>
                                                        </a>

                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ asset('storage/job-seekers/'.$job_seeker->jobSeekerImage) }}" 
                                                    target="_blank" rel="noopener noreferrer">
                                                    <img alt="Valid Job Seeker" class="profile-user-img img-fluid img-square"
                                                    src="{{ asset('storage/job-seekers/'.$job_seeker->jobSeekerImage) }}" />
                                                </a>
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
        {{-- Modal For First Time Job Seeker --}}
        <div wire:ignore.self class="modal fade" id="modalJobSeeker">
            <div class="modal-dialog modalJobSeeker">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New First Time Job Seeker</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="container">
                        <div class="modal-body">
                        
                            <!-- First Time Job Seeker Form -->
                            <form enctype="multipart/form-data">@csrf
                                
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>First Name <code>*</code></label>
                                                <input type="text" class="form-control" wire:model="jobSeekerFname"
                                                        placeholder="First Name" />
                                                @error('jobSeekerFname') <p class="text-danger">{{ $message }}</p> @enderror

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Last Name <code>*</code></label>
                                                <input type="text" class="form-control" wire:model="jobSeekerLname" 
                                                        placeholder="Last Name"/>
                                                @error('jobSeekerLname') <p class="text-danger">{{ $message }}</p> @enderror

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Middle Initial</label>
                                                <input type="text" class="form-control" wire:model="jobSeekerMname" 
                                                        placeholder="Middle Initial" minlength="1" maxlength="1" />
                                                @error('jobSeekerMname') <p class="text-danger">{{ $message }}</p> @enderror

                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Suffix</label>
                                                <input type="text" class="form-control" wire:model="jobSeekerSuffix" 
                                                        placeholder="e.x Jr, I, II etc"/>
                                                @error('jobSeekerSuffix') <p class="text-danger">{{ $message }}</p> @enderror

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Date Of Birth <code>*</code></label>
                                                <input type="date" class="form-control" 
                                                        wire:model="jobSeekerAge" required/>
                                                @error('jobSeekerAge') <p class="text-danger">{{ $message }}</p> @enderror

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Date of Stay in Barangay<code>*</code></label>
                                                <input type="date" class="form-control"
                                                        wire:model="jobSeekerResidentstayyears" required/>
                                                @error('jobSeekerResidentstayyears') <p class="text-danger">{{ $message }}</p> @enderror

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>House No. <code>*</code></label>
                                                <input type="number" class="form-control" wire:model="jobSeekerHousenumber" 
                                                        placeholder="House Number"/>
                                                @error('jobSeekerHousenumber') <p class="text-danger">{{ $message }}</p> @enderror

                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <label>Street Name <code>*</code></label>
                                                <select class="form-control" wire:model="jobSeekerStreetname" required>
                                                    <option value="">Select Address</option>
                                                    <option value="Bambang Cor Masangkay St">Bambang Cor Masangkay St</option>
                                                    <option value="G Masangkay St">G Masangkay St</option>
                                                    <option value="Mayhaligue St">Mayhaligue St</option>
                                                </select>
                                                @error('jobSeekerStreetname') <p class="text-danger">{{ $message }}</p> @enderror

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Gender <code>*</code></label>
                                                <select class="form-control" wire:model="jobSeekerGender">
                                                    <option value="">Select Gender</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Male">Male</option>
                                                </select>
                                                @error('jobSeekerGender') <p class="text-danger">{{ $message }}</p> @enderror

                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Marital Status <code>*</code></label>
                                                <select class="form-control" wire:model="jobSeekerMaritalstatus">
                                                    <option value="">Select Marital Status</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Separated">Separated</option>
                                                    <option value="Widowed">Widowed</option>
                                                </select>
                                                @error('jobSeekerMaritalstatus') <p class="text-danger">{{ $message }}</p> @enderror

                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Nationality <code>*</code></label>
                                                <input type="text" class="form-control" wire:model="jobSeekerNationality" 
                                                        placeholder="e.x Filipino"/>
                                                @error('jobSeekerNationality') <p class="text-danger">{{ $message }}</p> @enderror

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>
                                                    Upload atleast <em>One</em> of First Time Job Seeker Requirements
                                                    (
                                                        e.g Government-Issue ID's like Barangay ID, 
                                                        Proof that your 18 years old and above or
                                                        other requirements that is included in the 
                                                        document requirements
                                                    ) 
                                                    (Max: 1MB)
                                                    <code>*</code>
                                                </label>
                                                <input id="jobSeekerImage" type="file"
                                                    class="form-control " required wire:model="jobSeekerImage">
                                                    
                                                    @error('jobSeekerImage') <p class="text-danger">{{ $message }}</p> @enderror
                            
                                            </div>

                                            @if ($jobSeekerImage)
                                                <p class="card-text">Photo Preview:</p>
                                                <img src="{{ $jobSeekerImage->temporaryUrl() }}" width="100px" />
                                            @endif

                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" wire:click.prevent="addJobSeeker()"
                                        wire:loading.attr="disabled">
                                        Add
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
