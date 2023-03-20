@section('title', 'Barangay Permit')

<div class="content-wrapper">     
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                   <div class="col-sm-6">
                       <h1 class="m-0">Barangay Permit</h1>
                   </div>
                   <div class="col-sm-6">
                       <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="{{ route('user.user-dashboard') }}">Dashboard</a></li>
                           <li class="breadcrumb-item active">Barangay Permit</li>
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
                <h2 class="text-center mb-3">Barangay Permit Description</h2>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 mb-3 text-center">
                                        <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/barangayLogo.png') }}"  
                                            alt="Barangay Permit" width="250px" />
                                    </div>
                                </div>
                                <div id="accordion">
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                                    Barangay Permit Description
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                            <div class="card-body">
                                                <p class="card-text">
                                                    A <strong>Barangay Permit</strong> is issued by a Barangay that authorizes an individual or a 
                                                    business to conduct certain activities or operate within the jurisdiction of 
                                                    the Barangay. It serves as proof of clearance and approval from the barangay 
                                                    for specified activities.
                                                </p>
                                                <p class="card-text">
                                                    <strong>
                                                        Purpose of having a Barangay Permit includes;
                                                    </strong>
                                                    <ol class="card-text">
                                                        <li>Legal recognition of the business or activity</li>
                                                        <li>Proof of compliance with barangay recognitions</li>
                                                        <li>Authority to operate within the barangay</li>
                                                        <li>Ability to obtain other permits and licenses required for the business or activity</li>
                                                        <li>Protection against possible legal actions for operating without proper authorizations</li>
                                                    </ol>
                                                </p>
                                                <p class="card-text">
                                                    <strong>
                                                        Documents requirements that are needed before requesting a Barangay Permit;
                                                    </strong>
                                                    <ol class="card-text">
                                                        <li>Working Permit</li>
                                                        <li>Barangay Permit</li>
                                                        <li>Work ID</li>
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
                    Process of Requesting Barangay Permit
                </h2>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Custom Tabs -->
                        <div class="card">
                        <div class="card-header d-flex p-0">
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#tab_1" data-toggle="tab">
                                        Barangay Permit Request
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab_2" data-toggle="tab">
                                        Barangay Permit Status
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab_3" data-toggle="tab">
                                        Claiming Barangay Permit
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
                                                alt="Barangay Permit" width="300px" />
                                        </div>
                                    </div>
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title w-100">Barangay Permit Request</h3>
                                        </div>
                                        <div class="card-body">
                                            If you're deciding to get a Barangay Permit, make sure that you have already
                                            have the <strong>document requirements</strong> that are needed before requesting.
                                            For requesting you need to click the <strong>Request Barangay Permit </strong> then fill up the
                                            information that is needed, make sure that your information is correct to avoid
                                            inconvenience, then <strong>Send Request</strong>.
                                        </div>
                                        <div class="card-footer text-center">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalPermit">
                                                Request Barangay Permit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Request Barangay Permit -->
                                <div class="tab-pane" id="tab_2">
                                    <div class="row">
                                        <div class="col-sm-12 mb-3 text-center">
                                            <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/wait-document.jpg') }}"  
                                                alt="Wait Document" width="300px" />
                                        </div>
                                    </div>
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title w-100">Barangay Permit Status</h3>
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
                                            <a class="btn btn-success" href="{{ route('user.user-barangay-permit-status') }}">
                                                View Barangay Permit Status
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Barangay Permit Status -->
                                <div class="tab-pane" id="tab_3">
                                    <div class="row">
                                        <div class="col-sm-12 mb-3 text-center">
                                            <img class="img-fluid img-thumbnail" src="{{ asset('assets/dist/img/claim-document.jpg') }}"  
                                                alt="Claim Document" width="300px" />
                                        </div>
                                    </div>
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title w-100">Claim Barangay Permit</h3>
                                        </div>
                                        <div class="card-body">
                                                In Claiming the Barangay Permit, you will be <strong>notified on your dasboard</strong> 
                                                or as you view your <strong>Status in Barangay Permit Status </strong>that your 
                                                barangay permit request has been already already processed and printed by the 
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
        
        <!-- Barangay Permit Modal -->
        <div wire:ignore.self class="modal fade" id="modalPermit">
            <div class="modal-dialog modalPermit">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Request for Barangay Permit</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="card-text text-danger text-center">
                            Please put a accurate information to avoid inconvenience.
                        </p>

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