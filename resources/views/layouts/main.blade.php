<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>BGR Logistik Indonesia</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('images/favicon.png') }}" >
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ url('vendor/toastr/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ url('vendor/sweetalert2/dist/sweetalert2.min.css') }}">
    <link href="{{ url('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('vendor/select2/css/select2.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="{{ url('images/logo.png') }}" alt="">
                <img class="logo-compact" src="{{ url('images/logo-text.png') }}" alt="">
                <img class="brand-title" src="{{ url('images/logo-text.png') }}" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
        @include('layouts.header')

        @include('layouts.navBar')

        <!-- start: page -->
			@yield('container')
		<!-- end: page -->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ url('vendor/global/global.min.js') }}"></script>
    <script src="{{ url('js/quixnav-init.js') }}"></script>
    <script src="{{ url('js/custom.min.js') }}"></script>

    <script src="{{ url('vendor/moment/moment.min.js') }}"></script>
    <script src="{{ url('vendor/pg-calendar/js/pignose.calendar.min.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ url('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('js/plugins-init/datatables.init.js') }}"></script>

    <!-- Jquery Validation -->
    <script src="{{ url('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <!-- Form validate init -->
    <script src="{{ url('js/plugins-init/jquery.validate-init.js') }}"></script>

    <script src="{{ url('vendor/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ url('js/plugins-init/toastr-init.js') }}"></script>
    <script src="{{ url('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ url('vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ url('js/plugins-init/select2-init.js') }}"></script>

    @stack('script')
</body>

</html>