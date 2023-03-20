@section('title', 'Barangay Indigency')

<div class="content-wrapper">     
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                   <div class="col-sm-6">
                       <h1 class="m-0">Barangay Indigency</h1>
                   </div>
                   <div class="col-sm-6">
                       <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="{{ route('user.user-dashboard') }}">Dashboard</a></li>
                           <li class="breadcrumb-item active">Barangay Indigency</li>
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
                <h2 class="text-center mb-3">Barangay Indigency Description</h2>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 mb-3 text-center">
                                        <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/barangayLogo.png') }}"  
                                            alt="Barangay Indigency" width="250px" />
                                    </div>
                                </div>
                                <!-- adding the accordion ID so Bootstrap's collapse plugin detects it -->
                                <div id="accordion">
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                                    Barangay Indigency Description
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                            <div class="card-body">
                                                <p class="card-text">
                                                    A <strong>Barangay Indigency</strong> is a certification issued 
                                                    by the barangay that declares a household as indigent or impoverished. 
                                                    This certification serves as proof that a family is in need of 
                                                    financial assistance and is eligible for various government benefits 
                                                    and services.
                                                </p>
                                                <p class="card-text">
                                                    <strong>
                                                        Purpose of having a Barangay Indigency includes;
                                                    </strong>
                                                    <ol class="card-text">
                                                        <li>Access to social services and assistance program</li>
                                                        <li>Eligibility for government-sponsored health care services</li>
                                                        <li>Priority in housing and job opportunities</li>
                                                        <li>Discount on basic necessities like electricity and water bills</li>
                                                        <li>Waived fees for certain government transactions</li>
                                                    </ol>
                                                </p>
                                                <p class="card-text">
                                                    <strong>
                                                        Documents requirements that are needed before requesting a Barangay Indigency;
                                                    </strong>
                                                    <ol class="card-text">
                                                        <li>Government-Issued ID like Barangay ID</li>
                                                        <li>Medical History</li>
                                                        <li>Financial Assistance</li>
                                                        <li>PSCO Requirements</li>
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
                    Process of Requesting Barangay Indigency
                </h2>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Custom Tabs -->
                        <div class="card">
                        <div class="card-header d-flex p-0">
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#tab_1" data-toggle="tab">
                                        Barangay Indigency Request
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab_2" data-toggle="tab">
                                        Barangay Indigency Status
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab_3" data-toggle="tab">
                                        Claim Barangay Indigency
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
                                                alt="Barangay Indigency" width="300px" />
                                        </div>
                                    </div>
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title w-100">Barangay Indigency Request</h3>
                                        </div>
                                        <div class="card-body">
                                            If you're deciding to get a Barangay Indigency, make sure that you have already
                                            have the <strong>document requirements</strong> that are needed before requesting.
                                            For requesting you need to click the <strong>Request Barangay Indigency </strong> then fill up the
                                            information that is needed, make sure that your information is correct to avoid
                                            inconvenience, then <strong>Send Request</strong>.
                                        </div>
                                        <div class="card-footer text-center">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalIndigency">
                                                Request Barangay Indigency
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Request Barangay Indigency -->
                                <div class="tab-pane" id="tab_2">
                                    <div class="row">
                                        <div class="col-sm-12 mb-3 text-center">
                                            <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/wait-document.jpg') }}"  
                                                alt="Wait Document" width="300px" />
                                        </div>
                                    </div>
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title w-100">Barangay Indigency Status</h3>
                                        </div>
                                        <div class="card-body">
                                            After requesting for Barangay Indigency, you will redirect to status of your documents or
                                            as you click the <strong>View Barangay Indigency Status</strong> in 
                                            <strong>Status</strong> column you will see the status of your request which is 
                                            <strong>pending</strong>, you will wait until the barangay official 
                                            <strong>approved or denied</strong> on your request. 
                                            When your request is approved, you need to wait until the status changes into
                                            <strong>processed</strong> before you can procceed to barangay hall to claimed your document.
                                            Also if you wannt to cancel your request, just click the <strong>Cancel Request</strong>
                                            in order to acknowledge the Barangay Official.
                                        </div>
                                        <div class="card-footer text-center">
                                            <a class="btn btn-success" href="{{ route('user.user-indigency-status') }}">
                                                View Barangay Indigency Status
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Barangay Indigency Status -->
                                <div class="tab-pane" id="tab_3">
                                    <div class="row">
                                        <div class="col-sm-12 mb-3 text-center">
                                            <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/claim-document.jpg') }}"  
                                                alt="Claim Document" width="300px" />
                                        </div>
                                    </div>
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title w-100">Claim Barangay Indigency</h3>
                                        </div>
                                        <div class="card-body">
                                            In Claiming the Barangay Indigency, you will be <strong>notified on your dasboard</strong> 
                                            or as you view your <strong>Status in Barangay Indigency Status </strong>that your 
                                            Barangay Indigency request has been already already processed and printed by the 
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
        
        <!-- Barangay Indigency Modal -->
        <div wire:ignore.self class="modal fade" id="modalIndigency">
            <div class="modal-dialog modalIndigency">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Request for Barangay Indigency</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="card-text text-danger text-center">
                            Please put a accurate information to avoid inconvenience.
                        </p>
                        
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
                                                <option value="G. Masangkay St">G. Masangkay St</option>
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
                                                class="form-control @error('indigencyImage') is-invalid @enderror" name="indigencyImage"
                                                value="{{ old('indigencyImage') }}" required autocomplete="indigencyImage" 
                                                wire:model="indigencyImage">
                                                
                                                @error('indigencyImage') <p class="text-danger">{{ $message }}</p> @enderror
                        
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" wire:click.prevent="addIndigency()"
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