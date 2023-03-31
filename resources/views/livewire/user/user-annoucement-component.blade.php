@section('title', 'Barangay Announcement')

<div class="content-wrapper">
    <div class="container">
        <section class="content">
            <div class="container-fluid">
                <h1 class="card-text text-center mb-3">Annoucements</h1>
                
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
        {{ $announcements->links() }}
    </div>
</div>