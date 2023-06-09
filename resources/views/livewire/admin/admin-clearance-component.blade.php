@section('title', 'List of Barangay Clearance Request')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List Barangay Clearance Request</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">
                                List Barangay Clearance Request
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

            @if(Session::has('clearance_msg'))
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle"></i> {{Session::get('clearance_msg')}}
                </div>
            @endif

            <div class="container-fluid">     
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">List of Barangay Clearance Request</h3>
                                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modalClearance">
                                    Add New Barangay Clearance
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Clearance No</th>
                                            <th>Date Created</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Address</th>

                                            <th>Status</th>

                                            <th>Tool</th>

                                            <th>Valid Document</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-capitalize">
                                        @foreach ($clearances as $clearance)

                                        <tr class="text-capitalize">
                                            <td>{{ $clearance->id }}</td>
                                            <td>{{ $clearance->created_at->toFormattedDateString() }}</td>
                                            <td>{{ $clearance->clearanceFname }}</td>
                                            <td>{{ $clearance->clearanceLname }}</td>
                                            <td>
                                                {{ $clearance->clearanceHousenumber }} {{ $clearance->clearanceStreetname }} 
                                            </td>
                                            
                                            <td>
                                                @if($clearance->clearanceStatus == 'pending')

                                                    <span class="badge bg-warning">Pending</span>

                                                @elseif($clearance->clearanceStatus == 'approved')

                                                    <span class="badge bg-success">Approved</span>

                                                @elseif($clearance->clearanceStatus == 'denied')

                                                    <span class="badge bg-danger">Denied</span>

                                                @elseif($clearance->clearanceStatus == 'processed')

                                                    <span class="badge bg-info">Processed</span>

                                                @elseif($clearance->clearanceStatus == 'claimed')

                                                    <span class="badge bg-success">Claimed</span>

                                                @elseif($clearance->clearanceStatus == 'canceled')

                                                    <span class="badge bg-danger">Canceled</span>

                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.admin-print-clearance', 
                                                        ['clearance_id' => $clearance->id]) }}" 
                                                        rel="noopener" class="btn btn-info" target="__blank">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                    <a href="{{ route('admin.admin-update-clearance', 
                                                        ['clearance_id' => $clearance->id]) }}" 
                                                        rel="noopener" class="btn btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" rel="noopener" class="btn btn-danger" 
                                                        onclick="confirm('Are you sure, You want do delete this Barangay Clearance? ') || 
                                                        event.stopImmediatePropagation()" wire:click.prevent="deleteClearance({{$clearance->id}})">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>

                                                <div class="dropdown show mt-3">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Update Status
                                                    </a>
                                                  
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        @if($clearance->clearanceStatus == 'pending')

                                                        <a href="#" class="dropdown-item"
                                                            wire:click="updateClearanceStatus({{$clearance->id}}, 'approved')">
                                                            <strong class="text-success">
                                                                Approved
                                                            </strong>
                                                        </a>
                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateClearanceStatus({{$clearance->id}}, 'denied')">
                                                            <strong class="text-danger">
                                                                Denied
                                                            </strong>
                                                        </a>
                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateClearanceStatus({{$clearance->id}}, 'canceled')">
                                                            <strong class="text-danger">
                                                                Canceled
                                                            </strong>
                                                        </a>
                                                        @elseif($clearance->clearanceStatus == 'approved')

                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateClearanceStatus({{$clearance->id}}, 'processed')">
                                                            <strong class="text-info">
                                                                Processed
                                                            </strong>
                                                        </a>
                                                        @elseif($clearance->clearanceStatus == 'processed')
                                                        
                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateClearanceStatus({{$clearance->id}}, 'claimed')">
                                                            <strong class="text-success">
                                                                Claimed
                                                            </strong>
                                                        </a>
                                                        @elseif($clearance->clearanceStatus == 'claimed')

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
                                                <a href="{{ URL::to('storage/clearances/'.$clearance->clearanceImage) }}" target="_blank" rel="noopener noreferrer">
                                                    <img alt="Valid Clearance" class="profile-user-img img-fluid img-square"
                                                    src="{{ URL::to('storage/clearances/'.$clearance->clearanceImage) }}" />
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
        {{-- Modal For Barangay Clearance --}}
        <div wire:ignore.self class="modal fade" id="modalClearance">
            <div class="modal-dialog modalClearance">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Barangay Clearance</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <!-- Clearance Form -->
                        <form enctype="multipart/form-data">@csrf
                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>First Name <code>*</code></label>
                                            <input type="text" class="form-control" wire:model="clearanceFname"
                                                    placeholder="First Name" />
                                            @error('clearanceFname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Last Name <code>*</code></label>
                                            <input type="text" class="form-control" wire:model="clearanceLname" 
                                                    placeholder="Last Name"/>
                                            @error('clearanceLname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Middle Initial</label>
                                            <input type="text" class="form-control" wire:model="clearanceMname" 
                                                    placeholder="Middle Initial" minlength="1" maxlength="1" />
                                            @error('clearanceMname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Suffix</label>
                                            <input type="text" class="form-control" wire:model="clearanceSuffix" 
                                                    placeholder="e.x Jr, I, II etc"/>
                                            @error('clearanceSuffix') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>House No. <code>*</code></label>
                                            <input type="number" class="form-control" wire:model="clearanceHousenumber" 
                                                    placeholder="House Number"/>
                                            @error('clearanceHousenumber') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label>Street Name <code>*</code></label>
                                            <select class="form-control" wire:model="clearanceStreetname" required>
                                                <option value="">Select Address</option>
                                                <option value="Bambang Cor Masangkay St">Bambang Cor Masangkay St</option>
                                                <option value="G Masangkay St">G Masangkay St</option>
                                                <option value="Mayhaligue St">Mayhaligue St</option>
                                            </select>
                                            @error('clearanceStreetname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Gender <code>*</code></label>
                                            <select class="form-control" wire:model="clearanceGender">
                                                <option value="">Select Gender</option>
                                                <option value="Female">Female</option>
                                                <option value="Male">Male</option>
                                            </select>
                                            @error('clearanceGender') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Marital Status <code>*</code></label>
                                            <select class="form-control" wire:model="clearanceMaritalstatus">
                                                <option value="">Select Marital Status</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Separated">Separated</option>
                                                <option value="Widowed">Widowed</option>
                                            </select>
                                            @error('clearanceMaritalstatus') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Nationality <code>*</code></label>
                                            <input type="text" class="form-control" wire:model="clearanceNationality" 
                                                    placeholder="e.x Filipino"/>
                                            @error('clearanceNationality') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>
                                                Upload atleast <em>One</em> of Barangay Clearance Requirements 
                                                (e.g Government-Issue ID's like Barangay ID) 
                                                (Max: 1MB)
                                                <code>*</code>
                                            </label>
                                            <input id="clearanceImage" type="file"
                                                class="form-control " required wire:model="clearanceImage">
                                                
                                                @error('clearanceImage') <p class="text-danger">{{ $message }}</p> @enderror
                        
                                        </div>

                                        @if ($clearanceImage)
                                            <p class="card-text">Photo Preview:</p>
                                            <img src="{{ $clearanceImage->temporaryUrl() }}" width="100px" />
                                        @endif

                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" wire:click.prevent="addClearance()"
                                    wire:loading.attr="disabled" :disabled="$formSubmitted">
                                    Add Request
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>