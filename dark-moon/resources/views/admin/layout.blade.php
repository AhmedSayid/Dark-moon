<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ trans('dashboard') }}</title>
    <link rel="shortcut icon" href="{{url('assets/img/Icons/logo.png')  }}">
    <script>
        localStorage.removeItem('lat')
        localStorage.removeItem('lng')
    </script>
    <link rel="stylesheet" href="{{ url('assets/css/admin.app.css') }}">

    <!-- CSS only -->
    <!-- <script type="text/JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"  ></script>  -->
    <script src="{{ url('assets/js/googlemap.js') }}"></script>
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
    {{-- @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ url('assets/css/admin.app.rtl.css') }}">
    @endif --}}
 <style>
     /* .sidebar{
        border-top-right-radius: 50px;
        background: grey !important;
     }
     @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
body {
    font-family: 'Poppins', sans-serif;
    background: #fafafa;
}

p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
}
*/
a,
a:hover,
a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

/* .navbar {
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
} */

.navbar-btn {
    box-shadow: none;
    outline: none !important;
    border: none;
}

.line {
    width: 100%;
    height: 1px;
    border-bottom: 1px dashed #ddd;
    margin: 40px 0;
}

/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

.wrapper {
    display: flex;
    width: 100%;
    align-items: stretch;
}

#sidebar {
    /* min-width: 250px; */
    max-width: 250px;
    background: #7386D5;
    /* color: #fff; */
    transition: all 0.3s;
}

/* #sidebar.active { */
    /* margin-left: -250px; */
/* } */

#sidebar .sidebar-header {
    padding: 20px;
    background: #6d7fcc;
}

#sidebar ul.components {
    padding: 0px 0px 20px 0px;
    border-bottom: 1px solid #47748b;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
    border-radius: 10px;
    color: white;
    font-weight: bold;
    letter-spacing: 1px;
    margin: 10px
}

#sidebar ul li a:hover {
    color: #7386D5;
    background: #fff;
}

#sidebar ul li.active>a,
a[aria-expanded="true"] {
    color: #fff;
    background: #6d7fcc;
}

a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}

ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #6d7fcc;
}

ul.CTAs {
    padding: 20px;
}

ul.CTAs a {
    text-align: center;
    font-size: 0.9em !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}


a.download {
    background: #fff;
    color: #7386D5;
}

a.article,
a.article:hover {
    background: #6d7fcc !important;
    color: #fff !important;
}

 </style>
    <script src="https://unpkg.com/vuejs-datepicker"></script>
    {{-- <script type="text/javascript" src="https://unpkg.com/vue-simple-search-dropdown@latest/dist/vue-simple-search-dropdown.min.js"></script> --}}
    <script type="text/javascript" src="{{ url('js/selectbox.js') }}"></script>
    <style>

   </style>
</head>

<body class="app ">

<!--Header Style -->

<!--loader -->
<div id="spinnber"></div>

<!--app open-->
<div id="app" class="page">
    <div class="main-wrapper">
        <nav class="navbar d-flex justify-content-between navbar-expand-lg main-navbar">



            <form class="w-100">
                <ul class="navbar-nav d-flex justify-content-between w-100 align-items-center mr-2">
                    {{-- <div class="d-flex justify-content-center align-items-center">
                        @if(session('locale') != 'en')
                            <a class="dropdown-item text-dark fw-bold" href="{{ route('admin.language',['lang'=>'en']) }}">EN</a>
                        @elseif(session('locale') != 'ar')
                            <a class="dropdown-item text-dark fw-bold" href="{{ route('admin.language',['lang'=>'ar']) }}">AR</a>
                        @endif
                    </div> --}}
                    <div class="row p-2">
                        
                        <li>
                            <a href="#" data-toggle="sidebar" class="nav-link btn btn-primary navbar-toggler">
                                {{-- <i class="fa fa-reorder"></i> --}}
                                <div class="d-flex flex-row">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-menu-app" viewBox="0 0 16 16">
                                        <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0h2A1.5 1.5 0 0 1 5 1.5v2A1.5 1.5 0 0 1 3.5 5h-2A1.5 1.5 0 0 1 0 3.5v-2zM1.5 1a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-2zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2H1zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2h14zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                    <span class="d-flex align-items-center ml-2" style="font-weight: bold;font-size: 21px;letter-spacing:1.5px">
                                        Menu
                                    </span>
                                </div>
                                
                            </a>
                        </li>
                        <li class="ml-2">
                            @if(session('locale') != 'en')
                                <a class="btn btn-primary" href="{{ route('admin.language',['lang'=>'en']) }}">EN</a>
                            @elseif(session('locale') != 'ar')
                                <a class="btn btn-primary" href="{{ route('admin.language',['lang'=>'ar']) }}">AR</a>
                            @endif
                        </li>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a class="header-brand" href="{{ route('admin.home.index') }}">
                            <img src="{{ url('assets/img/Icons/logo.png')}}" style="width:10rem; height:4rem;" class="header-brand-img" alt="Splite-Admin  logo">
                            {{-- <img src="{{ url('assets/img/Icons/logo_.png')}}" style="width:4rem; height:4rem;border-radius:50%" class="header-brand-img p-1" alt="Splite-Admin  logo">  --}}
                        </a>
                    </div>
                </ul>
            </form>

        </nav>
            <ul class="navbar-nav nav bar-right">

                <li class="dropdown dropdown-list-toggle d-none d-lg-block">
                    
                </li>
                <li class="dropdown dropdown-list-toggle d-none d-lg-block">
                    <a href="#" class="nav-link nav-link-lg full-screen-link">
                        <i class="fa fa-expand " id="fullscreen-button"></i>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg d-flex">
                        <span class="mr-3 mt-2 d-none d-lg-block ">
                            <span class="text-white">{{trans('hello')}} xyz
                                <span class="ml-1"></span>
                            </span>
                        </span>
                        <span>
                            <img src="/slks" alt="xxx"
                                    class="rounded-circle w-32 mr-2">
                        </span>
                    </a>

                    <div class="dropdown-menu ">

                        <a class="dropdown-item" href="{{ route('admin.home.index') }}"><i
                            class="mdi  mdi-logout-variant mr-2"></i> <span>{{trans('logout')}}</span>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!--nav closed-->

        <!--aside open-->

    @yield('sidebar', View::make('admin.sidebar'))
    <!--aside closed-->

    @yield('content')

    <!--Footer-->
        <footer class="main-footer">
            <div class="text-center">
                {{-- Copyright &copy;Turky 2016. Design By<a href=""> Turky</a> --}}
            </div>
        </footer>
    </div>
</div>
<!--app closed-->

<!-- Back to top -->
<a href="#top" id="back-to-top" class="d-flex justify-content-center align-items-center h3"><i class="fa fa-angle-up"></i></a>

<!--Jquery.min js-->
<script src="{{ url('js/app.js') }}" ></script>

<script src="{{ url('assets/js/admin.app.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js" integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg==" crossorigin="anonymous"></script>
@yield('scripts')
</body>
</html>
