@section('title', 'List of Barangay Officials')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List of Barangay Officials</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">
                                List of Barangay Officials
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle"></i> {{Session::get('message')}}
                </div>
            @endif

            <div class="container-fluid">     
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">List of Barangay Officials</h3>
                                <a href="{{ route('admin.admin-add-barangay-official') }}" 
                                    class="btn btn-success float-right">
                                        Add Barangay Official
                                </a>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Barangay Official Image</th>
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Contact No</th>
                                            <th>Position</th>
                                            <th>Tool</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barangay_officials as $barangay_official)

                                        <tr>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ URL::to('storage/barangay-officials/'.$barangay_official->brgyImage) }}" target="_blank" rel="noopener noreferrer">
                                                    <img alt="Barangay Official" class="profile-user-img img-fluid img-circle"
                                                    src="{{ URL::to('storage/barangay-officials/'.$barangay_official->brgyImage) }}" />
                                                </a>
                                            </td>
                                            <td class="text-capitalize">
                                                {{ $barangay_official->brgyOfficialFname }} {{ $barangay_official->brgyOfficialMname }}
                                                {{ $barangay_official->brgyOfficialLname }} {{ $barangay_official->brgyOfficialSuffix }}
                                            </td>
                                            <td>
                                                {{ $barangay_official->brgyOfficialHousenumber }} {{ $barangay_official->brgyOfficialStreetname }} 
                                            </td>
                                            <td>{{ $barangay_official->brgyOfficialEmail }}</td>
                                            <td>{{ $barangay_official->brgyOfficialContact }}</td>
                                            <td>
                                                @if($barangay_official->brgyOfficialPosition == 'Punong Barangay')

                                                    <span class="badge bg-success">Punong Barangay</span>

                                                @elseif($barangay_official->brgyOfficialPosition == 'Kagawad')

                                                    <span class="badge bg-warning">Kagawad</span>

                                                @elseif($barangay_official->brgyOfficialPosition == 'Secretary')

                                                    <span class="badge bg-info">Secretary</span>

                                                @elseif($barangay_official->brgyOfficialPosition == 'Treasurer')

                                                    <span class="badge bg-danger">Treasurer</span>

                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.admin-update-barangay-official', 
                                                        ['barangay_official_id' => $barangay_official->id]) }}" 
                                                        rel="noopener" class="btn btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" rel="noopener" class="btn btn-danger" 
                                                        onclick="confirm('Are you sure, You want do delete this barangay official? ') || 
                                                        event.stopImmediatePropagation()" wire:click.prevent="deleteBarangayOfficial({{$barangay_official->id}})">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
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