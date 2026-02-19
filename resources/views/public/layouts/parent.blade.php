<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang=""> <!--<![endif]-->


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="icon" href="{{ asset("img/content/favicons/android-icon-192x192.png") }}" type="image/x-icon">
	<link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
	<link rel="stylesheet" href="{{asset("css/normalize.css")}} ">
	<link rel="stylesheet" href="{{asset("css/scrollbar.css")}}">
	<link rel="stylesheet" href="{{asset("css/fontawesome/fontawesome-all.css")}}">
	<link rel="stylesheet" href="{{asset("css/font-awesome.min.css")}}">
	<link rel="stylesheet" href="{{asset("css/owl.carousel.min.css")}}">
	<link rel="stylesheet" href="{{asset("css/jquery-ui.css")}}">
	<link rel="stylesheet" href="{{asset("css/linearicons.css")}}">
	<link rel="stylesheet" href="{{asset("css/tipso.css")}}">
	<link rel="stylesheet" href="{{asset("css/chosen.css")}}">
	<link rel="stylesheet" href="{{asset("css/prettyPhoto.css")}}">
	<link rel="stylesheet" href="{{asset("css/main.css")}}">
	<link rel="stylesheet" href="{{asset("css/color.css")}}">
	<link rel="stylesheet" href="{{asset("css/transitions.css")}}">
	<link rel="stylesheet" href="{{asset("css/responsive.css")}}">
	<script src="{{asset("js/vendor/modernizr-2.8.3-respond-1.4.2.min.js")}}"></script>
	<script src="https://kit.fontawesome.com/3977de5c39.js" crossorigin="anonymous"></script>
</head>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/661d57e9a0c6737bd12c1052/1hrh9ur3n';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->

<body class="">
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<!-- Preloader Start -->
	<div class="preloader-outer">
		<div class="loader"></div>
	</div>
	<!-- Preloader End -->
	<!-- Wrapper Start -->
	<div id="wt-wrapper" class="wt-wrapper wt-haslayout">

		<!-- Content Wrapper Start -->
            <div class="wt-contentwrapper">

                <!-- Header Start -->
                    <x-public.header :categories="$categories"/>	
                <!--Header End-->

                <!--Home Banner Start-->
                    @yield('banner')
                <!--Home Banner End-->

                <!--Main Start-->
                    @yield('content')
                <!--Main End-->

                <!--Footer Start-->
                    <x-public.footer />
                <!--Footer End-->

            </div>
		<!--Content Wrapper End-->

	</div>
	<!--Wrapper End-->
	<script src="{{asset("js/vendor/jquery-3.3.1.js")}}"></script>
	<script src="{{asset("js/vendor/jquery-library.js")}}"></script>
	<script src="{{asset("js/vendor/bootstrap.min.js")}}"></script>
	<script src="{{asset("js/owl.carousel.min.js")}}"></script>
	<script src="{{ asset("js/jquery.hoverdir.js") }}"></script>
	<script src="{{asset("js/chosen.jquery.js")}}"></script>
	<script src="{{asset("js/tilt.jquery.js")}}"></script>
	<script src="{{asset("js/scrollbar.min.js")}}"></script>
	<script src="{{asset("js/prettyPhoto.js")}}"></script>
	<script src="{{asset("js/jquery-ui.js")}}"></script>
	<script src="{{asset("js/readmore.js")}}"></script>
	<script src="{{asset("js/countTo.js")}}"></script>
	<script src="{{asset("js/appear.js")}}"></script>
	<script src="{{asset("js/tipso.js")}}"></script>
	<script src="{{asset("js/jRate.js")}}"></script>
	<script src="{{asset("js/main.js")}}"></script>
</body>


</html>