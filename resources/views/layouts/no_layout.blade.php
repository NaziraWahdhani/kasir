@php
use App\Models\Config;
@endphp
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&amp;family=Roboto+Mono&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('assets/build/styles/ltr-core.css') }}"  rel="stylesheet" />
    <link href="{{ asset('assets/build/styles/ltr-vendor.css') }}" rel="stylesheet" />
    @stack('css')
    @if (isset($judul))
        <title>{{ $judul }}></title>
    @elseif (!isset($title))
        <title>{{ Config::item('application_name') }}</title>
    @else
        <title>{{ ucwords($title) }}</title>
    @endif
	<style>
		.bg-color-dark-grey{
			background: #E5E5E5;
		}
		.bg-color-grey{
			background: #EEEEEE;
		}
		.dark-grey-imp{
			background: #E5E5E5 !important;
		}
		.grey-imp{
			background: #EEEEEE !important;
		}
		.btn-square-xs {
			width: 32.5px;
			max-width: 100% !important;
			max-height: 100% !important;
			height: 32.5px;
			text-align: center;
			padding: 0px;
		}
		.close {
			position: absolute;
			right: 10px;
		}
		.sticky{
			width: auto !important; position: fixed; top: 0px; z-index: auto;
		}

		.bg-purple {
			background: #835AEB !important;
			color: #fff !important;
		}

		.bg-orange {
			background: #FC9A07;
			color: #fff;
		}

		.bg-young-purple {
			background: #B49CF3 !important;
			color: #fff !important
		}

		.bg-purple-hover {
			background: #A88BF1;
		}

		body{
			padding:0.8px;
			margin:0.8px;
		}
	</style>
</head>

<body class="theme-light preload-active" id="fullscreen">
	<div class="preload">
		<div class="preload-dialog">
			<div class="spinner-border text-primary preload-spinner"></div>
		</div>
	</div>
	<div class="holder">
		<div class="wrapper">
			<div class="content">
				<div class="container-fluid">
					@yield('content')
				</div>
			</div>
		</div>
	</div>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/select2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/blockui.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/build/scripts/mandatory.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/build/scripts/core.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/build/scripts/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/app/home.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/app/datatable/basic/menu.js') }}"></script>
    {{--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/build.js') }}"></script>
    {{--<script type="text/javascript" src="{{ asset('assets/app/form/datepicker.js') }}"></script>--}}
    @stack('js')
	<script src="{{ asset('assets/js/localization.js') }}"></script>
	<script src="{{ asset('assets/js/locale.js') }}"></script>
	<script src="{{ asset('assets/themes/panely/assets/build/scripts/build.js') }}"></script>
	{{-- <script src="{{ asset('assets/plugins/jquery-ui.custom/jquery-ui.min.js') }}"></script> --}}
	@stack('page_script')
</body>
</html>
