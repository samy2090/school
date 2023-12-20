<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title')</title>

	<!-- Global stylesheets -->
	
	<link href="{{asset('dashassets/fonts/inter/inter.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('dashassets/icons/phosphor/styles.min.css')}}" rel="stylesheet" type="text/css">
	
	
	@if (App::getlocale()=='ar')
	<link href="{{asset('dashassets/css/rtl/all.min.css')}}"  id="stylesheet" rel="stylesheet" type="text/css">
	@else
	<link href="{{asset('dashassets/css/ltr/all.min.css')}}"  id="stylesheet" rel="stylesheet" type="text/css">
	@endif
	<!-- /global stylesheets -->
	
	<!-- Core JS files -->
	{{-- <script src="{{asset('dashassets/demo/demo_configurator.js')}}"></script> --}}
	<script src="{{asset('dashassets/js/vendor/ui/headroom.min.js')}}"></script>
	<script src="{{asset('dashassets/demo/pages/navbar_hideable.js')}}"></script>
	<script src="{{asset('dashassets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('dashassets/js/app.js')}}"></script>
	<!-- /theme JS files -->
	@yield('css')

</head>
