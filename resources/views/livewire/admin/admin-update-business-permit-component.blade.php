@section('title', 'Update Business Permit')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Business Permit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-business-permit') }}">List Business Permit</a>
                            </li>
                            <li class="breadcrumb-item active">Update Business Permit</li>
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
                              <h3 class="card-title">Update Business Permit</h3>
                            </div>
                            <form wire:submit.prevent="updateBusinessPermit" wire:loading.attr="disabled">@csrf

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>First Name <code>*</code></label>
                                                <input type="text" class="form-control" wire:model="businessPermitFname"
                                                        placeholder="First Name" />
                                                @error('businessPermitFname') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Last Name <code>*</code></label>
                                                <input type="text" class="form-control" wire:model="businessPermitLname" 
                                                        placeholder="Last Name"/>
                                                @error('businessPermitLname') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Middle Initial</label>
                                                <input type="text" class="form-control" wire:model="businessPermitMname" 
                                                placeholder="Middle Initial" minlength="1" maxlength="1" />
                                                @error('businessPermitMname') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
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
                                                        placeholder="e.x Business Name"/>
                                                @error('businessPermitBusinessname') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Business Year Establish <code>*</code></label>
                                                <input type="date" class="form-control" wire:model="businessPermitBusinessYearEstablish"/>
                                                @error('businessPermitBusinessYearEstablish') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>House No. <code>*</code></label>
                                                <input type="number" class="form-control" wire:model="businessPermitHousenumber" 
                                                        placeholder="House Number"/>
                                                @error('businessPermitHousenumber') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>Street Name <code>*</code></label>
                                                <select class="form-control" wire:model="businessPermitStreetname">
                                                    <option value="Bambang Cor Masangkay St">Bambang Cor Masangkay St</option>
                                                    <option value="G Masangkay St">G Masangkay St</option>
                                                    <option value="Mayhaligue St">Mayhaligue St</option>
                                                </select>
                                                @error('businessPermitStreetname') <p class="text-danger">{{ $message }}</p> @enderror
    
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