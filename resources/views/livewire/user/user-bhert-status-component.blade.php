@section('title', 'BHERT Certificate Status')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">BHERT Certificate Status</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('user.user-dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                    <a href="{{ route('user.user-bhert') }}">
                                        BHERT Certificate
                                    </a>
                                </li>
                            <li class="breadcrumb-item active">BHERT Certificate Status</li>
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

                        @if(Session::has('bhert_msg'))
                            <div class="alert alert-success" role="alert">
                            <i class="fas fa-check-circle"></i> {{Session::get('bhert_msg')}}
                        </div>
                        @endif

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">List of BHERT Certificate Request</h3>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>BHERT No.</th>
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
                                        @foreach ($bherts as $bhert)
                                        
                                        <tr class="text-capitalize">
                                            <td>{{ $bhert->id }}</td>
                                            <td>{{ $bhert->bhertFname }}</td>
                                            <td>{{ $bhert->bhertLname }}</td>
                                            <td>
                                                {{ $bhert->bhertHousenumber }} {{ $bhert->bhertStreetname }} 
                                            </td>
                                            <td>{{ $bhert->bhertPurpose }}</td>
                                            <td>
                                                @if($bhert->bhertStatus == 'pending')

                                                    <span class="badge bg-warning">Pending</span>

                                                @elseif($bhert->bhertStatus == 'approved')

                                                    <span class="badge bg-success">Approved</span>

                                                @elseif($bhert->bhertStatus == 'denied')

                                                    <span class="badge bg-danger">Denied</span>

                                                @elseif($bhert->bhertStatus == 'processed')

                                                    <span class="badge bg-info">Processed</span>

                                                @elseif($bhert->bhertStatus == 'claimed')

                                                    <span class="badge bg-success">Claimed</span>

                                                @elseif($bhert->bhertStatus == 'canceled')

                                                    <span class="badge bg-danger">Canceled</span>

                                                @endif
                                            </td>
                                            <td>
                                                @if($bhert->bhertStatus == 'pending')

                                                    <button class="btn btn-danger"  
                                                        wire:click.prevent="cancelBHERT({{$bhert->id}}, 'canceled')">
                                                        <strong>Cancel Request</strong>
                                                    </button>

                                                @else

                                                    <em>NULL</em>
                                                
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ asset('storage/bherts/'.$bhert->bhertImage) }}" 
                                                    target="_blank" rel="noopener noreferrer">
                                                    <img alt="Valid BHERT" class="profile-user-img img-fluid img-square"
                                                    src="{{ asset('storage/bherts/'.$bhert->bhertImage) }}" />
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