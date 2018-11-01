<html lang="en">
<head>
<meta charset="utf-8">
<title>Reveal Bootstrap Template</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">
<!-- Favicons -->
<link href="img/favicon.png" rel="icon">
<link href="img/apple-touch-icon.png" rel="apple-touch-icon">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">
<link href="{{ URL::asset('resources/assets/web/lib/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
<link href="{{ URL::asset('resources/assets/web/lib/font-awesome/css/font-awesome.min.css') }} " rel="stylesheet">
<link href="{{ URL::asset('resources/assets/web/lib/animate/animate.min.css') }} " rel="stylesheet">
<link href="{{ URL::asset('resources/assets/web/lib/ionicons/css/ionicons.min.css') }} " rel="stylesheet">
<link href="{{ URL::asset('resources/assets/web/lib/owlcarousel/assets/owl.carousel.min.css') }} " rel="stylesheet">
<link href="{{ URL::asset('resources/assets/web/lib/magnific-popup/magnific-popup.css') }} " rel="stylesheet">
<link href="{{ URL::asset('resources/assets/web/lib/ionicons/css/ionicons.min.css') }} " rel="stylesheet">
<link href="{{ URL::asset('resources/assets/web/css/style.css') }} " rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>
<script src="{{ URL::asset('resources/assets/web/js/app.js') }}"></script>
</head>
<body id="body">

@include('web.layout.headerLayout')
@yield('content')  
@include('web.layout.footerLayout')

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="{{ URL::asset('resources/assets/web/lib/jquery/jquery.min.js') }} "></script>
<script src="{{ URL::asset('resources/assets/web/lib/jquery/jquery-migrate.min.js') }} "></script>
<script src="{{ URL::asset('resources/assets/web/lib/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
<script src="{{ URL::asset('resources/assets/web/lib/easing/easing.min.js') }} "></script>
<script src="{{ URL::asset('resources/assets/web/lib/superfish/hoverIntent.js') }} "></script>
<script src="{{ URL::asset('resources/assets/web/lib/superfish/superfish.min.js') }} "></script>
<script src="{{ URL::asset('resources/assets/web/lib/wow/wow.min.js') }} "></script>
<script src="{{ URL::asset('resources/assets/web/lib/owlcarousel/owl.carousel.min.js') }} "></script>
<script src="{{ URL::asset('resources/assets/web/lib/magnific-popup/magnific-popup.min.js') }} "></script>
<script src="{{ URL::asset('resources/assets/web/lib/sticky/sticky.js') }} "></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
<!-- Contact Form JavaScript File -->
<script src="{{ URL::asset('resources/assets/web/contactform/contactform.js') }} "></script>
<!-- Template Main Javascript File -->
<script src="{{ URL::asset('resources/assets/web/js/main.js') }} "></script>




</body>
</html>