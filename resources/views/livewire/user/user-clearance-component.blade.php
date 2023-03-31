@section('title', 'Barangay Clearance')

<div class="content-wrapper">     
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                   <div class="col-sm-6">
                       <h1 class="m-0">Barangay Clearance</h1>
                   </div>
                   <div class="col-sm-6">
                       <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('user.user-dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Barangay Clearance</li>
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
                <h2 class="text-center mb-3">Barangay Clearance Description</h2>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 mb-3 text-center">
                                        <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/barangayLogo.png') }}"  
                                            alt="Barangay Clearance" width="250px" />
                                    </div>
                                </div>
                                <!-- adding the accordion ID so Bootstrap's collapse plugin detects it -->
                                <div id="accordion">
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                                    Barangay Clearance Description
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                            <div class="card-body">
                                                <p class="card-text">
                                                    A <strong>Barangay Clearance</strong> is one of the easiest documents 
                                                    you can get as a valid proof of your identity. It is a document containing 
                                                    a persons name, address, and signature. It also contains the date it was 
                                                    issued and for the specific purpose. It bears the signature of Barangay Captain 
                                                    and is sealed with the Barangay Official Seal.
                                                </p>
                                                <p class="card-text">
                                                    <strong>
                                                        Purpose of having a Barangay Clearance includes;
                                                    </strong>
                                                    <ol class="card-text">
                                                        <li>Helps in Employment</li>
                                                        <li>Proof of Residency</li>
                                                        <li>Requirement for Transactions</li>
                                                        <li>Avoid Legal Issues</li>
                                                        <li>Represents good standing in the community</li>
                                                    </ol>
                                                </p>
                                                <p class="card-text">
                                                    <strong>
                                                        Documents requirements that are needed before requesting a Barangay Clearance;
                                                    </strong>
                                                    <ol class="card-text">
                                                        <li>Government-Issued ID like Barangay ID</li>
                                                        <li>No Bad Record</li>
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
                    Process of Requesting Barangay Clearance
                </h2>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Custom Tabs -->
                        <div class="card">
                        <div class="card-header d-flex p-0">
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#tab_1" data-toggle="tab">
                                        Barangay Clearance Request
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab_2" data-toggle="tab">
                                        Barangay Clearance Status
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab_3" data-toggle="tab">
                                        Claim Barangay Clearance
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
                                                alt="Barangay Clearance" width="300px" />
                                        </div>
                                    </div>
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title w-100">Barangay Clearance Request</h3>
                                        </div>
                                        <div class="card-body">
                                            If you're deciding to get a Barangay Clearance, make sure that you have already
                                            have the <strong>document requirements</strong> that are needed before requesting.
                                            For requesting you need to click the <strong>Request Barangay Clearance </strong> then fill up the
                                            information that is needed, make sure that your information is correct to avoid
                                            inconvenience, then <strong>Send Request</strong>.
                                        </div>
                                        <div class="card-footer text-center">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalClearance">
                                                Request Barangay Clearance
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Request Barangay Clearance -->
                                <div class="tab-pane" id="tab_2">
                                    <div class="row">
                                        <div class="col-sm-12 mb-3 text-center">
                                            <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/wait-document.jpg') }}"  
                                                alt="Wait Document" width="300px" />
                                        </div>
                                    </div>
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title w-100">Barangay Clearance Status</h3>
                                        </div>
                                        <div class="card-body">
                                            After requesting for Barangay Clearance, you will redirect to status of your documents or
                                            as you click the <strong>View Barangay Clearance Status</strong> in 
                                            <strong>Status</strong> column you will see the status of your request which is 
                                            <strong>pending</strong>, you will wait until the barangay official 
                                            <strong>approved or denied</strong> on your request. 
                                            When your request is approved, you need to wait until the status changes into
                                            <strong>processed</strong> before you can procceed to barangay hall to claimed your document.
                                            Also if you wannt to cancel your request, just click the <strong>Cancel Request</strong>
                                            in order to acknowledge the Barangay Official.
                                        </div>
                                        <div class="card-footer text-center">
                                            <a class="btn btn-success" href="{{ route('user.user-clearance-status') }}">
                                                View Barangay Clearance Status
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Barangay Clearance Status -->
                                <div class="tab-pane" id="tab_3">
                                    <div class="row">
                                        <div class="col-sm-12 mb-3 text-center">
                                            <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/claim-document.jpg') }}"  
                                                alt="Claim Document" width="300px" />
                                        </div>
                                    </div>
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title w-100">Claim Barangay Clearance</h3>
                                        </div>
                                        <div class="card-body">
                                            In Claiming the Barangay Clearance, you will be <strong>notified on your dasboard</strong> 
                                            or as you view your <strong>Status in Barangay Clearance Status </strong>that your 
                                            Barangay Clearance request has been already already processed and printed by the 
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
        
        <!-- Barangay Clearance Modal -->
        <div wire:ignore.self class="modal fade" id="modalClearance">
            <div class="modal-dialog modalClearance">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Request for Barangay Clearance</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="card-text text-danger text-center">
                            Please put a accurate information to avoid inconvenience.
                        </p>

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
                                                class="form-control" required wire:model="clearanceImage">
                                                
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