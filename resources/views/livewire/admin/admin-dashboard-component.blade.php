@section('title', 'E-Barangay Admin Dashboard')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @if(Session::has('status'))
            <div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle"></i> {{Session::get('status')}}
            </div>
        @endif

        <!-- Resident Population -->
        <section class="content">
            <div class="container-fluid">
                <h1 class="card-text text-center mb-3">Resident Users</h1>
                <div class="row justify-content-center"> 
                    <div class="col-sm-4">
                        <div class="info-box bg-warning">
                            <span class="info-box-icon"><i class="fas fa-female"></i></span>
            
                            <div class="info-box-content">
                            <span class="info-box-text">Total Female User</span>
                            <span class="info-box-number">{{ auth()->user()->countFemale() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="info-box bg-warning">
                            <span class="info-box-icon"><i class="fas fa-male"></i></span>
            
                            <div class="info-box-content">
                            <span class="info-box-text">Total Male User</span>
                            <span class="info-box-number">{{ auth()->user()->countMale() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="info-box bg-warning">
                            <span class="info-box-icon"><i class="fas fa-user"></i></span>
            
                            <div class="info-box-content">
                            <span class="info-box-text">Total User</span>
                            <span class="info-box-number">{{ $users->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Age Category -->
        <section class="content" id="age-category">
            <div class="container-fluid">
                {{-- <h1 class="card-text text-center mb-3">Age Category</h1> --}}
                <div class="row">
                    <div class="col-sm-4">
                        <div class="info-box bg-warning">
                            <span class="info-box-icon"><i class="fas fa-male"></i></span>
            
                            <div class="info-box-content">
                            <span class="info-box-text">Total Adult</span>
                            <span class="info-box-number">
                                {{ auth()->user()->countAdult()->count() }}
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="info-box bg-warning">
                            <span class="info-box-icon"><i class="fas fa-male"></i></span>
            
                            <div class="info-box-content">
                            <span class="info-box-text">Total Middle Adult</span>
                            <span class="info-box-number">
                                {{ auth()->user()->countMiddleAge()->count() }}
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="info-box bg-warning">
                            <span class="info-box-icon"><i class="fas fa-male"></i></span>
            
                            <div class="info-box-content">
                            <span class="info-box-text">Total Old Adult</span>
                            <span class="info-box-number">
                                {{ auth()->user()->countOldAge()->count() }}
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- List Document Request Content -->
        <section class="content mt-5" id="list-document-request">
            <div class="container-fluid">
                <h1 class="card-text text-center mb-3">List of Pending Document Request</h1>
                <div class="row"> 
                    <div class="col-sm-4">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                            <h3>{{ $clearances->count() }}</h3>

                            <p><strong>Barangay Clearance</strong></p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-ios-paper"></i>
                            </div>
                            <a href="{{ route('admin.admin-clearance') }}" class="small-box-footer">
                                View Request <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-sm-4">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $barangay_permits->count() }}</h3>

                            <p><strong>Barangay Permit</strong></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-paper"></i>
                        </div>
                        <a href="{{ route('admin.admin-barangay-permit') }}" class="small-box-footer">
                            View Request <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-sm-4">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $indigencies->count() }}</h3>

                            <p><strong>Barangay Indigency</strong></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-paper"></i>
                        </div>
                        <a href="{{ route('admin.admin-indigency') }}" class="small-box-footer">
                            View Request <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    </div>
                </div>
                <div class="row"> 
                    {{-- <div class="col-sm-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                            <h3>{{ $bherts->count() }}</h3>

                            <p><strong>BHERT Certificate</strong></p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-ios-paper"></i>
                            </div>
                            <a href="{{ route('admin.admin-bhert') }}" class="small-box-footer">
                                View Request <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div> --}}
                    <div class="col-sm-4">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                            <h3>{{ $certificates->count() }}</h3>
        
                            <p><strong>Barangay Certificate</strong></p>
                            </div>
                            <div class="icon">
                            <i class="ion fas ion-ios-paper"></i>
                            </div>
                            <a href="{{ route('admin.admin-certificate') }}" class="small-box-footer">
                                View Request <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $business_permits->count() }}</h3>

                            <p><strong>Business Permit</strong></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-paper"></i>
                        </div>
                        <a href="{{ route('admin.admin-business-permit') }}" class="small-box-footer">
                            View Request <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-sm-4">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $job_seekers->count() }}</h3>

                            <p><strong>First Time Job Seeker</strong></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-paper"></i>
                        </div>
                        <a href="{{ route('admin.admin-job-seeker') }}" class="small-box-footer">
                            View Request <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div>
        </section>
    </div>
</div>
