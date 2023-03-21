@section('title', 'List of Barangay Permit Request')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List Barangay Permit Request</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.admin-dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">List Barangay Permit Request</li>
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

            @if(Session::has('brgy_permit_msg'))
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle"></i> {{Session::get('brgy_permit_msg')}}
                </div>
            @endif

            <div class="container-fluid">     
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">List of Barangay Permit Request</h3>
                                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modalPermit">
                                    Add Barangay Permit
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Barangay Permit No</th>
                                            <th>Date Created</th>
                                            <th>Name</th>
                                            <th>Address</th>

                                            <th>Status</th>

                                            <th>Tool</th>
                                            <th>Valid Document</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-capitalize">
                                        @foreach ($barangay_permits->chunk(100) as $row)
                                        @foreach ($row as $barangay_permit)

                                        <tr class="text-capitalize">
                                            <td>{{ $barangay_permit->id }}</td>
                                            <td>{{ $barangay_permit->created_at->toFormattedDateString() }}</td>
                                            <td>
                                                {{ $barangay_permit->barangayPermitName }}
                                            </td>
                                            <td>
                                                {{ $barangay_permit->barangayPermitHousenumber }} {{ $barangay_permit->barangayPermitStreetname }} 
                                            </td>
                                            <td>
                                                @if($barangay_permit->barangayPermitStatus == 'pending')

                                                    <span class="badge bg-warning">Pending</span>

                                                @elseif($barangay_permit->barangayPermitStatus == 'approved')

                                                    <span class="badge bg-success">Approved</span>

                                                @elseif($barangay_permit->barangayPermitStatus == 'denied')

                                                    <span class="badge bg-danger">Denied</span>
                                                    
                                                @elseif($barangay_permit->barangayPermitStatus == 'processed')

                                                    <span class="badge bg-info">Processed</span>

                                                @elseif($barangay_permit->barangayPermitStatus == 'claimed')

                                                    <span class="badge bg-success">Claimed</span>

                                                @elseif($barangay_permit->barangayPermitStatus == 'canceled')

                                                    <span class="badge bg-danger">Canceled</span>

                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.admin-print-barangay-permit', 
                                                        ['barangay_permit_id' => $barangay_permit->id]) }}" 
                                                        rel="noopener" class="btn btn-info" target="__blank">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                    <a href="{{ route('admin.admin-update-barangay-permit', 
                                                        ['barangay_permit_id' => $barangay_permit->id]) }}" 
                                                        rel="noopener" class="btn btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" rel="noopener" class="btn btn-danger" 
                                                        onclick="confirm('Are you sure, You want do delete this barangay permit? ') || 
                                                        event.stopImmediatePropagation()" wire:click.prevent="deleteBarangayPermit({{$barangay_permit->id}})">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>

                                                <div class="dropdown show mt-3">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" 
                                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Update Status
                                                    </a>
                                                  
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        @if($barangay_permit->barangayPermitStatus == 'pending')

                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateBarangayPermitStatus({{$barangay_permit->id}}, 'approved')">
                                                            <strong class="text-success">
                                                                Approved
                                                            </strong>
                                                        </a>
                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateBarangayPermitStatus({{$barangay_permit->id}}, 'denied')">
                                                            <strong class="text-danger">
                                                                Denied
                                                            </strong>
                                                        </a>
                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateBarangayPermitStatus({{$barangay_permit->id}}, 'canceled')">
                                                            <strong class="text-danger">
                                                                Canceled
                                                            </strong>
                                                        </a>
                                                        @elseif($barangay_permit->barangayPermitStatus == 'approved')

                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateBarangayPermitStatus({{$barangay_permit->id}}, 'processed')">
                                                            <strong class="text-info">
                                                                Processed
                                                            </strong>
                                                        </a>
                                                        @elseif($barangay_permit->barangayPermitStatus == 'processed')
                                                        
                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateBarangayPermitStatus({{$barangay_permit->id}}, 'claimed')">
                                                            <strong class="text-success">
                                                                Claimed
                                                            </strong>
                                                        </a>
                                                        @elseif($barangay_permit->barangayPermitStatus == 'claimed')

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
                                                <a href="{{asset('assets/dist/img/barangay-permits/'.$barangay_permit->barangayPermitImage)}}" 
                                                    target="_blank" rel="noopener noreferrer">
                                                    <img alt="Valid Barangay Permit" class="profile-user-img img-fluid img-square"
                                                    src="{{asset('assets/dist/img/barangay-permits/'.$barangay_permit->barangayPermitImage)}}" />
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
        {{-- Modal For Barangay Permit --}}
        <div wire:ignore.self class="modal fade" id="modalPermit">
            <div class="modal-dialog modalPermit">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Adding New Barangay Permit</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <!-- Permit Form -->
                        <form enctype="multipart/form-data">@csrf
                            
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label>Permit Name <code>*</code></label>
                                            <input type="text" class="form-control" wire:model="barangayPermitName"
                                                    placeholder="Permit Name" />
                                            @error('barangayPermitName') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>House No. <code>*</code></label>
                                            <input type="number" class="form-control" wire:model="barangayPermitHousenumber" 
                                                    placeholder="House Number"/>
                                            @error('barangayPermitHousenumber') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Street Name <code>*</code></label>
                                            <select class="form-control" wire:model="barangayPermitStreetname" required>
                                                <option value="">Select Address</option>
                                                <option value="Bambang Cor Masangkay St">Bambang Cor Masangkay St</option>
                                                <option value="G. Masangkay St">G. Masangkay St</option>
                                                <option value="Mayhaligue St">Mayhaligue St</option>
                                                
                                            </select>
                                            @error('barangayPermitStreetname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>
                                                    Upload <em>One</em> of Barangay Permit Requirements 
                                                    (e.g Working Permit, Job Order, Work ID)  
                                                    (Max: 1MB)
                                                    <code>*</code>
                                                </label>
                                                <input id="barangayPermitImage" type="file"
                                                    class="form-control @error('barangayPermitImage') is-invalid @enderror" name="barangayPermitImage"
                                                    value="{{ old('barangayPermitImage') }}" required autocomplete="barangayPermitImage" 
                                                    wire:model="barangayPermitImage">
                                                    
                                                    @error('barangayPermitImage') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" wire:click.prevent="addBarangayPermit()"
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
