<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>@yield('title')</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="{{ url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}" />
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}" />
<!-- Ionicons -->
<link rel="stylesheet" href="{{ url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}" />
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" />
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
<!-- JQVMap -->
<link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}" />
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}" />
<!-- logo page -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}" />

{{-- Livewire --}}
@livewireStyles

</head>
<body class="hold-transition sidebar-collapse">
<div class="wrapper">
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('assets/dist/img/barangayLogo.png') }}" alt="Barangay 264 Logo" height="60" width="60">
</div>

<nav class="navbar navbar-expand-md navbar-light navbar-light sticky-top">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
      <li class="nav-item">
          <a href="{{ route('home-component') }}" class="brand-link">
              <img src="{{ asset('assets/dist/img/barangayLogo.png') }}" alt="Barangay 264 Logo" 
                  class="brand-image img-circle elevation-3" style="opacity: .8">
              <span class="brand-text font-weight-light">E-Barangay 264</span>
          </a>
      </li>
  </ul>

  <ul class="navbar-nav ml-auto">
      <!-- Login Dropdown Menu -->
  @if (Route::has('login'))
    @auth
        <li class="nav-item">
            <a href="#AboutUs" class="nav-link">About Us</a>
        </li>
        <li class="nav-item">
            <a href="#Services" class="nav-link">Services</a>
        </li>
        <li class="nav-item">
            <a href="#Officials" class="nav-link">Barangay Officials</a>
        </li>
        <li class="nav-item">
            <a href="#Announcements" class="nav-link">Announcements</a>
        </li>
        @if(Auth::user()->is_admin === 'ADM')
        
        <li class="nav-item">
            <a href="{{ route('admin.admin-dashboard') }}" class="nav-link">Dashboard</a>
        </li>
        @else
        
        <li class="nav-item">
            <a href="{{ route('user.user-dashboard') }}" class="nav-link">Dashboard</a>
        </li>
        @endif
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-user mr-2"></i> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- <span class="dropdown0 -item dropdown-header">Menu</span> -->
            <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out-alt mr-2"></i> {{ __('Logout') }}
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            </div>
        </li>  
    @else
        <li class="nav-item">
            <a href="#AboutUs" class="nav-link">About Us</a>
        </li>
        <li class="nav-item">
            <a href="#Services" class="nav-link">Services</a>
        </li>
        <li class="nav-item">
            <a href="#Officials" class="nav-link">Barangay Officials</a>
        </li>
        <li class="nav-item">
            <a href="#Announcements" class="nav-link">Announcements</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">
                <i class="fa fa-user mr-2"></i> Login
            </a>
        </li>   
    @endauth 
  @endif
  </ul>
  
</nav>

{{ $slot }}

@include('partials.footer')

</div>


<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Table -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
      "buttons": ["excel", "pdf",  "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>
{{-- Livewire --}}
@livewireScripts
</body>
</html>
