@section('title', 'BHERT Certificate')

<div class="content-wrapper">     
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                   <div class="col-sm-6">
                       <h1 class="m-0">BHERT Certificate</h1>
                   </div>
                   <div class="col-sm-6">
                       <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="{{ route('user.user-dashboard') }}">Dashboard</a></li>
                           <li class="breadcrumb-item active">BHERT Certificate</li>
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
                <h2 class="text-center mb-3">BHERT Certificate Description</h2>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 mb-3 text-center">
                                        <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/barangayLogo.png') }}"  
                                            alt="BHERT Certificate" width="250px" />
                                    </div>
                                </div>
                                <!-- adding the accordion ID so Bootstrap's collapse plugin detects it -->
                                <div id="accordion">
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                                    BHERT Certificate Description
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                            <div class="card-body">
                                                It bears the signature of the Barangay Captain/ BHERT Chairman and is sealed with 
                                                the Barangays Official Seal; and it is a valid supporting documents that can be used 
                                                for identifying that the bearer is cleared and not included in the list of person being 
                                                monitored by the BHERT that is suspected, probably and confirmed case related to COVID-19 
                                                since we are still in National Health Crisis.
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
                    Process of Requesting BHERT Certificate
                </h2>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Custom Tabs -->
                        <div class="card">
                        <div class="card-header d-flex p-0">
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#tab_1" data-toggle="tab">
                                        BHERT Certificate Request
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab_2" data-toggle="tab">
                                        BHERT Certificate Status
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab_3" data-toggle="tab">
                                        Claim BHERT Certificate
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
                                                alt="BHERT Certificate" width="300px" />
                                        </div>
                                    </div>
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title w-100">BHERT Certificate Request</h3>
                                        </div>
                                        <div class="card-body">
                                            If you're deciding to get a BHERT Certificate, make sure that you have already
                                            have the <strong>document requirements</strong> that are needed before requesting.
                                            For requesting you need to click the <strong>Request BHERT Certificate </strong> then fill up the
                                            information that is needed, make sure that your information is correct to avoid
                                            inconvenience, then <strong>Send Request</strong>.
                                        </div>
                                        <div class="card-footer text-center">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalBHERT">
                                                Request BHERT Certificate
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Request BHERT Certificate -->
                                <div class="tab-pane" id="tab_2">
                                    <div class="row">
                                        <div class="col-sm-12 mb-3 text-center">
                                            <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/wait-document.jpg') }}"  
                                                alt="Wait Document" width="300px" />
                                        </div>
                                    </div>
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title w-100">BHERT Certificate Status</h3>
                                        </div>
                                        <div class="card-body">
                                            After requesting for BHERT Certificate, you will redirect to status of your documents or
                                            as you click the <strong>View BHERT Certificate Status</strong> in 
                                            <strong>Status</strong> column you will see the status of your request which is 
                                            <strong>pending</strong>, you will wait until the barangay official 
                                            <strong>approved or denied</strong> on your request. 
                                            When your request is approved, you need to wait until the status changes into
                                            <strong>processed</strong> before you can procceed to barangay hall to claimed your document.
                                            Also if you wannt to cancel your request, just click the <strong>Cancel Request</strong>
                                            in order to acknowledge the Barangay Official.
                                        </div>
                                        <div class="card-footer text-center">
                                            <a class="btn btn-success" href="{{ route('user.user-bhert-status') }}">
                                                View BHERT Certificate Status
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.BHERT Certificate Status -->
                                <div class="tab-pane" id="tab_3">
                                    <div class="row">
                                        <div class="col-sm-12 mb-3 text-center">
                                            <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/claim-document.jpg') }}"  
                                                alt="Claim Document" width="300px" />
                                        </div>
                                    </div>
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title w-100">Claim BHERT Certificate</h3>
                                        </div>
                                        <div class="card-body">
                                            In Claiming the BHERT Certificate, you will be <strong>notified on your dasboard</strong> 
                                            or as you view your <strong>Status in BHERT Certificate Status </strong>that your 
                                            BHERT Certificate request has been already already processed and printed by the 
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
        
        <!-- BHERT Certificate Modal -->
        <div wire:ignore.self class="modal fade" id="modalBHERT">
            <div class="modal-dialog modalBHERT">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Request for BHERT Certificate</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="card-text text-danger text-center">
                            Please put a accurate information to avoid inconvenience.
                        </p>

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
                                                <option value="G. Masangkay St">G. Masangkay St</option>
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
                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" wire:click.prevent="addBHERT()"
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