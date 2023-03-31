@section('title', 'Barangay Indigency Status')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Barangay Indigency Status</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('user.user-dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                    <a href="{{ route('user.user-indigency') }}">
                                        Barangay Indigency
                                    </a>
                                </li>
                            <li class="breadcrumb-item active">Barangay Indigency Status</li>
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

                        @if(Session::has('indigency_msg'))
                            <div class="alert alert-success" role="alert">
                            <i class="fas fa-check-circle"></i> {{Session::get('indigency_msg')}}
                        </div>
                        @endif

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">List of Barangay Indigency Request</h3>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Indigency No.</th>
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
                                        @foreach ($indigencies as $indigency)

                                        <tr class="text-capitalize">
                                            <td>{{ $indigency->id }}</td>
                                            <td>{{ $indigency->indigencyFname }}</td>
                                            <td>{{ $indigency->indigencyLname }}</td>
                                            <td>
                                                {{ $indigency->indigencyHousenumber }} {{ $indigency->indigencyStreetname }} 
                                            </td>
                                            <td>{{ $indigency->indigencyPurpose }}</td>

                                            <td>
                                                @if($indigency->indigencyStatus == 'pending')

                                                    <span class="badge bg-warning">Pending</span>

                                                @elseif($indigency->indigencyStatus == 'approved')

                                                    <span class="badge bg-success">Approved</span>

                                                @elseif($indigency->indigencyStatus == 'denied')

                                                    <span class="badge bg-danger">Denied</span>

                                                @elseif($indigency->indigencyStatus == 'processed')

                                                    <span class="badge bg-info">Processed</span>

                                                @elseif($indigency->indigencyStatus == 'claimed')

                                                    <span class="badge bg-success">Claimed</span>

                                                @elseif($indigency->indigencyStatus == 'canceled')

                                                    <span class="badge bg-danger">Canceled</span>

                                                @endif
                                            </td>
                                            <td>
                                                @if($indigency->indigencyStatus == 'pending')

                                                    <button class="btn btn-danger"  
                                                        wire:click.prevent="cancelIndigency({{$indigency->id}}, 'canceled')">
                                                        <strong>Cancel Request</strong>
                                                    </button>

                                                @else

                                                    <em>NULL</em>
                                                
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ asset('assets/dist/img/indigencies/'.$indigency->indigencyImage) }}" 
                                                    target="_blank" rel="noopener noreferrer">
                                                    <img alt="Valid Indigency" class="profile-user-img img-fluid img-square"
                                                    src="{{ asset('assets/dist/img/indigencies/'.$indigency->indigencyImage) }}" />
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