<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="images/favicon.ico" type="image/ico"/>
    <title>XERO</title>
    <base href="{{asset( '' )}}">
    <link href="bower_components/demo-bower/assets/admin/vendors_style/bootstrap/dist/css/bootstrap.min.css"
    rel="stylesheet">
    <!-- Font Awesome -->
    <link href="bower_components/demo-bower/assets/admin/vendors_style/font-awesome/css/font-awesome.min.css"
    rel="stylesheet">
    <!-- NProgress -->
    <link href="bower_components/demo-bower/assets/admin/vendors_style/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="bower_components/demo-bower/assets/admin/vendors_style/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="bower_components/demo-bower/assets/admin/vendors_style/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
    rel="stylesheet">
    <!-- JQVMap -->
    <link href="bower_components/demo-bower/assets/admin/vendors_style/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="bower_components/demo-bower/assets/admin/vendors_style/bootstrap-daterangepicker/daterangepicker.css"
    rel="stylesheet">

    <link href="bower_components/demo-bower/assets/admin/vendors_style/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="bower_components/demo-bower/assets/admin/vendors_style/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css"
    rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="bower_components/demo-bower/assets/admin/build/css/custom.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="bower_components/demo-bower/assets/admin/datatable/css/jquery.dataTables.min.css">
    <link href="bower_components/demo-bower/assets/css/skins/default.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/app.css">
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                @include( 'admin.nav_left' )
            </div>
            <!-- top navigation -->
            <div class="top_nav">
                @include( 'admin.nav_top' )
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <!-- CONTENT -->
                @yield( 'content' )
                <!-- CONTENT -->
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="bower_components/demo-bower/assets/admin/vendors_style/jquery/dist/jquery.min.js"></script>
    <!-- TypeHead js -->
    <script src="bower_components/demo-bower/assets/admin/js/typeahead.bundle.min.js"></script>
    <script src="bower_components/demo-bower/assets/admin/js/bloodhound.min.js"></script>
    <!-- Bootstrap -->
    <script src="bower_components/demo-bower/assets/admin/vendors_style/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/demo-bower/assets/admin/datatable/js/jquery.dataTables.min.js"></script>
    <!-- FastClick -->
    <script src="bower_components/demo-bower/assets/admin/vendors_style/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="bower_components/demo-bower/assets/admin/vendors_style/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="bower_components/demo-bower/assets/admin/vendors_style/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="bower_components/demo-bower/assets/admin/vendors_style/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="bower_components/demo-bower/assets/admin/vendors_style/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="bower_components/demo-bower/assets/admin/vendors_style/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="bower_components/demo-bower/assets/admin/vendors_style/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="bower_components/demo-bower/assets/admin/vendors_style/Flot/jquery.flot.js"></script>
    <script src="bower_components/demo-bower/assets/admin/vendors_style/Flot/jquery.flot.pie.js"></script>
    <script src="bower_components/demo-bower/assets/admin/vendors_style/Flot/jquery.flot.time.js"></script>
    <script src="bower_components/demo-bower/assets/admin/vendors_style/Flot/jquery.flot.stack.js"></script>
    <script src="bower_components/demo-bower/assets/admin/vendors_style/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="bower_components/demo-bower/assets/admin/vendors_style/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="bower_components/demo-bower/assets/admin/vendors_style/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="bower_components/demo-bower/assets/admin/vendors_style/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="bower_components/demo-bower/assets/admin/vendors_style/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="bower_components/demo-bower/assets/admin/vendors_style/jqvmap/dist/jquery.vmap.js"></script>
    <script src="bower_components/demo-bower/assets/admin/vendors_style/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <!-- Ion.RangeSlider -->
    <script src="bower_components/demo-bower/assets/admin/vendors_style/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <script src="bower_components/demo-bower/assets/admin/vendors_style/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="bower_components/demo-bower/assets/admin/vendors_style/moment/min/moment.min.js"></script>
    <script src="bower_components/demo-bower/assets/admin/vendors_style/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script language="javascript" src="ckeditor/ckeditor.js" type="text/javascript"></script>
    <!-- Custom Theme Scripts -->
    <script src="bower_components/demo-bower/assets/admin/build/js/custom.min.js"></script>
    @stack( 'scripts_apartment' )

    <script src="js/admin.js"></script>
    <script src="bower_components/demo-bower/assets/admin/js/ajax.js"></script>
</body>
</html>

