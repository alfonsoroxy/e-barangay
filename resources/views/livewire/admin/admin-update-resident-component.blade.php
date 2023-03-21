@section('title', 'Update Barangay Resident')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Barangay Resident</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-resident') }}">List of Barangay Resident</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Update Barangay Resident
                            </li>
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
                              <h3 class="card-title">Update Barangay Resident</h3>
                            </div>
                            <form wire:submit.prevent="updateResident" wire:loading.attr="disabled">@csrf

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>First Name <code>*</code></label>
                                                <input type="text" class="form-control" wire:model="first_name"
                                                        placeholder="First Name" />
                                                @error('first_name') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Last Name <code>*</code></label>
                                                <input type="text" class="form-control" wire:model="last_name" 
                                                        placeholder="Last Name"/>
                                                @error('last_name') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Middle Initial</label>
                                                <input type="text" class="form-control" wire:model="mname" 
                                                    placeholder="Middle Initial" minlength="1" maxlength="1" />
                                                @error('mname') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Suffix</label>
                                                <input type="text" class="form-control" wire:model="suffix" 
                                                        placeholder="e.x Jr, I, II etc"/>
                                                @error('suffix') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>House No. <code>*</code></label>
                                                <input type="number" class="form-control" wire:model="houseNumber" 
                                                        placeholder="House Number"/>
                                                @error('houseNumber') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>Street Name <code>*</code></label>
                                                <select class="form-control" wire:model="streetName">
                                                    <option value="Bambang Cor Masangkay St">Bambang Cor Masangkay St</option>
                                                    <option value="G Masangkay St">G Masangkay St</option>
                                                    <option value="Mayhaligue St">Mayhaligue St</option>
                                                </select>
                                                @error('streetName') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Birthdate <code>*</code></label>
                                                <input type="date" class="form-control" wire:model="birthday" />
                                                @error('birthday') <p class="text-danger">{{ $message }}</p> @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Gender <code>*</code></label>
                                                <select class="form-control" wire:model="gender">
                                                    <option value="Female">Female</option>
                                                    <option value="Male">Male</option>
                                                </select>
                                                @error('gender') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Marital Status <code>*</code></label>
                                                <select class="form-control" wire:model="maritalStatus">
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Separated">Separated</option>
                                                    <option value="Widowed">Widowed</option>
                                                </select>
                                                @error('maritalStatus') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Nationality <code>*</code></label>
                                                <input type="text" class="form-control" wire:model="nationality" 
                                                        placeholder="e.x Filipino"/>
                                                @error('nationality') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="row justify-content-center">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Contact No <code>*</code></label>
                                                <input type="phone" class="form-control" wire:model="contact" 
                                                        placeholder="e.x 63+ Start in 9.."/>
                                                @error('contact') <p class="text-danger">{{ $message }}</p> @enderror
    
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