@section('title', 'Barangay Certificate Status')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Barangay Certificate Status</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('user.user-dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                    <a href="{{ route('user.user-certificate') }}">
                                        Barangay Certificate
                                    </a>
                                </li>
                            <li class="breadcrumb-item active">Barangay Certificate Status</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">
                            <i class="fas fa-check-circle"></i> {{Session::get('message')}}
                        </div>
                        @endif

                        @if(Session::has('certificate_msg'))
                            <div class="alert alert-success" role="alert">
                            <i class="fas fa-check-circle"></i> {{Session::get('certificate_msg')}}
                        </div>
                        @endif

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">List of Barangay Certificate Request</h3>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Certificate No.</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Address</th>

                                            <th>Purpose</th>
                                            
                                            <th>Status</th>
                                            <th>Update Status</th>
                                            <th>Valid Document</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($certificates as $certificate)

                                        <tr class="text-capitalize">
                                            <td>{{ $certificate->id }}</td>
                                            <td>{{ $certificate->certificateFname }}</td>
                                            <td>{{ $certificate->certificateLname }}</td>
                                            <td>
                                                {{ $certificate->certificateHousenumber }} {{ $certificate->certificateStreetname }}
                                            </td>
                                            <td>{{ $certificate->certificatePurpose }}</td>

                                            <td>
                                                @if($certificate->certificateStatus == 'pending')

                                                    <span class="badge bg-warning">Pending</span>

                                                @elseif($certificate->certificateStatus == 'approved')

                                                    <span class="badge bg-success">Approved</span>

                                                @elseif($certificate->certificateStatus == 'denied')

                                                    <span class="badge bg-danger">Denied</span>

                                                @elseif($certificate->certificateStatus == 'processed')

                                                    <span class="badge bg-info">Processed</span>

                                                @elseif($certificate->certificateStatus == 'claimed')

                                                    <span class="badge bg-success">Claimed</span>

                                                @elseif($certificate->certificateStatus == 'canceled')

                                                    <span class="badge bg-danger">Canceled</span>

                                                @endif
                                            </td>
                                            <td>
                                                @if($certificate->certificateStatus == 'pending')

                                                    <button class="btn btn-danger"  
                                                        wire:click.prevent="cancelCertificate({{$certificate->id}}, 'canceled')">
                                                        <strong>Cancel Request</strong>
                                                    </button>

                                                @else

                                                    <em>NULL</em>
                                                
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ URL::to('storage/certificates/'.$certificate->certificateImage) }}" 
                                                    target="_blank" rel="noopener noreferrer">
                                                    <img alt="Valid Certificate" class="profile-user-img img-fluid img-square"
                                                    src="{{ URL::to('storage/certificates/'.$certificate->certificateImage) }}" />
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>