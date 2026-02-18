<!-- Preconnect to external domains for faster loading -->
<link rel="preconnect" href="https://unpkg.com" crossorigin>
<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
<link rel="dns-prefetch" href="https://unpkg.com">
<link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">

<!-- Critical CSS loaded immediately -->
<link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" type="text/css" />

<!-- Non-critical CSS deferred -->
<link rel="stylesheet" href="https://unpkg.com/lenis@1.3.8/dist/lenis.css" media="print" onload="this.media='all'">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" media="print" onload="this.media='all'" />
<link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" media="print" onload="this.media='all'" />
<link href="{{ asset('frontend/css/magnific-popup.css') }}" rel="stylesheet" type="text/css" media="print" onload="this.media='all'" />
<link href="{{ asset('frontend/css/helper.css') }}" rel="stylesheet" type="text/css" media="print" onload="this.media='all'" />
<link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" type="text/css" media="print" onload="this.media='all'" />
<noscript>
    <link rel="stylesheet" href="https://unpkg.com/lenis@1.3.8/dist/lenis.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/css/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/css/helper.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" type="text/css" />
</noscript>

