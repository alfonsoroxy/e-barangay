@section('title', 'List of Barangay Indigency Request')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List Barangay Indigency Request</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.admin-dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">List Barangay Indigency Request</li>
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

            @if(Session::has('indigency_msg'))
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle"></i> {{Session::get('indigency_msg')}}
                </div>
            @endif

            <div class="container-fluid">     
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">List of Barangay Indigency Request</h3>
                                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modalIndigency">
                                    Add New Barangay Indigency
                                </button>
                            </div>
                            <div class="card-body">

                                <table id="example1" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Indigency No</th>
                                            <th>Date Created</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Address</th>

                                            <th>Purpose</th>
                                            <th>Status</th>

                                            <th>Tool</th>

                                            <th>Valid Document</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($indigencies as $indigency)

                                        <tr class="text-capitalize">
                                            <td>{{ $indigency->id }}</td>
                                            <td>{{ $indigency->created_at->toFormattedDateString() }}</td>
                                            <td>{{ $indigency->indigencyFname }}</td>
                                            <td>{{ $indigency->indigencyLname }}</td>
                                            <td>
                                                {{ $indigency->indigencyHousenumber }} {{ $indigency->indigencyStreetname }} 
                                                {{ $indigency->indigencyMunicipal }} {{ $indigency->indigencyCity }}
                                            </td>
                                            <td>{{ $indigency->indigencyPurpose }}</td>
                                            <td>
                                                @if($indigency->indigencyStatus == 'pending')

                                                    <span class="badge bg-warning">Pending</span>

                                                @elseif($indigency->indigencyStatus == 'approved')

                                                    <span class="badge bg-success">Approved</span>

                                                @elseif($indigency->indigencyStatus == 'denied')

                                                    <span class="badge bg-danger">Denied</span>

                                                @elseif($indigency->indigencyStatus == 'processed')

                                                    <span class="badge bg-info">Processed</span>

                                                @elseif($indigency->indigencyStatus == 'claimed')

                                                    <span class="badge bg-success">Claimed</span>

                                                @elseif($indigency->indigencyStatus == 'canceled')

                                                    <span class="badge bg-danger">Canceled</span>

                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.admin-print-indigency', 
                                                        ['indigency_id' => $indigency->id]) }}" 
                                                        rel="noopener" class="btn btn-info" target="__blank">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                    <a href="{{ route('admin.admin-update-indigency', 
                                                        ['indigency_id' => $indigency->id]) }}" 
                                                        rel="noopener" class="btn btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" rel="noopener" class="btn btn-danger" 
                                                        onclick="confirm('Are you sure, You want do delete this Barangay Indigency? ') || 
                                                        event.stopImmediatePropagation()" wire:click.prevent="deleteIndigency({{$indigency->id}})">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>

                                                <div class="dropdown show mt-3">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" 
                                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Update Status
                                                    </a>
                                                  
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        @if($indigency->indigencyStatus == 'pending')

                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateIndigencyStatus({{ $indigency->id }}, 'approved')">
                                                            <strong class="text-success">
                                                                Approved
                                                            </strong>
                                                        </a>
                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateIndigencyStatus({{ $indigency->id }}, 'denied')">
                                                            <strong class="text-danger">
                                                                Denied
                                                            </strong>
                                                        </a>
                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateIndigencyStatus({{ $indigency->id }}, 'canceled')">
                                                            <strong class="text-danger">
                                                                Canceled
                                                            </strong>
                                                        </a>
                                                        @elseif($indigency->indigencyStatus == 'approved')

                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateIndigencyStatus({{ $indigency->id }}, 'processed')">
                                                            <strong class="text-info">
                                                                Processed
                                                            </strong>
                                                        </a>
                                                        @elseif($indigency->indigencyStatus == 'processed')
                                                        
                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateIndigencyStatus({{ $indigency->id }}, 'claimed')">
                                                            <strong class="text-success">
                                                                Claimed
                                                            </strong>
                                                        </a>
                                                        @elseif($indigency->indigencyStatus == 'claimed')

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
                                                <a href="{{ URL::to('storage/indigencies/'.$indigency->indigencyImage) }}" 
                                                    target="_blank" rel="noopener noreferrer">
                                                    <img alt="Valid Indigency" class="profile-user-img img-fluid img-square"
                                                    src="{{ URL::to('storage/indigencies/'.$indigency->indigencyImage) }}" />
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
        {{-- Modal For Barangay Indigency --}}
        <div wire:ignore.self class="modal fade" id="modalIndigency">
            <div class="modal-dialog modalIndigency">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Barangay Indigency</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <!-- Indigency Form -->
                        <form enctype="multipart/form-data">@csrf
                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>First Name <code>*</code></label>
                                            <input type="text" class="form-control" wire:model="indigencyFname"
                                                    placeholder="First Name" />
                                            @error('indigencyFname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Last Name <code>*</code></label>
                                            <input type="text" class="form-control" wire:model="indigencyLname" 
                                                    placeholder="Last Name"/>
                                            @error('indigencyLname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Middle Initial</label>
                                            <input type="text" class="form-control" wire:model="indigencyMname" 
                                                    placeholder="Middle Initial" minlength="1" maxlength="1" />
                                            @error('indigencyMname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Suffix</label>
                                            <input type="text" class="form-control" wire:model="indigencySuffix" 
                                                    placeholder="e.x Jr, I, II etc"/>
                                            @error('indigencySuffix') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>House No. <code>*</code></label>
                                            <input type="number" class="form-control" wire:model="indigencyHousenumber" 
                                                    placeholder="House Number"/>
                                            @error('indigencyHousenumber') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label>Street Name <code>*</code></label>
                                            <select class="form-control" wire:model="indigencyStreetname" required>
                                                <option value="">Select Address</option>
                                                <option value="Bambang Cor Masangkay St">Bambang Cor Masangkay St</option>
                                                <option value="G Masangkay St">G Masangkay St</option>
                                                <option value="Mayhaligue St">Mayhaligue St</option>
                                            </select>
                                            @error('indigencyStreetname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Purpose <code>*</code></label>
                                            <input type="text" class="form-control" wire:model="indigencyPurpose" 
                                                    placeholder="e.x SSS"/>
                                            @error('indigencyPurpose') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>
                                                Upload atleast <em>One</em> of Barangay Clearance Requirements depends on your Purpose
                                                (
                                                    e.g Government-Issue ID's like Barangay ID, Medical History, 
                                                    Proof of Application of Financial Assistance and PSCO Requirements
                                                ) 
                                                (Max: 1MB)
                                                <code>*</code>
                                            </label>
                                            <input id="indigencyImage" type="file"
                                                class="form-control " required wire:model="indigencyImage">
                                                
                                                @error('indigencyImage') <p class="text-danger">{{ $message }}</p> @enderror
                        
                                        </div>

                                        @if ($indigencyImage)
                                            <p class="card-text">Photo Preview:</p>
                                            <img src="{{ $indigencyImage->temporaryUrl() }}" width="100px" />
                                        @endif

                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" wire:click.prevent="addIndigency()"
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