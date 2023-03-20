@section('title', 'Barangay Clearance Status')

<div>
    <div class="content-wrapper">
        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Barangay Clearance Status</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('user.user-dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                        <a href="{{ route('user.user-clearance') }}">
                                            Barangay Clearance
                                        </a>
                                    </li>
                                <li class="breadcrumb-item active">Barangay Clearance Status</li>
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
    
                            @if(Session::has('clearance_msg'))
                                <div class="alert alert-success" role="alert">
                                <i class="fas fa-check-circle"></i> {{Session::get('clearance_msg')}}
                            </div>
                            @endif
    
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">List of Barangay Clearance Request</h3>
                                </div>
                                <div class="card-body">
                                    <table id="example2" class="table table-responsive table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Clearance No.</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Address</th>
    
                                                <th>Status</th>
                                                <th>Update Status</th>
                                                <th>Valid Document</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clearances->chunk(100) as $row)
                                            @foreach ($row as $clearance)
                                            
                                            <tr class="text-capitalize">
                                                <td>{{ $clearance->id }}</td>
                                                <td>{{ $clearance->clearanceFname }}</td>
                                                <td>{{ $clearance->clearanceLname }}</td>
                                                <td>
                                                    {{ $clearance->clearanceHousenumber }} {{ $clearance->clearanceStreetname }} 
                                                </td>
    
                                                <td>
                                                    @if($clearance->clearanceStatus == 'pending')
    
                                                        <span class="badge bg-warning">Pending</span>
    
                                                    @elseif($clearance->clearanceStatus == 'approved')
    
                                                        <span class="badge bg-success">Approved</span>
    
                                                    @elseif($clearance->clearanceStatus == 'denied')
    
                                                        <span class="badge bg-danger">Denied</span>
    
                                                    @elseif($clearance->clearanceStatus == 'processed')
    
                                                        <span class="badge bg-info">Processed</span>
    
                                                    @elseif($clearance->clearanceStatus == 'claimed')
    
                                                        <span class="badge bg-success">Claimed</span>
    
                                                    @elseif($clearance->clearanceStatus == 'canceled')
    
                                                        <span class="badge bg-danger">Canceled</span>
    
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($clearance->clearanceStatus == 'pending')
    
                                                        <button class="btn btn-danger"  
                                                            wire:click.prevent="cancelClearance({{$clearance->id}}, 'canceled')">
                                                            <strong>Cancel Request</strong>
                                                        </button>
    
                                                    @else
    
                                                        <em>NULL</em>
                                                    
                                                    @endif
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                    <a href="{{ asset('assets/dist/img/clearances/'.$clearance->clearanceImage) }}" target="_blank" rel="noopener noreferrer">
                                                        <img alt="Valid Clearance" class="profile-user-img img-fluid img-square"
                                                        src="{{ asset('assets/dist/img/clearances/'.$clearance->clearanceImage) }}" />
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
</div>