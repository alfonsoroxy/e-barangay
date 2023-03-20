@section('title', 'Business Permit Status')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Business Permit Status</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('user.user-dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                    <a href="{{ route('user.user-business-permit') }}">
                                        Business Permit
                                    </a>
                                </li>
                            <li class="breadcrumb-item active">Business Permit Status</li>
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

                        @if(Session::has('business_permit_msg'))
                            <div class="alert alert-success" role="alert">
                            <i class="fas fa-check-circle"></i> {{Session::get('business_permit_msg')}}
                        </div>
                        @endif

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">List of Business Permit Request</h3>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Business Permit No.</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Address</th>

                                            <th>Business Name</th>
                                            <th>Business Year Establish</th>
                                            
                                            <th>Status</th>
                                            <th>Update Status</th>
                                            <th>Valid Document</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($business_permits->chunk(100) as $row)
                                        @foreach ($row as $business_permit)
                                        
                                        <tr class="text-capitalize">
                                            <td>{{ $business_permit->id }}</td>
                                            <td>{{ $business_permit->businessPermitFname }}</td>
                                            <td>{{ $business_permit->businessPermitLname }}</td>
                                            <td>
                                                {{ $business_permit->businessPermitHousenumber }} {{ $business_permit->businessPermitStreetname }} 
                                            </td>
                                            <td>{{ $business_permit->businessPermitBusinessname }}</td>
                                            <td>{{ \Carbon\Carbon::parse($business_permit->businessPermitBusinessYearEstablish)->format('Y') }}</td>

                                            <td>
                                                @if($business_permit->businessPermitStatus == 'pending')

                                                    <span class="badge bg-warning">Pending</span>

                                                @elseif($business_permit->businessPermitStatus == 'approved')

                                                    <span class="badge bg-success">Approved</span>

                                                @elseif($business_permit->businessPermitStatus == 'denied')

                                                    <span class="badge bg-danger">Denied</span>

                                                @elseif($business_permit->businessPermitStatus == 'processed')

                                                    <span class="badge bg-info">Processed</span>

                                                @elseif($business_permit->businessPermitStatus == 'claimed')

                                                    <span class="badge bg-success">Claimed</span>

                                                @elseif($business_permit->businessPermitStatus == 'canceled')

                                                    <span class="badge bg-danger">Canceled</span>

                                                @endif
                                            </td>
                                            <td>
                                                @if($business_permit->businessPermitStatus == 'pending')

                                                    <button class="btn btn-danger"  
                                                        wire:click.prevent="cancelBusinessPermit({{$business_permit->id}}, 'canceled')">
                                                        <strong>Cancel Request</strong>
                                                    </button>

                                                @else

                                                    <em>NULL</em>
                                                
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{asset('assets/dist/img/business-permits/'.$business_permit->businessPermitImage)}}" 
                                                    target="_blank" rel="noopener noreferrer">
                                                    <img alt="Valid Business Permit" class="profile-user-img img-fluid img-square"
                                                    src="{{asset('assets/dist/img/business-permits/'.$business_permit->businessPermitImage)}}" />
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
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