<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Admin Pray And Go</title>

    <!-- Favicons -->
    <link href="{{asset('asset/admin/img/favicon.png')}}" rel="icon">
    <link href="{{asset('asset/admin/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('asset/admin/lib/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('asset/admin/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin/lib/bootstrap-fileupload/bootstrap-fileupload.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin/lib/bootstrap-datepicker/css/datepicker.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin/lib/bootstrap-daterangepicker/daterangepicker.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin/lib/bootstrap-timepicker/compiled/timepicker.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin/lib/bootstrap-datetimepicker/css/datetimepicker.css') }}" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('asset/admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/admin/css/style-responsive.css') }}" rel="stylesheet">

    <!-- =======================================================
        Template Name: Dashio
        Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
        Author: TemplateMag.com
        License: https://templatemag.com/license/
    ======================================================= -->
</head>

<body>
    <section id="container">
        <!-- **********************************************************************************************************************************************************
            TOP BAR CONTENT & NOTIFICATIONS
            *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
        <!--logo start-->
            <a href="index.html" class="logo"><b>Pray &<span>Go</span></b></a>
            <!--logo end-->
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="/admin/logout">Logout</a></li>
                </ul>
            </div>
        </header>
        <!--header end-->
        <!-- **********************************************************************************************************************************************************
            MAIN SIDEBAR MENU
            *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                <h5 class="centered">Welcome,Admin</h5>     
                {{-- <li class="mt">
                    <a class="{{ (url()->current() == url("/admin/index")) ? 'active' : '' }}" href="index">
                    <i class="fa fa-dashboard"></i>
                    <span>Home</span>
                    </a>
                </li> --}}
                <li class="sub-menu">
                    <a class="{{ (url()->current() == url("/admin/paket")) ? 'active' : '' }}" href="/admin/paket">
                    <i class="fa fa-tasks"></i>
                    <span>Paket</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a class="{{ (url()->current() == url("/admin/listHotel")) ? 'active' : '' }}" href="/admin/listHotel">
                    <i class="fa fa-hospital-o"></i>
                    <span>Hotel</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a class="{{ (url()->current() == url("/admin/listPesawat")) ? 'active' : '' }}" href="/admin/listPesawat">
                    <i class=" fa fa-plane"></i>
                    <span>Pesawat</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a class="{{ (url()->current() == url("/admin/listCustomer")) ? 'active' : '' }}" href="/admin/listCutomer">
                    <i class=" fa fa-users"></i>
                    <span>Customer</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-files-o"></i>
                      <span>Laporan</span>
                      </a>
                    <ul class="sub">
                      <li><a class="{{ (url()->current() == url("/admin/laporan")) ? 'active' : '' }}" href="/admin/laporan">Laporan Penjualan</a></li>
                      <li><a class="{{ (url()->current() == url("/admin/laporanlaba")) ? 'active' : '' }}" href="/admin/laporanlaba">Laporan Laba Rugi</a></li>
                    </ul>
                  </li>
                  <li class="sub-menu">
                    <a href="javascript:;">
                      <i class="fa fa-comments-o"></i>
                      <span>Chat Room</span>
                      </a>
                  </li>
                <!-- sidebar menu end-->
            </div>
        </aside>
        @yield('body')  
        <footer class="site-footer">
            <div class="text-center">
                <p>
                    &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
                </p>
                <div class="credits">
                </div>
                <a href="advanced_form_components.html#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
    <!--footer end-->
    </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('asset/admin/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/admin/lib/bootstrap/js/bootstrap.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('asset/admin/lib/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('asset/admin/lib/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('asset/admin/lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <!--common script for all pages-->
    <script src="{{ asset('asset/admin/lib/common-scripts.js') }}"></script>
    <!--script for this page-->
    <script src="{{ asset('asset/admin/lib/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin/lib/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin/lib/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin/lib/bootstrap-daterangepicker/date.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin/lib/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin/lib/bootstrap-daterangepicker/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin/lib/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script>
    <script src="{{ asset('asset/admin/lib/advanced-form-components.js') }}"></script>
    @stack('js')
</body>

</html>
