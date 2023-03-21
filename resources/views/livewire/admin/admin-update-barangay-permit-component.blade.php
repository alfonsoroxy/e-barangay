@section('title', 'Update Barangay Permit')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Barangay Permit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.admin-dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.admin-barangay-permit') }}">List Barangay Permit</a></li>
                            <li class="breadcrumb-item active">Update Barangay Permit</li>
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
                              <h3 class="card-title">Update Barangay Permit</h3>
                            </div>
                            <form wire:submit.prevent="updateBarangayPermit" wire:loading.attr="disabled">@csrf

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
                                                <select class="form-control" wire:model="barangayPermitStreetname">
                                                    <option value="">Select Address</option>
                                                    <option value="Bambang Cor Masangkay St">Bambang Cor Masangkay St</option>
                                                    <option value="G Masangkay St">G Masangkay St</option>
                                                    <option value="Mayhaligue St">Mayhaligue St</option>
                                                </select>
                                                @error('barangayPermitStreetname') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                    </div> 
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