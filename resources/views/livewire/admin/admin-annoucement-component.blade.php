@section('title', 'List of Announcement')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List of Announcement</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">
                                List of Announcement
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
                                <h3 class="card-title">List of Announcement</h3>
                                <a href="{{ route('admin.admin-add-announcement') }}" 
                                    class="btn btn-success float-right">
                                        Add Announcement
                                </a>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Announcement No</th>
                                            <th>Subject</th>
                                            <th>From</th>
                                            <th>Date Announced</th>
                                            <th>Message</th>
                                            <th>Tool</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($announcements as $announcement)

                                        <tr class="text-capitalize">
                                            <td>{{ $announcement->id }}</td>
                                            <td>{{ $announcement->announcementSubject }}</td>
                                            <td>{{ $announcement->announcementFrom }}</td>
                                            <td>{{ $announcement->created_at->toFormattedDateString() }}</td>
                                            <td>{{ $announcement->announcementMessage }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.admin-update-announcement', 
                                                        ['announcement_id' => $announcement->id]) }}" 
                                                        rel="noopener" class="btn btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" rel="noopener" class="btn btn-danger" 
                                                        onclick="confirm('Are you sure, You want do delete this announcement? ') || 
                                                        event.stopImmediatePropagation()" wire:click.prevent="deleteAnnouncement({{$announcement->id}})">
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