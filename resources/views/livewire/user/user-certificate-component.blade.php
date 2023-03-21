@section('title', 'Barangay Certificate')

<div class="content-wrapper">     
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                   <div class="col-sm-6">
                       <h1 class="m-0">Barangay Certificate</h1>
                   </div>
                   <div class="col-sm-6">
                       <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="{{ route('user.user-dashboard') }}">Dashboard</a></li>
                           <li class="breadcrumb-item active">Barangay Certificate</li>
                       </ol>
                   </div>
                </div>
            </div>
        </div>
        {{-- Description --}}
        <section class="content">
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle"></i> {{Session::get('message')}}
                </div>
            @endif
            
            <div class="container-fluid">
                <h2 class="text-center mb-3">Barangay Certificate Description</h2>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 mb-3 text-center">
                                        <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/barangayLogo.png') }}"  
                                            alt="Barangay Certificate" width="250px" />
                                    </div>
                                </div>
                                <!-- adding the accordion ID so Bootstrap's collapse plugin detects it -->
                                <div id="accordion">
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                                    Barangay Certificate Description
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                            <div class="card-body">
                                                <p class="card-text">
                                                    A <strong>Barangay Certificate</strong> is a document issued by a Barangay that serves as 
                                                    proof of residency or domicile within the jurisdiction of the barangay. 
                                                    It is typically used as supporting documents for various legal or 
                                                    administrative purposes, such as applying for government-issued IDs, 
                                                    registering a business, or enrolling in schools. A Barangay Certificate 
                                                    may contain information such as the recipients name, address, and length 
                                                    of residency in the Barangay. (Republic Act No. 9048 or the “Clerical Error Law”)
                                                </p>
                                                <p class="card-text">
                                                    <strong>
                                                        Purpose of having a Barangay Certificate includes;
                                                    </strong>
                                                    <ol class="card-text">
                                                        <li>Proof of residency within the jurisdiction of the Barangay</li>
                                                        <li>
                                                            Support for various legal and administrative processes, 
                                                            such as obtaining government-issued IDs or registering a business
                                                        </li>
                                                        <li>
                                                            Assistance in resolving disputes or conflict involving residency 
                                                            or domicile within the Barangay
                                                        </li>
                                                        <li>Acknowledgement of the receipts status as a resident or member of the Barangay community</li>
                                                        <li>Access various social and economic services and benefits provided by the Barangay</li>
                                                    </ol>
                                                </p>
                                                <p class="card-text">
                                                    <strong>
                                                        Documents requirements that are needed before requesting a Barangay Certificate;
                                                    </strong>
                                                    <ol class="card-text">
                                                        <li>Government-Issued ID like Barangay ID</li>
                                                        <li>Proof of Employment Application</li>
                                                        <li>Proof of Hospital Purpose</li>
                                                        <li>Proof of Transaction with a Bank</li>
                                                        <li>Proof of Postal ID Requirements</li>
                                                        <li>Proof of Transfering</li>
                                                        <li>Proof of School Admission</li>
                                                        <li>Proof of SSS Loan</li>
                                                        <li>Proof of Calamity Loan</li>
                                                    </ol>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        
        {{-- Process --}}
        <section class="content">
            <div class="container-fluid">  
                <h2 class="text-center mt-3 mb-3">
                    Process of Requesting Barangay Certificate
                </h2>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Custom Tabs -->
                        <div class="card">
                        <div class="card-header d-flex p-0">
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#tab_1" data-toggle="tab">
                                        Barangay Certificate Request
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab_2" data-toggle="tab">
                                        Barangay Certificate Status
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab_3" data-toggle="tab">
                                        Claim Barangay Certificate
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <div class="row">
                                        <div class="col-sm-12 mb-3 text-center">
                                            <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/request-document.jpg') }}"  
                                                alt="Barangay Certificate" width="300px" />
                                        </div>
                                    </div>
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title w-100">Barangay Certificate Request</h3>
                                        </div>
                                        <div class="card-body">
                                            If you're deciding to get a Barangay Certificate, make sure that you have already
                                            have the <strong>document requirements</strong> that are needed before requesting.
                                            For requesting you need to click the <strong>Request Barangay Certificate </strong> then fill up the
                                            information that is needed, make sure that your information is correct to avoid
                                            inconvenience, then <strong>Send Request</strong>.
                                        </div>
                                        <div class="card-footer text-center">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCertificate">
                                                Request Barangay Certificate
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Request Barangay Certificate -->
                                <div class="tab-pane" id="tab_2">
                                    <div class="row">
                                        <div class="col-sm-12 mb-3 text-center">
                                            <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/wait-document.jpg') }}"  
                                                alt="Wait Document" width="300px" />
                                        </div>
                                    </div>
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title w-100">Barangay Certificate Status</h3>
                                        </div>
                                        <div class="card-body">
                                            After requesting for Barangay Permit, you will redirect to status of your documents or
                                            as you click the <strong>View Barangay Permit Status</strong> in 
                                            <strong>Status</strong> column you will see the status of your request which is 
                                            <strong>pending</strong>, you will wait until the barangay official 
                                            <strong>approved or denied</strong> on your request. 
                                            When your request is approved, you need to wait until the status changes into
                                            <strong>processed</strong> before you can procceed to barangay hall to claimed your document.
                                            Also if you wannt to cancel your request, just click the <strong>Cancel Request</strong>
                                            in order to acknowledge the Barangay Official.
                                        </div>
                                        <div class="card-footer text-center">
                                            <a class="btn btn-success" href="{{ route('user.user-certificate-status') }}">
                                                View Barangay Certificate Status
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Barangay Certificate Status -->
                                <div class="tab-pane" id="tab_3">
                                    <div class="row">
                                        <div class="col-sm-12 mb-3 text-center">
                                            <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/claim-document.jpg') }}"  
                                                alt="Claim Document" width="300px" />
                                        </div>
                                    </div>
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title w-100">Claim Barangay Certificate</h3>
                                        </div>
                                        <div class="card-body">
                                            In Claiming the Barangay Certificate, you will be <strong>notified on your dasboard</strong> 
                                            or as you view your <strong>Status in Barangay Certificate Status </strong>that your 
                                            Barangay Certificate request has been already already processed and printed by the 
                                            barangay official which you can already <strong>claim</strong> your request in
                                            <strong>barangay hall</strong>.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Barangay Certificate Modal -->
        <div wire:ignore.self class="modal fade" id="modalCertificate">
            <div class="modal-dialog modalCertificate">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Request for Barangay Certificate</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="card-text text-danger text-center">
                            Please put a accurate information to avoid inconvenience.
                        </p>
                        
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
                                                class="form-control @error('certificateImage') is-invalid @enderror" name="certificateImage"
                                                value="{{ old('certificateImage') }}" required autocomplete="certificateImage" 
                                                wire:model="certificateImage">
                                                
                                                @error('certificateImage') <p class="text-danger">{{ $message }}</p> @enderror
                        
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" wire:click.prevent="addCertificate()"
                                    wire:loading.attr="disabled">
                                    Send Request
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>