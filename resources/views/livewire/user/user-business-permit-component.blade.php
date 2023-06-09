@section('title', 'Business Permit')

<div class="content-wrapper">     
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                   <div class="col-sm-6">
                       <h1 class="m-0">Business Permit</h1>
                   </div>
                   <div class="col-sm-6">
                       <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('user.user-dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Business Permit</li>
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
                <h2 class="text-center mb-3">Business Permit Description</h2>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 mb-3 text-center">
                                        <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/barangayLogo.png') }}"  
                                            alt="Business Permit" width="250px" />
                                    </div>
                                </div>
                                <!-- adding the accordion ID so Bootstrap's collapse plugin detects it -->
                                <div id="accordion">
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                                    Business Permit Description
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                            <div class="card-body">
                                                <p class="card-text">
                                                    A <strong>Business Permit</strong> is a document issued by the government agency that authorizes 
                                                    a business to operate within a specific jurisdiction. It serves as a proof that 
                                                    the business has met the legal requirements and regulations set by the government 
                                                    for conducting its operations.
                                                </p>
                                                <p class="card-text">
                                                    <strong>
                                                        Purpose of having a Business Permit includes;
                                                    </strong>
                                                    <ol class="card-text">
                                                        <li>Legal recognition of the business or activity</li>
                                                        <li>Compliance with government regulations</li>
                                                        <li>Authority to operate the business within the jurisdiction</li>
                                                        <li>Ability to obtain other licenses and permits required for the specific types of business</li>
                                                        <li>Protection against legal actions for operating without proper authorization</li>
                                                        <li>Access to government support programs and services for businesses</li>
                                                        <li>Opportunity to participate in the government bidding and procurement process</li>
                                                        <li>Potential to attract customers who prefer to do business with legally recognized entities</li>
                                                    </ol>
                                                </p>
                                                <p class="card-text">
                                                    <strong>
                                                        Documents requirements that are needed before requesting a Business Permit;
                                                    </strong>
                                                    <ol class="card-text">
                                                        <li>DTI</li>
                                                        <li>Business Permit</li>
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
                    Process of Requesting Business Permit
                </h2>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Custom Tabs -->
                        <div class="card">
                        <div class="card-header d-flex p-0">
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#tab_1" data-toggle="tab">
                                        Business Permit Request
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab_2" data-toggle="tab">
                                        Business Permit Status
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab_3" data-toggle="tab">
                                        Claim Business Permit
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
                                                alt="Business Permit" width="300px" />
                                        </div>
                                    </div>
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title w-100">Business Permit Request</h3>
                                        </div>
                                        <div class="card-body">
                                            If you're deciding to get a Business Permit, make sure that you have already
                                            have the <strong>document requirements</strong> that are needed before requesting.
                                            For requesting you need to click the <strong>Request Business Permit </strong> then fill up the
                                            information that is needed, make sure that your information is correct to avoid
                                            inconvenience, then <strong>Send Request</strong>.
                                        </div>
                                        <div class="card-footer text-center">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalBusinessPermit">
                                                Request Business Permit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Request Business Permit -->
                                <div class="tab-pane" id="tab_2">
                                    <div class="row">
                                        <div class="col-sm-12 mb-3 text-center">
                                            <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/wait-document.jpg') }}"  
                                                alt="Wait Document" width="300px" />
                                        </div>
                                    </div>
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title w-100">Business Permit Status</h3>
                                        </div>
                                        <div class="card-body">
                                            After requesting for Business Permit, you will redirect to status of your documents or
                                            as you click the <strong>View Business Permit Status</strong> in 
                                            <strong>Status</strong> column you will see the status of your request which is 
                                            <strong>pending</strong>, you will wait until the barangay official 
                                            <strong>approved or denied</strong> on your request. 
                                            When your request is approved, you need to wait until the status changes into
                                            <strong>processed</strong> before you can procceed to barangay hall to claimed your document.
                                            Also if you wannt to cancel your request, just click the <strong>Cancel Request</strong>
                                            in order to acknowledge the Barangay Official.
                                        </div>
                                        <div class="card-footer text-center">
                                            <a class="btn btn-success" href="{{ route('user.user-business-permit-status') }}">
                                                View Business Permit Status
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Business Permit Status -->
                                <div class="tab-pane" id="tab_3">
                                    <div class="row">
                                        <div class="col-sm-12 mb-3 text-center">
                                            <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/claim-document.jpg') }}"  
                                                alt="Claim Document" width="300px" />
                                        </div>
                                    </div>
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title w-100">Claim Business Permit</h3>
                                        </div>
                                        <div class="card-body">
                                            In Claiming the Business Permit, you will be <strong>notified on your dasboard</strong> 
                                            or as you view your <strong>Status in Business Permit Status </strong>that your 
                                            Business Permit request has been already already processed and printed by the 
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
        
        <!-- Business Permit Modal -->
        <div wire:ignore.self class="modal fade" id="modalBusinessPermit">
            <div class="modal-dialog modalBusinessPermit">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Request for Business Permit</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="card-text text-danger text-center">
                            Please put a accurate information to avoid inconvenience.
                        </p>
                        
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
                                                class="form-control" required wire:model="businessPermitImage">
                                                
                                                @error('businessPermitImage') <p class="text-danger">{{ $message }}</p> @enderror
                        
                                        </div>

                                        @if ($businessPermitImage)
                                            <p class="card-text">Photo Preview:</p>
                                            <img src="{{ $businessPermitImage->temporaryUrl() }}" width="100px" />
                                        @endif

                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" wire:click.prevent="addBusinessPermit()"
                                    wire:loading.attr="disabled" :disabled="$formSubmitted">
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