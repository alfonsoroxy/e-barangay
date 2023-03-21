@section('title', 'List of Business Permit Request')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List Business Permit Request</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">
                                List Business Permit Request
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

            @if(Session::has('business_permit_msg'))
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle"></i> {{Session::get('business_permit_msg')}}
                </div>
            @endif

            <div class="container-fluid">     
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">List of Business Permit Request</h3>
                                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modalBusinessPermit">
                                    Add New Business Permit
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Business Permit No</th>
                                            <th>Date Created</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Address</th>

                                            <th>Business Name</th>
                                            <th>Business Establish</th>
                                            <th>Status</th>

                                            <th>Tool</th>

                                            <th>Valid Document</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-capitalize">
                                        @foreach ($business_permits->chunk(100) as $row)
                                        @foreach ($row as $business_permit)

                                        <tr class="text-capitalize">
                                            <td>{{ $business_permit->id }}</td>
                                            <td>{{ $business_permit->created_at->toFormattedDateString() }}</td>
                                            <td>{{ $business_permit->businessPermitFname }}</td>
                                            <td>{{ $business_permit->businessPermitLname }}</td>
                                            <td>
                                                {{ $business_permit->businessPermitHousenumber }} {{ $business_permit->businessPermitStreetname }}
                                            </td>
                                            <td>{{ $business_permit->businessPermitBusinessname }}</td>
                                            <td>{{ \Carbon\Carbon::parse($business_permit->businessPermitBusinessYearEstablish)->format('Y') }}</td>

                                            <td>
                                                @if($business_permit->businessPermitStatus == 'pending')

                                                    <span class="badge bg-warning">Pending</span>
                                                
                                                @elseif($business_permit->businessPermitStatus == 'approved')

                                                    <span class="badge bg-success">Approved</span>

                                                @elseif($business_permit->businessPermitStatus == 'denied')

                                                    <span class="badge bg-danger">Denied</span>    

                                                @elseif($business_permit->businessPermitStatus == 'processed')

                                                    <span class="badge bg-info">Processed</span>

                                                @elseif($business_permit->businessPermitStatus == 'claimed')

                                                    <span class="badge bg-success">Claimed</span>

                                                @elseif($business_permit->businessPermitStatus == 'canceled')

                                                    <span class="badge bg-danger">Canceled</span>

                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.admin-print-business-permit', 
                                                        ['business_permit_id' => $business_permit->id]) }}" 
                                                        rel="noopener" class="btn btn-info" target="__blank">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                    <a href="{{ route('admin.admin-update-business-permit', 
                                                    ['business_permit_id' => $business_permit->id]) }}" 
                                                    rel="noopener" class="btn btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" rel="noopener" class="btn btn-danger" 
                                                        onclick="confirm('Are you sure, You want do delete this Business Permit? ') || 
                                                        event.stopImmediatePropagation()" wire:click.prevent="deleteBusinessPermit({{$business_permit->id}})">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>

                                                <div class="dropdown show mt-3">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" 
                                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Update Status
                                                    </a>
                                                  
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        @if($business_permit->businessPermitStatus == 'pending')

                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateBusinessPermitStatus({{$business_permit->id}}, 'approved')">
                                                            <strong class="text-success">
                                                                Approved
                                                            </strong>
                                                        </a>
                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateBusinessPermitStatus({{$business_permit->id}}, 'denied')">
                                                            <strong class="text-danger">
                                                                Denied
                                                            </strong>
                                                        </a>
                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateBusinessPermitStatus({{$business_permit->id}}, 'canceled')">
                                                            <strong class="text-danger">
                                                                Canceled
                                                            </strong>
                                                        </a>
                                                        @elseif($business_permit->businessPermitStatus == 'approved')

                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateBusinessPermitStatus({{$business_permit->id}}, 'processed')">
                                                            <strong class="text-info">
                                                                Processed
                                                            </strong>
                                                        </a>
                                                        @elseif($business_permit->businessPermitStatus == 'processed')
                                                        
                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateBusinessPermitStatus({{$business_permit->id}}, 'claimed')">
                                                            <strong class="text-success">
                                                                Claimed
                                                            </strong>
                                                        </a>
                                                        @elseif($business_permit->businessPermitStatus == 'claimed')

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
                                                <a href="{{asset('assets/dist/img/business-permits/'.$business_permit->businessPermitImage)}}" 
                                                    target="_blank" rel="noopener noreferrer">
                                                    <img alt="Valid Business Permit" class="profile-user-img img-fluid img-square"
                                                    src="{{asset('assets/dist/img/business-permits/'.$business_permit->businessPermitImage)}}" />
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
        {{-- Modal For Business Permit --}}
        <div wire:ignore.self class="modal fade" id="modalBusinessPermit">
            <div class="modal-dialog modalBusinessPermit">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Business Permit</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <!-- Business Permit Form -->
                        <form enctype="multipart/form-data">@csrf
                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>First Name <code>*</code></label>
                                            <input type="text" class="form-control" wire:model="businessPermitFname"
                                                    placeholder="First Name" />
                                            @error('businessPermitFname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Last Name <code>*</code></label>
                                            <input type="text" class="form-control" wire:model="businessPermitLname" 
                                                    placeholder="Last Name"/>
                                            @error('businessPermitLname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Middle Initial</label>
                                            <input type="text" class="form-control" wire:model="businessPermitMname" 
                                                placeholder="Middle Initial" minlength="1" maxlength="1" />
                                            @error('businessPermitMname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Suffix</label>
                                            <input type="text" class="form-control" wire:model="businessPermitSuffix" 
                                                    placeholder="e.x Jr, I, II etc"/>
                                            @error('businessPermitSuffix') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Business Name <code>*</code></label>
                                            <input type="text" class="form-control" wire:model="businessPermitBusinessname" 
                                                    placeholder="Busines Name"/>
                                            @error('businessPermitBusinessname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Business Establish <code>*</code></label>
                                            <input type="date" class="form-control" 
                                                    wire:model="businessPermitBusinessYearEstablish" />
                                            @error('businessPermitBusinessYearEstablish') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>House No. <code>*</code></label>
                                            <input type="number" class="form-control" wire:model="businessPermitHousenumber" 
                                                    placeholder="House Number"/>
                                            @error('businessPermitHousenumber') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label>Street Name <code>*</code></label>
                                            <select class="form-control" wire:model="businessPermitStreetname" required>
                                                <option value="">Select Address</option>
                                                <option value="Bambang Cor Masangkay St">Bambang Cor Masangkay St</option>
                                                <option value="G Masangkay St">G Masangkay St</option>
                                                <option value="Mayhaligue St">Mayhaligue St</option>
                                            </select>
                                            @error('businessPermitStreetname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>
                                                Upload atleast <em>One</em> of Business Permit Requirements 
                                                (e.g Business Permit, DTI) 
                                                (Max: 1MB)
                                                <code>*</code>
                                            </label>
                                            <input id="businessPermitImage" type="file"
                                                class="form-control @error('businessPermitImage') is-invalid @enderror" name="businessPermitImage"
                                                value="{{ old('businessPermitImage') }}" required autocomplete="businessPermitImage" 
                                                wire:model="businessPermitImage">
                                                
                                                @error('businessPermitImage') <p class="text-danger">{{ $message }}</p> @enderror
                        
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" wire:click.prevent="addBusinessPermit()"
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