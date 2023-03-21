@section('title', 'Update Barangay Certificate')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Barangay Certificate</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-certificate') }}">List Barangay Certificate</a>
                            </li>
                            <li class="breadcrumb-item active">Update Barangay Certificate</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Update Barangay Certificate</h3>
                            </div>
                            <form wire:submit.prevent="updateCertificate" wire:loading.attr="disabled">@csrf

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>First Name <code>*</code></label>
                                                <input type="text" class="form-control" wire:model="certificateFname"
                                                        placeholder="First Name" />
                                                @error('certificateFname') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Last Name <code>*</code></label>
                                                <input type="text" class="form-control" wire:model="certificateLname" 
                                                        placeholder="Last Name"/>
                                                @error('certificateLname') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Middle Initial</label>
                                                <input type="text" class="form-control" wire:model="certificateMname" 
                                                    placeholder="Middle Initial" minlength="1" maxlength="1" />
                                                @error('certificateMname') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Suffix</label>
                                                <input type="text" class="form-control" wire:model="certificateSuffix" 
                                                        placeholder="e.x Jr, I, II etc"/>
                                                @error('certificateSuffix') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>House No. <code>*</code></label>
                                                <input type="number" class="form-control" wire:model="certificateHousenumber" 
                                                        placeholder="House Number"/>
                                                @error('certificateHousenumber') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>Street Name <code>*</code></label>
                                                <select class="form-control" wire:model="certificateStreetname">
                                                    <option value="Bambang Cor Masangkay St">Bambang Cor Masangkay St</option>
                                                    <option value="G. Masangkay St">G. Masangkay St</option>
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

                                </div>
                  
                                <div class="card-footer">
                                  <button type="submit" class="btn btn-success float-right">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>