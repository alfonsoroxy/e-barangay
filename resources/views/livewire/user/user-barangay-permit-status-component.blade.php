@section('title', 'Barangay Permit Status')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Barangay Permit Status</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('user.user-dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item">
                                    <a href="{{ route('user.user-barangay-permit') }}">
                                        Barangay Permit
                                    </a>
                                </li>
                            <li class="breadcrumb-item active">Barangay Permit Status</li>
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

                        @if(Session::has('brgy_permit_msg'))
                        <div class="alert alert-success" role="alert">
                            <i class="fas fa-check-circle"></i> {{Session::get('brgy_permit_msg')}}
                        </div>
                        @endif

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">List of Barangay Permit Request</h3>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Barangay Permit No</th>
                                            <th>Permit Name</th>
                                            <th>Address</th>
                                            
                                            <th>Status</th>
                                            <th>Update Status</th>
                                            <th>Valid Document</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barangay_permits as $barangay_permit)

                                        <tr class="text-capitalize">
                                            <td>{{ $barangay_permit->id }}</td>
                                            <td>
                                                {{ $barangay_permit->barangayPermitName }}
                                            </td>
                                            <td>
                                                {{ $barangay_permit->barangayPermitHousenumber }} {{ $barangay_permit->barangayPermitStreetname }} 
                                            </td>

                                            <td>
                                                @if($barangay_permit->barangayPermitStatus == 'pending')

                                                    <span class="badge bg-warning">Pending</span>

                                                @elseif($barangay_permit->barangayPermitStatus == 'approved')

                                                    <span class="badge bg-success">Approved</span>

                                                @elseif($barangay_permit->barangayPermitStatus == 'denied')

                                                    <span class="badge bg-danger">Denied</span>

                                                @elseif($barangay_permit->barangayPermitStatus == 'processed')

                                                    <span class="badge bg-info">Processed</span>

                                                @elseif($barangay_permit->barangayPermitStatus == 'claimed')

                                                    <span class="badge bg-success">Claimed</span>

                                                @elseif($barangay_permit->barangayPermitStatus == 'canceled')

                                                    <span class="badge bg-danger">Canceled</span>

                                                @endif
                                            </td>
                                            <td>
                                                @if($barangay_permit->barangayPermitStatus == 'pending')

                                                    <button class="btn btn-danger"  
                                                        wire:click.prevent="cancelBarangayPermit({{$barangay_permit->id}}, 'canceled')">
                                                        <strong>Cancel Request</strong>
                                                    </button>

                                                @else

                                                    <em>NULL</em>
                                                
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ asset('storage/barangay-permits/'.$barangay_permit->barangayPermitImage) }}" 
                                                    target="_blank" rel="noopener noreferrer">
                                                    <img alt="Valid Barangay Permit" class="profile-user-img img-fluid img-square"
                                                    src="{{ asset('storage/barangay-permits/'.$barangay_permit->barangayPermitImage) }}" />
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