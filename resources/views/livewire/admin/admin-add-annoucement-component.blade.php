@section('title', 'Add Announcement')

<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Announcement</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.admin-announcement') }}">List Announcement</a>
                            </li>
                            <li class="breadcrumb-item active">Add Announcement</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Add Announcement</h3>
                            </div>
                            <form wire:submit.prevent="addAnnouncement" wire:loading.attr="disabled">@csrf

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label>Subject <code>*</code></label>
                                                <input type="text" class="form-control" wire:model="announcementSubject"
                                                        placeholder="e.x Annoucement for ..." />
                                                @error('announcementSubject') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>From <code>*</code></label>
                                                <input type="text" class="form-control" wire:model="announcementFrom" 
                                                        placeholder="e.x Barangay Secretary"/>
                                                @error('announcementFrom') <p class="text-danger">{{ $message }}</p> @enderror
    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="announcementMessage">Message <code>*</code></label>
                                                <textarea class="form-control" wire:model="announcementMessage" rows="5" placeholder="Good Day ...">

                                                </textarea>
                                                @error('announcementMessage') <p class="text-danger">{{ $message }}</p> @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success float-right"
                                        wire:loading.attr="disabled" :disabled="$formSubmitted">
                                        Add Announcement
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>