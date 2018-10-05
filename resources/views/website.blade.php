<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PDTWJ3Z');</script>
    <!-- End Google Tag Manager -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Xero - Real Estate HTML Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <base href="{{asset('')}}">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="assets/website/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/website/css/magnific-popup.css">
    <link type="text/css" rel="stylesheet" href="assets/website/css/jquery.selectBox.css">
    <link type="text/css" rel="stylesheet" href="assets/website/css/dropzone.css">
    <link type="text/css" rel="stylesheet" href="assets/website/css/rangeslider.css">
    <link type="text/css" rel="stylesheet" href="assets/website/css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="assets/website/css/leaflet.css">
    <link type="text/css" rel="stylesheet" href="assets/website/css/map.css">
    <link type="text/css" rel="stylesheet" href="assets/website/css/jquery.mCustomScrollbar.css">
    <link type="text/css" rel="stylesheet" href="assets/website/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="assets/website/fonts/flaticon/font/flaticon.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/website/img/favicon.ico" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPoppins:400,500,700,800,900%7CRoboto:100,300,400,400i,500,700">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/website/css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="assets/website/css/skins/default.css">

</head>
<body id="top">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PDTWJ3Z"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="page_loader"></div>

<!-- main header start -->
@include('header')
<!-- main header end -->

<!-- Banner start -->
@include('layout.banner')
<!-- banner end -->

<!-- Search area start -->
@include('layout.search')
<!-- Search area start -->

<!-- List Products start -->
@include('layout.listProducts')
<!-- List Products end -->

<!-- services start -->
@include('layout.services')
<!-- services end -->

<!-- Recent Properties start -->
@include('layout.recentProperties')
<!-- Recent Properties end -->

<!-- Most Popular Places start -->
@include('layout.popularPlaces')
<!--Most Popular Placesstart end -->

<!-- Status -->
@include('layout.status')
<!-- Status end -->


<!-- Friendly Customer start -->
@include('layout.friendlyCustomer ')
<!-- Friendly Customer end -->

<!-- Post  start -->
@include('layout.post')
<!-- Post  start -->

<!-- partner start -->
@include('layout.partner')
<!-- partner end -->

<!-- Footer start -->
@include('footer')
<!-- Footer end -->

<!-- Full Page Search -->
<div id="full-page-search">
    <button type="button" class="close">×</button>
    <form action="#">
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="button" class="btn btn-sm btn-color">Search</button>
    </form>
</div>

<!-- Property Video Modal -->
@include('layout.videoModel')

<!-- Off-canvas sidebar -->
@include('layout.canvasSlidebar')

<!-- External JS libraries -->
<script src="assets/website/js/jquery-2.2.0.min.js"></script>
<script src="assets/website/js/popper.min.js"></script>
<script src="assets/website/js/bootstrap.min.js"></script>
<script src="assets/website/js/jquery.selectBox.js"></script>
<script src="assets/website/js/rangeslider.js"></script>
<script src="assets/website/js/jquery.magnific-popup.min.js"></script>
<script src="assets/website/js/jquery.filterizr.js"></script>
<script src="assets/website/js/wow.min.js"></script>
<script src="assets/website/js/backstretch.js"></script>
<script src="assets/website/js/jquery.countdown.js"></script>
<script src="assets/website/js/jquery.scrollUp.js"></script>
<script src="assets/website/js/particles.min.js"></script>
<script src="assets/website/js/typed.min.js"></script>
<script src="assets/website/js/dropzone.js"></script>
<script src="assets/website/js/jquery.mb.YTPlayer.js"></script>
<script src="assets/website/js/leaflet.js"></script>
<script src="assets/website/js/leaflet-providers.js"></script>
<script src="assets/website/js/leaflet.markercluster.js"></script>
<script src="assets/website/js/maps.js"></script>
<script src="assets/website/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0N5pbJN10Y1oYFRd0MJ_v2g8W2QT74JE"></script>
<script src="assets/website/js/ie-emulation-modes-warning.js"></script>
<!-- Custom JS Script -->
<script  src="assets/website/js/app.js"></script>

</body>

<!-- Mirrored from storage.googleapis.com/themevessel-xero/index-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Jul 2018 12:16:34 GMT -->
</html>
