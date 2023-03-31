@section('title', 'List of Barangay Certificate Request')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List Barangay Certificate Request</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">List Barangay Certificate Request</li>
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

            @if(Session::has('certificate_msg'))
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle"></i> {{Session::get('certificate_msg')}}
                </div>
            @endif

            <div class="container-fluid">     
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">List of Barangay Certificate Request</h3>
                                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modalCertificate">
                                    Add New Barangay Certificate
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Certificate No</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Address</th>

                                            <th>Purpose</th>
                                            <th>Status</th>

                                            <th>Update Status</th>
                                            <th>Tool</th>
                                            <th>Valid Document</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-capitalize">
                                        @foreach ($certificates as $certificate)

                                        <tr class="text-capitalize">
                                            <td>{{ $certificate->id }}</td>
                                            <td>{{ $certificate->created_at->toFormattedDateString() }}</td>
                                            <td>{{ $certificate->certificateFname }}</td>
                                            <td>{{ $certificate->certificateLname }}</td>
                                            <td>
                                                {{ $certificate->certificateHousenumber }} {{ $certificate->certificateStreetname }} 
                                            </td>
                                            <td>{{ $certificate->certificatePurpose }}</td>
             
                                            <td>
                                                @if($certificate->certificateStatus == 'pending')

                                                    <span class="badge bg-warning">Pending</span>

                                                @elseif($certificate->certificateStatus == 'approved')

                                                    <span class="badge bg-success">Approved</span>

                                                @elseif($certificate->certificateStatus == 'denied')

                                                    <span class="badge bg-danger">Denied</span>

                                                @elseif($certificate->certificateStatus == 'processed')

                                                    <span class="badge bg-info">Processed</span>

                                                @elseif($certificate->certificateStatus == 'claimed')

                                                    <span class="badge bg-success">Claimed</span>

                                                @elseif($certificate->certificateStatus == 'canceled')

                                                    <span class="badge bg-danger">Canceled</span>

                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.admin-print-certificate', 
                                                        ['certificate_id' => $certificate->id]) }}" 
                                                        rel="noopener" class="btn btn-info" target="__blank">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                    <a href="{{ route('admin.admin-update-certificate', 
                                                        ['certificate_id' => $certificate->id]) }}" 
                                                        rel="noopener" class="btn btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" rel="noopener" class="btn btn-danger" 
                                                        onclick="confirm('Are you sure, You want do delete this Barangay Certificate? ') || 
                                                        event.stopImmediatePropagation()" wire:click.prevent="deleteCertificate({{$certificate->id}})">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>

                                                <div class="dropdown show mt-3">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" 
                                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Update Status
                                                    </a>
                                                  
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        @if($certificate->certificateStatus == 'pending')

                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateCertificateStatus({{$certificate->id}}, 'approved')">
                                                            <strong class="text-success">
                                                                Approved
                                                            </strong>
                                                        </a>
                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateCertificateStatus({{$certificate->id}}, 'denied')">
                                                            <strong class="text-danger">
                                                                Denied
                                                            </strong>
                                                        </a>
                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateCertificateStatus({{$certificate->id}}, 'canceled')">
                                                            <strong class="text-danger">
                                                                Canceled
                                                            </strong>
                                                        </a>
                                                        @elseif($certificate->certificateStatus == 'approved')

                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateCertificateStatus({{$certificate->id}}, 'processed')">
                                                            <strong class="text-info">
                                                                Processed
                                                            </strong>
                                                        </a>
                                                        @elseif($certificate->certificateStatus == 'processed')
                                                        
                                                        <a href="#" class="dropdown-item"
                                                            wire:click.prevent="updateCertificateStatus({{$certificate->id}}, 'claimed')">
                                                            <strong class="text-success">
                                                                Claimed
                                                            </strong>
                                                        </a>
                                                        @elseif($certificate->certificateStatus == 'claimed')

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
                                                <a href="{{ asset('assets/dist/img/certificates/'.$certificate->certificateImage) }}" 
                                                    target="_blank" rel="noopener noreferrer">
                                                    <img alt="Valid Certificate" class="profile-user-img img-fluid img-square"
                                                    src="{{ asset('assets/dist/img/certificates/'.$certificate->certificateImage) }}" />
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
        {{-- Modal For Barangay Certificate --}}
        <div wire:ignore.self class="modal fade" id="modalCertificate">
            <div class="modal-dialog modalCertificate">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Barangay Certificate</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <!-- Certificate Form -->
                        <form enctype="multipart/form-data">@csrf
                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>First Name <code>*</code></label>
                                            <input type="text" class="form-control" wire:model="certificateFname"
                                                    placeholder="First Name" />
                                            @error('certificateFname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Last Name <code>*</code></label>
                                            <input type="text" class="form-control" wire:model="certificateLname" 
                                                    placeholder="Last Name"/>
                                            @error('certificateLname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Middle Initial</label>
                                            <input type="text" class="form-control" wire:model="certificateMname" 
                                                placeholder="Middle Initial" minlength="1" maxlength="1" />
                                            @error('certificateMname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Suffix</label>
                                            <input type="text" class="form-control" wire:model="certificateSuffix" 
                                                    placeholder="e.x Jr, I, II etc"/>
                                            @error('certificateSuffix') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>House No. <code>*</code></label>
                                            <input type="number" class="form-control" wire:model="certificateHousenumber" 
                                                    placeholder="House Number"/>
                                            @error('certificateHousenumber') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label>Street Name <code>*</code></label>
                                            <select class="form-control" wire:model="certificateStreetname" required>
                                                <option value="">Select Address</option>
                                                <option value="Bambang Cor Masangkay St">Bambang Cor Masangkay St</option>
                                                <option value="G Masangkay St">G Masangkay St</option>
                                                <option value="Mayhaligue St">Mayhaligue St</option>
                                            </select>
                                            @error('certificateStreetname') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Purpose <code>*</code></label>
                                            <select class="form-control" wire:model="certificatePurpose" required>
                                                <option value="">Select Purpose</option>
                                                <option value="Application for Employment">Application for Employment</option>
                                                <option value="Hospital Purpose">Hospital Purpose</option>
                                                <option value="Transaction with a Bank">Transaction with a Bank</option>
                                                <option value="Postal ID Requirement">Postal ID Requirement</option>
                                                <option value="Organized Vending">Organized Vending</option>
                                                <option value="Travel / Transfer of Resident">Travel / Transfer of Resident</option>
                                                <option value="School Admission/Requirement">School Admission/Requirement</option>
                                                <option value="Processing of Calamity Loan">Processing of Calamity Loan</option>
                                                <option value="Processing of SSS Loan">Processing of SSS Loan</option>
                                                <option value="For Livelihood Loan">For Livelihood Loan</option>
                                                <option value="ID for Senior Citizen">ID for Senior Citizen</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            @error('certificatePurpose') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                @if($certificatePurpose == "Other")
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Other Purpose</label>
                                            <input type="text" class="form-control" wire:model="certificateOtherPurpose" 
                                                    placeholder="e.x SSS"/>
                                            @error('certificateOtherPurpose') <p class="text-danger">{{ $message }}</p> @enderror

                                        </div>
                                    </div>
                                </div>
                                
                                @endif
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>
                                                Upload atleast <em>One</em> of Barangay Certificate Requirements 
                                                depends on your Purpose (e.g Government-Issue ID's like Barangay ID) 
                                                (Max: 1MB)
                                                <code>*</code>
                                            </label>
                                            <input id="certificateImage" type="file"
                                                class="form-control " required wire:model="certificateImage">
                                                
                                                @error('certificateImage') <p class="text-danger">{{ $message }}</p> @enderror
                        
                                        </div>

                                        @if ($certificateImage)
                                            <p class="card-text">Photo Preview:</p>
                                            <img src="{{ $certificateImage->temporaryUrl() }}" width="100px" />
                                        @endif

                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" wire:click.prevent="addCertificate()"
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