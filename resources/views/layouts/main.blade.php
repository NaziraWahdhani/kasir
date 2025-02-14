<!doctype html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&amp;family=Roboto+Mono&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('assets/build/styles/ltr-core.css') }}"  rel="stylesheet" />
    <link href="{{ asset('assets/build/styles/ltr-vendor.css') }}" rel="stylesheet" />
    <title>Dashboard | Kasir</title>
</head>

<body class="theme-light preload-active aside-active aside-mobile-minimized aside-desktop-maximized" id="fullscreen">
<div>
    @include('layouts.sidebar.main')
</div>
<div class="wrapper">
    @include('layouts.partials.header')
    @yield('content')
    @include('layouts.partials.footer')
</div>

<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/select2.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/blockui.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/build/scripts/mandatory.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/build/scripts/core.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/build/scripts/vendor.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/app/home.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/app/datatable/basic/menu.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/build.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('assets/app/form/datepicker.js') }}"></script>--}}
@stack('js')
{{--<script>
    $(document).ready(function () {
        $("#datepicker-1, #datepicker-2, #datepicker-3").datepicker({
            dateFormat: "dd-mm-yyyy",
            changeMonth: true,
            changeYear: true
        });
    });
</script>--}}
</body>

</html>


