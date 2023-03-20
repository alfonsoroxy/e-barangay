@section('title', 'E-Barangay Dashboard')

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
        <!-- Content -->
        <section class="content">

            @if(Session::has('status'))
                <div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle"></i> {{Session::get('status')}}
            </div>
            @endif

            @if($barangay_permits_processed)
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-info-circle"></i>
                    One of your request for <strong>Barangay Permit</strong>
                    has been already processed, you can now proceed to barangay hall.
                    Thank you.
                </div>
            @endif
            
            {{-- @if($bherts_processed)
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-info-circle"></i>
                    One of your request for <strong>BHERT Certificate</strong>
                    has been already processed, you can now proceed to barangay hall.
                    Thank you.
                </div>
            @endif --}}
            
            @if($business_permits_processed)
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-info-circle"></i>
                    One of your request for <strong>Business Permit</strong>
                    has been already processed, you can now proceed to barangay hall.
                    Thank you.
                </div>
            @endif

            @if($certificates_processed)
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-info-circle"></i>
                    One of your request for <strong>Barangay Certificate</strong>
                    has been already processed, you can now proceed to barangay hall.
                    Thank you.
                </div>
            @endif

            @if($clearances_processed)
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-info-circle"></i>
                    One of your request for <strong>Barangay Clearance</strong>
                    has been already processed, you can now proceed to barangay hall.
                    Thank you.
                </div>
            @endif

            @if($indigencies_processed)
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-info-circle"></i>
                    One of your request for <strong>Barangay Indegency</strong>
                    has been already processed, you can now proceed to barangay hall.
                    Thank you.
                </div>
            @endif

            @if($job_seekers_processed)
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-info-circle"></i>
                    One of your request for <strong>First Time Job Seeker Certificate</strong>
                    has been already processed, you can now proceed to barangay hall.
                    Thank you.
                </div>
            @endif

            <div class="container-fluid">
                <h1 class="card-text text-center mb-3">List of Pending Document Request</h1>
                <div class="row"> 
                    <div class="col-sm-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $clearances->count() }}</h3>
                                <p><strong>Barangay Clearance</strong></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-paper"></i>
                            </div>
                            <a href="{{ route('user.user-clearance-status') }}" class="small-box-footer">
                                View Status <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="small-box bg-info">
                            <div class="inner">
                            <h3>{{ $barangay_permits->count() }}</h3>
    
                            <p><strong>Barangay Permit</strong></p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-ios-paper"></i>
                            </div>
                            <a href="{{ route('user.user-barangay-permit-status') }}" class="small-box-footer">
                                View Status <i class="fas fa-arrow-circle-right"></i>
                            </a>
                    </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                            <h3>{{ $indigencies->count() }}</h3>
    
                            <p><strong>Barangay Indigency</strong></p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-ios-paper"></i>
                            </div>
                            <a href="{{ route('user.user-indigency-status') }}" class="small-box-footer">
                                View Status <i class="fas fa-arrow-circle-right"></i>
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
                            <a href="{{ route('user.user-bhert-status') }}" class="small-box-footer">
                                View Status <i class="fas fa-arrow-circle-right"></i>                                
                            </a>
                        </div>
                    </div> --}}
                    <div class="col-sm-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $certificates->count() }}</h3>
        
                                <p><strong>Barangay Certificate</strong></p>
                            </div>
                            <div class="icon">
                                <i class="ion fas ion-ios-paper"></i>
                            </div>
                            <a href="{{ route('user.user-certificate-status') }}" class="small-box-footer">
                                View Status <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $business_permits->count() }}</h3>
                                <p><strong>Business Permit</strong></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-paper"></i>
                            </div>
                            <a href="{{ route('user.user-business-permit-status') }}" class="small-box-footer">
                                View Status <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $job_seekers->count() }}</h3>
                                <p><strong>First Time Job Seeker</strong></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-paper"></i>
                            </div>
                            <a href="{{ route('user.user-job-seeker-status') }}" class="small-box-footer">
                                View Status <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <!-- View Annoucement Content  -->
        <section class="content">
            <div class="container-fluid">
                <h1 class="card-text text-center mb-3">Announcements</h1>
                @if(!$announcements->isEmpty())
                @foreach ($announcements as $announcement)

                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <strong>Subject: </strong>
                                    <em class="text-danger">
                                        {{ $announcement->announcementSubject }}
                                    </em>
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    <em>Date Announced: 
                                        <strong>{{ $announcement->created_at }}</strong>
                                    </em>
                                </p>
                                <p class="card-text">
                                    {{ $announcement->announcementMessage }}
                                </p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text">
                                    <em>From: 
                                        <strong>{{ $announcement->announcementFrom }}</strong>
                                    </em> 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                    
                @endforeach
                @else

                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">There's no currently annoucement</p>
                    </div>
                </div>

                @endif
            </div>
        </section>
    </div>
</div>