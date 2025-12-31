<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<title>@yield('title') | Zaman's Agro</title>
	<meta name="author" content="stcoderbd">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	@include('frontend.partials.favicon')
	@include('frontend.partials.styles')
    @stack('styles')
</head>
<body id="main">
	<!-- Preloader Start -->
	<div id="preloader">
		<div class="loader3">
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- Preloader End -->
	
	@include('frontend.partials.header')

    @yield('content')

    @include('frontend.partials.footer')

	{{-- <a href="#" class="back-to-top"><i class="ri-arrow-up-s-line"></i></a> --}}
	<a href="#" class="back-to-top"><i class="ri-arrow-up-s-line"></i></a>
    
	@include('frontend.partials.scripts')

    @stack('scripts')
</body>
</html>