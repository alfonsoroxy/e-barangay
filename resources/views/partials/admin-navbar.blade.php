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
            <a class="dropdown-item" href="{{ route('admin.admin-update-resident', Auth::user()->id ) }}">
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

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home-component') }}" class="brand-link">
        <img src="{{ asset('assets/dist/img/barangayLogo.png') }}" alt="Barangay 264 Logo" 
            class="brand-image img-circle elevation-3" style="opacity: .8">
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
                    <a href="{{ route('admin.admin-dashboard') }}" 
                            class="nav-link {{ (request()->routeIs('admin.admin-dashboard')) ? 'active' : '' }}"> 
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">ANNOUNCEMENT</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.admin-announcement') }}" 
                            class="nav-link {{ (request()->routeIs('admin.admin-add-announcement')) ? 'active' : '' }} 
                            {{ (request()->routeIs('admin.admin-announcement')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-bullhorn"></i>
                            <p>
                                Announcements
                                {{-- <span class="badge badge-danger right">
                                    {{ $announcements->count() }}
                                </span> --}}
                            </p>
                        </a>
                    </li>
                        
                    <li class="nav-header">INFORMATION</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.admin-resident') }}" 
                            class="nav-link {{ (request()->routeIs('admin.admin-update-resident')) ? 'active' : '' }} 
                            {{ (request()->routeIs('admin.admin-resident')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Residents
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.admin-barangay-staff') }}" 
                            class="nav-link {{ (request()->routeIs('admin.admin-update-barangay-staff')) ? 'active' : '' }}
                            {{ (request()->routeIs('admin.admin-barangay-staff')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Barangay Staff
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.admin-barangay-official') }}" 
                            class="nav-link {{ (request()->routeIs('admin.admin-update-barangay-official')) ? 'active' : '' }} 
                            {{ (request()->routeIs('admin.admin-barangay-official')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Barangay Officials
                            </p>
                        </a>
                    </li>
                    
                    <li class="nav-header">BARANGAY DOCUMENTS</li>
                    <!-- Barangay Clearance -->
                    <li class="nav-item">
                        <a href="{{ route('admin.admin-clearance') }}" 
                            class="nav-link {{ (request()->routeIs('admin.admin-update-clearance')) ? 'active' : '' }} 
                            {{ (request()->routeIs('admin.admin-clearance')) ? 'active' : '' }}">
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
                        <a href="{{ route('admin.admin-barangay-permit') }}" 
                            class="nav-link {{ (request()->routeIs('admin.admin-update-barangay-permit')) ? 'active' : '' }}
                            {{ (request()->routeIs('admin.admin-barangay-permit')) ? 'active' : '' }}">
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
                        <a href="{{ route('admin.admin-indigency') }}" 
                            class="nav-link  {{ (request()->routeIs('admin.admin-update-indigency')) ? 'active' : '' }}
                            {{ (request()->routeIs('admin.admin-indigency')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Barangay Indigency
                                {{-- <span class="badge badge-danger right">
                                    {{ $indigencies->count() }}
                                </span> --}}
                            </p>
                        </a>
                    </li>

                    <!-- Barangay Certificate  -->
                    <li class="nav-item">
                        <a href="{{ route('admin.admin-certificate')}}" 
                            class="nav-link  {{ (request()->routeIs('admin.admin-update-certificate')) ? 'active' : '' }}
                            {{ (request()->routeIs('admin.admin-certificate')) ? 'active' : '' }}">
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
                        <a href="{{ route('admin.admin-bhert') }}" 
                            class="nav-link  {{ (request()->routeIs('admin.admin-update-bhert')) ? 'active' : '' }}
                            {{ (request()->routeIs('admin.admin-bhert')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-medkit"></i>
                            <p>
                                BHERT Certificate
                            </p>
                        </a>
                    </li> --}}

                    <!-- Business Permit -->
                    <li class="nav-item">
                        <a href="{{ route('admin.admin-business-permit') }}" 
                            class="nav-link  {{ (request()->routeIs('admin.admin-update-business-permit')) ? 'active' : '' }}
                            {{ (request()->routeIs('admin.admin-business-permit')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-id-badge"></i>
                            <p>
                                Business Permit
                                {{-- <span class="badge badge-danger right">
                                    {{ $business_permits->count() }}
                                </span> --}}
                            </p>
                        </a>
                    </li>

                    <!-- First Time Job Seeker -->
                    <li class="nav-item">
                        <a href="{{ route('admin.admin-job-seeker') }}" 
                            class="nav-link  {{ (request()->routeIs('admin.admin-update-job-seeker')) ? 'active' : '' }}
                            {{ (request()->routeIs('admin.admin-job-seeker')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-suitcase"></i>
                            <p>
                                First Time Job Seeker
                                {{-- <span class="badge badge-danger right">
                                    {{ $job_seekers->count() }}
                                </span> --}}
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">USER MANAGEMENT</li>
                    <li class="nav-item">
                        <a href="{{ url('admin/users')}}" 
                            class="nav-link {{ (request()->is('admin/users')) ? 'active' : '' }}
                            {{ (request()->routeIs('admin.user-role.edit-user-role')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-check-circle"></i>
                            <p>
                                User Privilege
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/verify')}}" 
                            class="nav-link {{ (request()->is('admin/verify')) ? 'active' : '' }}
                            {{ Request::is('admin.verify-user.edit-verify-user') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-check-circle"></i>
                            <p>
                                Account Verification
                            </p>
                        </a>
                    </li>

            </ul>
        </nav>
    </div>
</aside>