@section('title', 'Barangay 264')

<div class="content-wrapper">

    <div id="carouselExampleIndicators" class="carousel slide mb-3" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('assets/dist/img/carousel/slide-1.jpg') }}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Barangay Hall of the Barangay 264</h5>
                    <p>
                        Serves as the office of the barangay captain and meeting place for the Sangguniang Barangay.
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/dist/img/carousel/slide-2.jpg') }}" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>PALIGA (Summer League and Christmas League)</h5>
                    <p>
                        Barangay 264 Basketball League in the certain Barangay leads by SK Chairman.
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('assets/dist/img/carousel/slide-3.jpg') }}" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Barangay Meetings</h5>
                    <p>
                        It is a primary program that promotes quality life among person.
                    </p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <section class="content" id="AboutUs">
        <div class="container">
            <div class="card-body row">
                <div class="col-sm-5 text-center d-flex align-items-center justify-content-center">
                    <div class="">
                        <h2 class="text-center mb-3">
                            <strong>About Us</strong>
                        </h2>
                        <img src="{{ asset('assets/dist/img/about-us.jpg') }}" 
                        class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="About Us">
                    </div>
                </div>
                <div class="col-sm-7">
                    {{-- <p class="lead mb-5">Barangay 264<br> --}}
                    <h3 class="text-center mt-3 mb-3">
                        <strong>Where is Barangay 264?</strong>
                    </h3>
                    <p class="card-text mr-5 ml-5">
                        A barangay, historically referred to as barrio, is the smallest administrative division 
                        in the Philippines and is the native Filipino term for a village, district, or ward. 
                        In metropolitan areas, the term often refers to an inner city neighborhood, a suburb, 
                        or a suburban neighborhood or even a borough.
                    </p>
                    <p class="card-text mr-5 ml-5">
                        The Barangay 264 Hall is located in Masangkay St. Tondo Manila, next to the Philippine
                        Academy of Sakya, and also in front of SSS (Social Security System)
                    </p>
                    <h3 class="text-center mb-3">
                        <strong>Our Mission and Vision</strong>
                    </h3>
                    <p class="card-text mr-5 ml-5">
                        As a primary planning and implementing unit, the barangay is mandated to 
                        plan developments projects and programs and implement government policies and 
                        activities in the community, create projects in its territory and to deliver basic services 
                        of the government to the people.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="content" id="Services">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col text-center">
                        <h2>
                            <strong>Services Offer</strong>
                        </h2>
                        <p class="card-text">
                            Here's the services that Barangay 264 offers
                        </p>
                    </div> 
                </div>
                <div class="row text-center d-flex align-items-center justify-content-center mt-5 mb-5">
                    <div class="col-sm-5 mb-3">
                        <div class="row" >
                            <div class="col-sm-4 text-center">
                                <i class="fas fa-file" style="font-size: 50px"></i>
                            </div>
                            <div class="col-sm-8">
                                <h3>Barangay Documents</h3>
                                <p class="card-text">
                                    There are a variety of documents that may be provided by a barangay, 
                                    depending on the needs and services of the community.
                                </p>
                            </div>
                        </div>
                    </div> 
                    <div class="col-sm-5">
                        <div class="row" >
                            <div class="col-sm-4 text-center">
                                <i class="fas fa-file" style="font-size: 50px"></i>
                            </div>
                            <div class="col-sm-8">
                                <h3>Barangay Document Request</h3>
                                <p class="card-text">
                                    The Barangay 264 offers basic barangay documents which includes;
                                    Barangay Clearance, Barangay Certificate, Barangay Permit,
                                    Business Permit, Barangay Indigency, and the
                                    Certificate of First Time Job Seeking. 
                                </p>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </div>

    <section class="content" id="Officials">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h2 class="text-center mt-3 mb-3">
                        <strong>Barangay Officials</strong>
                    </h2>
                    <p class="text-center">
                        Here are the Barangay Officials of Barangay 264
                    </p>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-6">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($barangay_officials as $barangay_official)

                            <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                                <div class="card card-primary card-outline d-block w-100">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('storage/barangay-officials/'.$barangay_official->brgyImage) }}"
                                            alt="Barangay Official">
                                        </div>
                    
                                        <h3 class="profile-username text-center text-capitalize">
                                            <a href="" target="_blank">
                                                {{ $barangay_official->brgyOfficialFname }} {{ $barangay_official->brgyOfficialMname }}
                                                {{ $barangay_official->brgyOfficialLname }} {{ $barangay_official->brgyOfficialSuffix }}
                                            </a>
                                            </h3>
                        
                                        <p class="text-muted text-center">
                                            {{ $barangay_official->brgyOfficialPosition }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="content" id="Announcements">
        <div class="container-fluid">
            <div class="card-body">
                <div class="row">
                    <div class="col text-center">
                        <h2>
                            <strong>Announcements</strong>
                        </h2>
                    </div> 
                </div>
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
        </div>
        {{ $announcements->links() }}
    </div>

</div>