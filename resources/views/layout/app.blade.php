<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		    <link rel="shortcut icon" type="image/x-icon" href="front/img/favicon.ico">

		<!-- CSS here -->
            <link rel="stylesheet" href="front/css/bootstrap.min.css">
            <link rel="stylesheet" href="front/css/owl.carousel.min.css">
            <link rel="stylesheet" href="front/css/flaticon.css">
            <link rel="stylesheet" href="front/css/slicknav.css">
            <link rel="stylesheet" href="front/css/animate.min.css">
            <link rel="stylesheet" href="front/css/magnific-popup.css">
            <link rel="stylesheet" href="front/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="front/css/themify-icons.css">
            <link rel="stylesheet" href="front/css/slick.css">
            <link rel="stylesheet" href="front/css/nice-select.css">
            <link rel="stylesheet" href="front/css/style.css">
   </head>

   <body>

    @include('partials.header') 

    @yield('content')


        <script src="front/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		    <script src="front/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="front/js/popper.min.js"></script>
        <script src="front/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="front/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="front/js/owl.carousel.min.js"></script>
        <script src="front/js/slick.min.js"></script>

		<!-- One Page, Animated-HeadLin -->
        <script src="front/js/wow.min.js"></script>
		    <script src="front/js/animated.headline.js"></script>
        <script src="front/js/jquery.magnific-popup.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="front/js/jquery.scrollUp.min.js"></script>
        <script src="front/js/jquery.nice-select.min.js"></script>
		    <script src="front/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="front/js/contact.js"></script>
        <script src="front/js/jquery.form.js"></script>
        <script src="front/js/jquery.validate.min.js"></script>
        <script src="front/js/mail-script.js"></script>
        <script src="front/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="front/js/plugins.js"></script>
        <script src="front/js/main.js"></script>
        
    </body>
</html>