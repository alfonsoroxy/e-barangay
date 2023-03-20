<nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- Login Dropdown Menu -->
@if (Route::has('login'))
@auth
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-user mr-2"></i> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <!-- <span class="dropdown0 -item dropdown-header">Menu</span> -->
        <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('user.user-update-information', Auth::user()->id ) }}">
                <i class="fas fa-user mr-2"></i> {{ __('Update my Information') }}
            </a>
            <a class="dropdown-item" href="{{ route('change-password') }}">
                <i class="fas fa-lock mr-2"></i> {{ __('Change Password') }}
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out-alt mr-2"></i> {{ __('Logout') }}
            </a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        </div>
    </li>  
@endauth
@endif
</ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed mt-5">
    <!-- Brand Logo -->
    <a href="{{ route('home-component') }}" class="brand-link">
        <img src="{{ asset('assets/dist/img/barangayLogo.png') }}" alt="Barangay 264 Logo" 
            class="brand-image img-circle elevation-3" style="opacity: .8" />
        <span class="brand-text font-weight-light">E-Barangay 264</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar position-fixed">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->

            
                <li class="nav-item">
                    <a href="{{ route('home-component') }}" 
                        class="nav-link"> 
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                
                    
                <li class="nav-item">
                   <a href="{{ route('user.user-dashboard') }}" 
                        class="nav-link {{ (request()->routeIs('user.user-dashboard')) ? 'active' : '' }}"> 
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header">ANNOUNCEMENT</li>
                <li class="nav-item">
                   <a href="{{ route('user.user-annoucement') }}" 
                        class="nav-link {{ request()->routeIs('user.user-annoucement') ? 'active' : '' }}"> 
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>
                            View Announcement
                            {{-- <span class="badge badge-danger right">
                                {{ $announcements->count() }}
                            </span> --}}
                        </p>
                    </a>
                </li>

                <li class="nav-header">INFORMATION</li>
                <li class="nav-item">
                    <a href="{{ route('user.user-information') }}" 
                        class="nav-link {{ request()->routeIs('user.user-information') ? 'active' : '' }}
                        {{ request()->routeIs('user.user-update-information') ? 'active' : '' }}"> 
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            View my Information
                        </p>
                    </a>
                </li>
              
                <li class="nav-header">BARANGAY DOCUMENTS</li>
                <!-- Barangay Clearance -->
                <li class="nav-item">
                    <a href="{{ route('user.user-clearance') }}" 
                        class="nav-link {{ (request()->routeIs('user.user-clearance-status')) ? 'active' : '' }}
                        {{ (request()->routeIs('user.user-clearance')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Barangay Clearance
                            {{-- <span class="badge badge-danger right">
                                {{ $clearances->count() }}
                            </span> --}}
                        </p>
                    </a>
                </li>

                <!-- Barangay Permit -->
                <li class="nav-item">
                    <a href="{{ route('user.user-barangay-permit') }}" 
                        class="nav-link {{ (request()->routeIs('user.user-barangay-permit-status')) ? 'active' : '' }}
                        {{ (request()->routeIs('user.user-barangay-permit')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Barangay Permit
                            {{-- <span class="badge badge-danger right">
                                {{ $barangay_permits->count() }}
                            </span> --}}
                        </p>
                    </a>
                </li>

                <!-- Barangay Indigency -->
                <li class="nav-item">
                    <a href="{{ route('user.user-indigency') }}" 
                        class="nav-link {{ (request()->routeIs('user.user-indigency-status')) ? 'active' : '' }}
                        {{ (request()->routeIs('user.user-indigency')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Barangay Indigency
                            {{-- <span class="badge badge-danger right">
                                {{ $indigencies->count() }}
                            </span> --}}
                        </p>
                    </a>
                </li>

                <!-- Barangay Certificate -->
                <li class="nav-item">
                    <a href="{{ route('user.user-certificate') }}" 
                        class="nav-link {{ (request()->routeIs('user.user-certificate-status')) ? 'active' : '' }}
                        {{ (request()->routeIs('user.user-certificate')) ? 'active' : '' }}">                        
                        <i class="nav-icon fas fa-certificate"></i>
                        <p>
                            Barangay Certificate
                            {{-- <span class="badge badge-danger right">
                                {{ $certificates->count() }}
                            </span> --}}
                        </p>
                    </a>
                </li>

                <!-- BHERT Certificate -->
                {{-- <li class="nav-item">
                    <a href="{{ route('user.user-bhert') }}" 
                        class="nav-link {{ (request()->routeIs('user.user-bhert-status')) ? 'active' : '' }}
                        {{ (request()->routeIs('user.user-bhert')) ? 'active' : '' }}">  
                        <i class="nav-icon fas fa-medkit"></i>
                        <p>
                            BHERT Certificate
                        </p>
                    </a>
                </li> --}}

                <!-- Business Permit -->
                <li class="nav-item">
                    <a href="{{ route('user.user-business-permit') }}" 
                        class="nav-link {{ (request()->routeIs('user.user-business-permit-status')) ? 'active' : '' }}
                        {{ (request()->routeIs('user.user-business-permit')) ? 'active' : '' }}"> 
                        <i class="nav-icon fas fa-id-badge"></i>
                        <p>
                            Business Permit
                            {{-- <span class="badge badge-danger right">
                                {{ $business_permits->count() }}
                            </span> --}}
                        </p>
                    </a>
                </li>

                <!-- First Time Job Seeking -->
                <li class="nav-item">
                    <a href="{{ route('user.user-job-seeker') }}" 
                        class="nav-link {{ (request()->routeIs('user.user-job-seeker-status')) ? 'active' : '' }}
                        {{ (request()->routeIs('user.user-job-seeker')) ? 'active' : '' }}"> 
                        <i class="nav-icon fas fa-suitcase"></i>
                        <p>
                            First Time Job Seeker
                            {{-- <span class="badge badge-danger right">
                                {{ $job_seekers->count() }}
                            </span> --}}
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>