@section('title', 'Update BHERT Certificate')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update BHERT Certificate</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-certificate') }}">
                                    List BHERT Certificate
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Update BHERT Certificate</li>
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
                              <h3 class="card-title">Update BHERT Certificate</h3>
                            </div>
                            <form wire:submit.prevent="updateBHERT" wire:loading.attr="disabled">@csrf

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>First Name <code>*</code></label>
                                                <input type="text" class="form-control" wire:model="bhertFname"
                                                        placeholder="First Name" />
                                                @error('bhertFname') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Last Name <code>*</code></label>
                                                <input type="text" class="form-control" wire:model="bhertLname" 
                                                        placeholder="Last Name"/>
                                                @error('bhertLname') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Middle Initial</label>
                                                <input type="text" class="form-control" wire:model="bhertMname" 
                                                    placeholder="Middle Initial" minlength="1" maxlength="1" />
                                                @error('bhertMname') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Suffix</label>
                                                <input type="text" class="form-control" wire:model="bhertSuffix" 
                                                        placeholder="e.x Jr, I, II etc"/>
                                                @error('bhertSuffix') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>House No. <code>*</code></label>
                                                <input type="number" class="form-control" wire:model="bhertHousenumber" 
                                                        placeholder="House Number"/>
                                                @error('bhertHousenumber') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>Street Name <code>*</code></label>
                                                <select class="form-control" wire:model="bhertStreetname" required>
                                                    <option value="">Select Address</option>
                                                    <option value="Bambang Cor Masangkay St">Bambang Cor Masangkay St</option>
                                                    <option value="G Masangkay St">G Masangkay St</option>
                                                    <option value="Mayhaligue St">Mayhaligue St</option>
                                                </select>
                                                @error('bhertStreetname') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Age <code>*</code></label>
                                                <input type="number" class="form-control" min="1" max="100"
                                                        wire:model="bhertAge" placeholder="e.x 18"/>
                                                @error('bhertAge') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Purpose <code>*</code></label>
                                                <input type="text" class="form-control" wire:model="bhertPurpose" 
                                                        placeholder="e.x SSS"/>
                                                @error('bhertPurpose') <p class="text-danger">{{ $message }}</p> @enderror
    
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