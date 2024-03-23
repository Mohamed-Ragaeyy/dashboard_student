
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>

    <!--=========================*
                Met Data
    *===========================-->
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Falr - Bootstrap 4 Admin Dashboard Template">

    <!--=========================*
              Page Title
    *===========================-->
    <title>هلال </title>

    <!--=========================*
                Favicon
    *===========================-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">

    <!--=========================*
            Bootstrap Css
    *===========================-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-rtl.min.css') }}">

    <!--=========================*
              Custom CSS
    *===========================-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!--=========================*
               Owl CSS
    *===========================-->
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">

    <!--=========================*
            Font Awesome
    *===========================-->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <!--=========================*
             Themify Icons
    *===========================-->
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">

    <!--=========================*
               Ionicons
    *===========================-->
    <link href="{{ asset('assets/css/ionicons.min.css') }}" rel="stylesheet"/>

    <!--=========================*
              EtLine Icons
    *===========================-->
    <link href="{{ asset('assets/css/et-line.css') }}" rel="stylesheet"/>

    <!--=========================*
              Feather Icons
    *===========================-->
    <link href="{{ asset('assets/css/feather.css') }}" rel="stylesheet"/>

    <!--=========================*
              Material Icons
    *===========================-->
    <link href="{{ asset('assets/css/materialdesignicons.min.css') }}" rel="stylesheet"/>

    <!--=========================*
              Modernizer
    *===========================-->
    <script src="{{ asset('assets/js/modernizr-2.8.3.min.js') }}"></script>

    <!--=========================*
               Metis Menu
    *===========================-->
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">

    <!--=========================*
               Slick Menu
    *===========================-->
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}">


    <!--=========================*
              Material Icons
    *===========================-->
    <link href="{{ asset('assets/css/materialdesignicons.min.css') }}" rel="stylesheet"/>

    <!--=========================*
               AM Chart
    *===========================-->
    <link rel="stylesheet" href="{{ asset('assets/vendors/am-charts/css/am-charts.css') }}" type="text/css" media="all" />

    <!--=========================*
            Google Fonts
    *===========================-->

    <!-- Font USE: 'Roboto', sans-serif;-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php

//   $requests = App\Models\Orders::where('status', '=', 0)->get();
//   $numrequest =  count($requests);
?>

</head>

<body class="rtl_page">

<?php

if(auth()->user()->role == 'admin'){

    $admin = "access";

} else{

    $admin = "notaccess";
}

?>
<!--=========================*
         Page Container
*===========================-->
<div id="page-container">

    <!--==================================*
               Header Section
    *====================================-->
    <div class="header-area">

        <!--======================*
                   Logo
        *=========================-->
        <div class="header-area-left">
            <a href="index.html" class="logo">
                <span>
                    {{-- <img src="{{ asset('') }}assets/images/" alt="" height="18"> --}}
                    <h3 class="pt-3" style="height:100px; color:aliceblue">سيستم الطلاب</h3>
                </span>
                <i>
                    <h6 class="pt-3" style="height:100px; color:aliceblue">سيستم الطلاب</h3>
                </i>
            </a>
        </div>
        <!--======================*
                  End Logo
        *=========================-->

        <div class="row align-items-center header_right">
            <!--==================================*
                     Navigation and Search
            *====================================-->
            <div class="col-md-6 d_none_sm d-flex align-items-center">
                <div class="nav-btn button-menu-mobile pull-left">
                    <button class="open-left waves-effect">
                        <i class="ion-android-menu"></i>
                    </button>
                </div>

                {{-- @if($admin == "access")
                 @yield("search")
                <li class="">
                    <a class="" style="color: blue;" href="{{ route("admin.newfinances.index") }}"> <i class = "fa fa-paper-plane fa-2xl"> طلبات جديده[{{ $numrequest }}] </i></a>
                </li>
                @endif --}}
            </div>

            <!--==================================*
                     End Navigation and Search
            *====================================-->
            <!--==================================*
                     Notification Section
            *====================================-->
            <div class="col-md-6 col-sm-12">
                <ul class="notification-area pull-right">
                    <li class="mobile_menu_btn">
                        <span class="nav-btn pull-left d_none_lg">
                            <button class="open-left waves-effect">
                                <i class="ion-android-menu"></i>
                            </button>
                        </span>
                    </li>
                </ul>
            </div>
            <!--==================================*
                     End Notification Section
            *====================================-->
        </div>

    </div>
    <!--==================================*
               End Header Section
    *====================================-->

    <!--=========================*
             Side Bar Menu
    *===========================-->
    <div class="sidebar_menu">
        <div class="menu-inner">
            <div id="sidebar-menu">
                <!--=========================*
                           Main Menu
                *===========================-->
                <ul class="metismenu" id="sidebar_menu">
                    <li>
                        <a href={{ route("home") }}>
                            <i class="feather ft-home"></i>
                            <span>الصفحة الرئيسية</span>
                        </a>
                    </li>

                    <li>
                        <a href={{ route("admin.employee.index") }}>
                            <i class="feather ft-home"></i>
                            <span> الطلاب</span>
                        </a>
                    </li>
                    <li>
                        <a href={{ route("admin.comfort.all") }}>
                            <i class="feather ft-home"></i>
                            <span> الراحات</span>
                        </a>
                    </li>
                    <li>
                        <a href={{ route("admin.disciplinary.all") }}>
                            <i class="feather ft-home"></i>
                            <span> الحالات الانضباطيه</span>
                        </a>
                    </li>
                    <li>
                        <a href={{ route("admin.queue.all") }}>
                            <i class="feather ft-home"></i>
                            <span>  حضور الطابور</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="feather ft-clipboard"></i>
                            <span>الطلبات</span>
                            <span class="float-right arrow"><i class="ion ion-chevron-down"></i></span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route("admin.request.create") }}"><i class="feather ft-minus"></i><span>اضافه طلب</span></a></li>
                            <li><a href="{{ route("admin.request.index") }}"><i class="feather ft-minus"></i> <span> عرض الطلبات</span></a></li>
                        </ul>
                    </li> --}}
                    <li>
                        <a href={{ route("logout") }}>
                            <i class="feather ft-home"></i>
                            <span> تسجيل خروج</span>
                        </a>
                    </li>

                </ul>
                <!--=========================*
                          End Main Menu
                *===========================-->
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--=========================*
           End Side Bar Menu
    *===========================-->

    <!--==================================*
               Main Content Section
    *====================================-->
    <div class="main-content page-content">

        <!--==================================*
                   Main Section
        *====================================-->
     @yield("content")
        <!--==================================*
                   End Main Section
        *====================================-->
    </div>
    <!--=================================*
           End Main Content Section
    *===================================-->


</div>
<!--=========================*
        End Page Container
*===========================-->


<!--=========================*
            Scripts
*===========================-->

<!-- Jquery Js -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<!-- bootstrap 4 js -->
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!-- Owl Carousel Js -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!-- Metis Menu Js -->
<script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
<!-- SlimScroll Js -->
<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
<!-- Slick Nav -->
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
<!-- ========== This Page js ========== -->

<!--Chart Js-->
<script src="{{ asset('assets/vendors/charts/charts-bundle/Chart.bundle.js') }}"></script>

<!--Home Script-->
<script src="{{ asset('assets/js/home.js') }}"></script>

<!-- ========== This Page js ========== -->

<!-- Main Js -->
<script src="{{ asset('assets/js/main.js') }}"></script>


</body>
</html>
