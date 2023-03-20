<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/dist/css/barangay-asset/barangay-services-styles.css') }}" />

    <!-- logo page -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type = "image/x-icon" />
</head>
<body>
<div class="container">
{{ $slot }}
</div>
</body>
<script>
    window.addEventListener("load", window.print());
</script>
</html>