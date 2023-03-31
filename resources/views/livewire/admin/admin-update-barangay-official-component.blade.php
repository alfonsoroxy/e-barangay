@section('title', 'Update Barangay Official')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Barangay Official</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-barangay-official') }}">List Barangay Official</a>
                            </li>
                            <li class="breadcrumb-item active">Update Barangay Official</li>
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
                              <h3 class="card-title">Update Barangay Official</h3>
                            </div>
                            <form wire:submit.prevent="updateBarangayOfficial" enctype="multipart/form-data" 
                                wire:loading.attr="disabled">@csrf

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>First Name <code>*</code></label>
                                                <input type="text" class="form-control" wire:model="brgyOfficialFname"
                                                        placeholder="First Name" />
                                                @error('brgyOfficialFname') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Last Name <code>*</code></label>
                                                <input type="text" class="form-control" wire:model="brgyOfficialLname" 
                                                        placeholder="Last Name"/>
                                                @error('brgyOfficialLname') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Middle Initial</label>
                                                <input type="text" class="form-control" wire:model="brgyOfficialMname" 
                                                    placeholder="Middle Initial" minlength="1" maxlength="1" />
                                                @error('brgyOfficialMname') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Suffix</label>
                                                <input type="text" class="form-control" wire:model="brgyOfficialSuffix" 
                                                        placeholder="e.x Jr, I, II etc"/>
                                                @error('brgyOfficialSuffix') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>House No. <code>*</code></label>
                                                <input type="number" class="form-control" wire:model="brgyOfficialHousenumber" 
                                                        placeholder="House Number"/>
                                                @error('brgyOfficialHousenumber') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>Street Name <code>*</code></label>
                                                <select class="form-control" wire:model="brgyOfficialStreetname">
                                                    <option value="">Select Address</option>
                                                    <option value="Bambang Cor Masangkay St">Bambang Cor Masangkay St</option>
                                                    <option value="G Masangkay St">G Masangkay St</option>
                                                    <option value="Mayhaligue St">Mayhaligue St</option>
                                                </select>
                                                @error('brgyOfficialStreetname') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Email <code>*</code></label>
                                                <input type="email" class="form-control" wire:model="brgyOfficialEmail" 
                                                        placeholder="e.x johndoe@gmail.com"/>
                                                @error('brgyOfficialEmail') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Contact No <code>*</code></label>
                                                <input type="tel" class="form-control" wire:model="brgyOfficialContact" 
                                                        maxlength="12" placeholder="e.x 63+"/>
                                                @error('brgyOfficialContact') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Position <code>*</code></label>
                                                <select class="form-control" wire:model="brgyOfficialPosition">
                                                    <option value="Punong Barangay">Punong Barangay</option>
                                                    <option value="Treasurer">Treasurer</option>
                                                    <option value="Secretary">Secretary</option>
                                                    <option value="Kagawad">Kagawad</option>
                                                </select>
                                                @error('brgyOfficialPosition') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="row justify-content-center">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Upload Barangay Official Image <code>*</code></label>
                                                <input id="brgyImage" type="file"
                                                    class="form-control" wire:model="brgyNewImage" />
                                                    @if($brgyNewImage)
                                                        <p class="card-text">Photo Preview:</p>
                                                        <img src="{{ $brgyNewImage->temporaryUrl() }}" width="100" />
                                                    @else
                                                        <img src="{{ asset('assets/dist/img/barangay-officials/') }} {{ $brgyImage }}" width="120" />
                                                    @endif

                                                    @error('brgyImage') <p class="text-danger">{{ $message }}</p> @enderror
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