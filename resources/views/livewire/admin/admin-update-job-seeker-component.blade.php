@section('title', 'Update First Time Job Seeker')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update First Time Job Seeker</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-job-seeker') }}">List First Time Job Seeker</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Update First Time Job Seeker
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
                              <h3 class="card-title">Update First Time Job Seeker</h3>
                            </div>
                            <form wire:submit.prevent="updateJobSeeker" wire:loading.attr="disabled">@csrf

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>First Name <code>*</code></label>
                                                <input type="text" class="form-control" wire:model="jobSeekerFname"
                                                        placeholder="First Name" />
                                                @error('jobSeekerFname') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Last Name <code>*</code></label>
                                                <input type="text" class="form-control" wire:model="jobSeekerLname" 
                                                        placeholder="Last Name"/>
                                                @error('jobSeekerLname') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Middle Initial</label>
                                                <input type="text" class="form-control" wire:model="jobSeekerMname" 
                                                    placeholder="Middle Initial" minlength="1" maxlength="1" />
                                                @error('jobSeekerMname') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Suffix</label>
                                                <input type="text" class="form-control" wire:model="jobSeekerSuffix" 
                                                        placeholder="e.x Jr, I, II etc"/>
                                                @error('jobSeekerSuffix') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>House No. <code>*</code></label>
                                                <input type="number" class="form-control" wire:model="jobSeekerHousenumber" 
                                                        placeholder="House Number"/>
                                                @error('jobSeekerHousenumber') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>Street Name <code>*</code></label>
                                                <select class="form-control" wire:model="jobSeekerStreetname">
                                                    <option value="Bambang Cor Masangkay St">Bambang Cor Masangkay St</option>
                                                    <option value="G Masangkay St">G Masangkay St</option>
                                                    <option value="Mayhaligue St">Mayhaligue St</option>
                                                </select>
                                                @error('jobSeekerStreetname') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Gender <code>*</code></label>
                                                <select class="form-control" wire:model="jobSeekerGender">
                                                    <option value="Female">Female</option>
                                                    <option value="Male">Male</option>
                                                </select>
                                                @error('jobSeekerGender') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Marital Status <code>*</code></label>
                                                <select class="form-control" wire:model="jobSeekerMaritalstatus">
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Separated">Separated</option>
                                                    <option value="Widowed">Widowed</option>
                                                </select>
                                                @error('jobSeekerMaritalstatus') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Nationality <code>*</code></label>
                                                <input type="text" class="form-control" wire:model="jobSeekerNationality" 
                                                        placeholder="e.x Filipino"/>
                                                @error('jobSeekerNationality') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Date Of Birth <code>*</code></label>
                                                <input type="date" class="form-control" 
                                                        wire:model="jobSeekerAge" required/>
                                                @error('jobSeekerAge') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Date of Stay in Barangay<code>*</code></label>
                                                <input type="date" class="form-control"
                                                        wire:model="jobSeekerResidentstayyears" required/>
                                                @error('jobSeekerResidentstayyears') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success float-right">Update</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>