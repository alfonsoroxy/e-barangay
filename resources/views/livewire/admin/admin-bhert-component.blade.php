@section('title', 'List of BHERT Certificate Request')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List BHERT Certificate Request</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">List BHERT Certificate Request</li>
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

            @if(Session::has('bhert_msg'))
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle"></i> {{Session::get('bhert_msg')}}
                </div>
            @endif

            <div class="container-fluid">     
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">List of BHERT Certificate Request</h3>
                                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modalBHERT">
                                    Add New BHERT Certificate
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>BHERT No</th>
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
                                    <tbody class="text-capitalize">
                                        @foreach ($bherts as $bhert)

                                        <tr class="text-capitalize">
                                            <td>{{ $bhert->id }}</td>
                                            <td>{{ $bhert->created_at->toFormattedDateString() }}</td>
                                            <td>{{ $bhert->bhertFname }}</td>
                                            <td>{{ $bhert->bhertLname }}</td>
                                            <td>
                                                {{ $bhert->bhertHousenumber }} {{ $bhert->bhertStreetname }} 
                                            </td>
                                            <td>{{ $bhert->bhertPurpose }}</td>
                                            <td>
                                                @if($bhert->bhertStatus == 'pending')

                                                    <span class="badge bg-warning">Pending</span>
                                                
                                                @elseif($bhert->bhertStatus == 'approved')

                                                    <span class="badge bg-success">Approved</span>

                                                @elseif($bhert->bhertStatus == 'denied')

                                                    <span class="badge bg-danger">Denied</span>
                                                    
                                                @elseif($bhert->bhertStatus == 'processed')

                                                    <span class="badge bg-info">Processed</span>

                                                @elseif($bhert->bhertStatus == 'claimed')

                                                    <span class="badge bg-success">Claimed</span>

                                                @elseif($bhert->bhertStatus == 'canceled')

                                                    <span class="badge bg-danger">Canceled</span>

                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.admin-print-bhert', ['bhert_id' => $bhert->id]) }}" 
                                                        rel="noopener" class="btn btn-info" target="__blank">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                    <a href="{{ route('admin.admin-update-bhert', ['bhert_id' => $bhert->id]) }}" 
                                                        rel="noopener" class="btn btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" rel="noopener" class="btn btn-danger" 
                                                        onclick="confirm('Are you sure, You want do delete this BHERT Certificate? ') || 
                                                        event.stopImmediatePropagation()" wire:click.prevent="deleteBHERT({{$bhert->id}})">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>

                                                <div class="dropdown show mt-3">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" 
                                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Update Status
                                                    </a>
                                                  
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        @if($bhert->bhertStatus == 'pending')

                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateBHERTStatus({{$bhert->id}}, 'approved')">
                                                            <strong class="text-success">
                                                                Approved
                                                            </strong>
                                                        </a>
                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateBHERTStatus({{$bhert->id}}, 'denied')">
                                                            <strong class="text-danger">
                                                                Denied
                                                            </strong>
                                                        </a>
                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateBHERTStatus({{$bhert->id}}, 'canceled')">
                                                            <strong class="text-danger">
                                                                Canceled
                                                            </strong>
                                                        </a>
                                                        @elseif($bhert->bhertStatus == 'approved')

                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateBHERTStatus({{$bhert->id}}, 'processed')">
                                                            <strong class="text-info">
                                                                Processed
                                                            </strong>
                                                        </a>
                                                        @elseif($bhert->bhertStatus == 'processed')
                                                        
                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateBHERTStatus({{$bhert->id}}, 'claimed')">
                                                            <strong class="text-success">
                                                                Claimed
                                                            </strong>
                                                        </a>
                                                        @elseif($bhert->bhertStatus == 'claimed')

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
                                                <a href="{{ asset('storage/bherts/'.$bhert->bhertImage) }}" 
                                                    target="_blank" rel="noopener noreferrer">
                                                    <img alt="Valid BHERT" class="profile-user-img img-fluid img-square"
                                                    src="{{ asset('storage/bherts/'.$bhert->bhertImage) }}" />
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
        {{-- Modal For BHERT Certificate --}}
        <div wire:ignore.self class="modal fade" id="modalBHERT">
            <div class="modal-dialog modalBHERT">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Adding New BHERT Certificate</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <!-- BHERT Certificate Form -->
                        <form enctype="multipart/form-data">@csrf
                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>First Name <code>*</code></label>
                                            <input type="text" class="form-control" wire:model="bhertFname"
                                                    placeholder="First Name" />
                                            @error('bhertFname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Last Name <code>*</code></label>
                                            <input type="text" class="form-control" wire:model="bhertLname" 
                                                    placeholder="Last Name"/>
                                            @error('bhertLname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Middle Initial</label>
                                            <input type="text" class="form-control" wire:model="bhertMname" 
                                                placeholder="Middle Initial" minlength="1" maxlength="1" />
                                            @error('bhertMname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Suffix</label>
                                            <input type="text" class="form-control" wire:model="bhertSuffix" 
                                                    placeholder="e.x Jr, I, II etc"/>
                                            @error('bhertSuffix') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>House No. <code>*</code></label>
                                            <input type="number" class="form-control" wire:model="bhertHousenumber" 
                                                    placeholder="House Number"/>
                                            @error('bhertHousenumber') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label>Street Name <code>*</code></label>
                                            <select class="form-control" wire:model="bhertStreetname" required>
                                                <option value="">Select Address</option>
                                                <option value="Bambang Cor Masangkay St">Bambang Cor Masangkay St</option>
                                                <option value="G Masangkay St">G Masangkay St</option>
                                                <option value="Mayhaligue St">Mayhaligue St</option>
                                            </select>
                                            @error('bhertStreetname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Age <code>*</code></label>
                                            <input type="number" class="form-control" min="1" max="120"
                                                    wire:model="bhertAge" placeholder="e.x 18"/>
                                            @error('bhertAge') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Purpose <code>*</code></label>
                                            <input type="text" class="form-control" wire:model="bhertPurpose" 
                                                    placeholder="e.x SSS"/>
                                            @error('bhertPurpose') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>
                                                Upload atleast <em>One</em> of BHERT Requirements
                                                (e.g Barangay ID)  
                                                (Max: 1MB)
                                                <code>*</code>
                                            </label>
                                            <input id="bhertImage" type="file"
                                                class="form-control" required wire:model="bhertImage">
                                                
                                                @error('bhertImage') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>

                                        @if ($bhertImage)
                                            <p class="card-text">Photo Preview:</p>
                                            <img src="{{ $bhertImage->temporaryUrl() }}" width="100px" />
                                        @endif

                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" wire:click.prevent="addBHERT()"
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