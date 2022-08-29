<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('images/favicon.png') }}" >
    <link rel="stylesheet" href="{{ url('vendor/toastr/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ url('vendor/sweetalert2/dist/sweetalert2.min.css') }}">
    <link href="{{ url('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    @yield('content')
    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div> --}}
    <script src="{{ url('vendor/global/global.min.js') }}"></script>
    <script src="{{ url('js/quixnav-init.js') }}"></script>
    <script src="{{ url('js/custom.min.js') }}"></script>

    <!-- Jquery Validation -->
    <script src="{{ url('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <!-- Form validate init -->
    <script src="{{ url('js/plugins-init/jquery.validate-init.js') }}"></script>

    <script src="{{ url('vendor/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ url('js/plugins-init/toastr-init.js') }}"></script>
    <script src="{{ url('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script>
        toastr.options.timeOut = 5e3;
        toastr.options.positionClass = "toast-top-right";
        toastr.options.closeButton = !0;
        toastr.options.debug = !1;
        toastr.options.newestOnTop = !0;
        toastr.options.progressBar = !0;
        toastr.options.onclick = null;
        toastr.options.showDuration = "300";
        toastr.options.hideDuration = "1000";
        toastr.options.extendedTimeOut = "1000";
        $(document).ready(function() {
        // do not allow users to enter spaces:
            $('.noSpace').keydown(function( e ) {
                if(e.which === 32) 
                toastr.warning('Username tidak boleh ada spasi!');
            });

            $(  ".noSpace" ).on({
                keydown: function(event) {
                if (event.which === 32)
                return false;
            }
            });
            
        });
        $(document).on('paste', ".noSpace", function (e) {
            e.preventDefault();
            // prevent copying action
            toastr.warning('Username mengandung spasi! Spasi otomatis dihilangkan oleh sistem');
            var withoutSpaces = e.originalEvent.clipboardData.getData('Text');
            withoutSpaces = withoutSpaces.replace(/\s+/g, '');
            $(this).val(withoutSpaces);
            // you need to use val() not text()
        });
    </script>
</body>
</html>

