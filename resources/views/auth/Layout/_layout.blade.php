<!doctype html>
<html lang="en-US" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo/logo.png') }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ load('css/bootstrap.min.css') }}">
    <!--typography CSS -->
    <link rel="stylesheet" href="{{ load('css/typography.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ load('css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ load('css/responsive.css') }}">
     <!-- Login CSS -->
    <link rel="stylesheet" href="{{ load('css/loginstyle.css') }}">
</head>

<body style="direction: rtl;">
    @yield('Content')
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
        function hideAlert() {
            var errorAlert = document.getElementById("erroralert");
            errorAlert.style.display = "none";
        } 
        function closeAlert() {
            var errorAlert = document.getElementById("erroralert");
            errorAlert.style.display = "none";
        } 
        setTimeout(hideAlert, 7000);
    </script>
    <script src="{{ load('js/jquery.min.js') }}"></script>
    <script src="{{ load('js/popper.min.js') }}"></script>
    <script src="{{ load('js/bootstrap.min.js') }}"></script>
    <!-- Appear JavaScript -->
    <script src="{{ load('js/jquery.appear.js') }}"></script>
    <!-- Countdown JavaScript -->
    <script src="{{ load('js/countdown.min.js') }}"></script>
    <!-- Counterup JavaScript -->
    <script src="{{ load('js/waypoints.min.js') }}"></script>
    <script src="{{ load('js/jquery.counterup.min.js') }}"></script>
    <!-- Wow JavaScript -->
    <script src="{{ load('js/wow.min.js') }}"></script>
    <!-- Slick JavaScript -->
    <script src="{{ load('js/slick.min.js') }}"></script>
    <!-- Owl اسلاید ها JavaScript -->
    <script src="{{ load('js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="{{ load('js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="{{ load('js/smooth-scrollbar.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ load('js/chart-custom.js') }}"></script>
    <!-- Custom JavaScript -->
    <script src="{{ load('js/custom.js') }}"></script>
    <!-- <script src="../assets/js/rtl.js"></script> -->
</body>

</html>
