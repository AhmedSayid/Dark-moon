<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" >
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset("assets/css/style_admin.css") }}"> <!-- local style -->
    {{-- <link type="text/css" rel="stylesheet" href="https://storage.googleapis.com/theme-vessel-items/checking-sites/oddo-3-html/HTML/main/assets/css/style.css"> --}}
</head>
<body id="top">
    <div class="page_loader"></div>
        <div class="login-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-section">
                            <div class="form-inner rounded">
                                <a href="{{ route('web.home.index') }}" class="">
                                    <img height="150" width="150" src="{{ url('assets/img/Icons/logo.png') }}" alt="logo">
                                </a>
                                <h3>Sign Into Your Account</h3>
                                <form action="{{ route('Login..store') }}" method="POST">
                                    @csrf
                                    <div class="form-group form-box clearfix">
                                        <input name="email" type="email" class="form-control p-2 rounded" autocomplete="off" placeholder="Email..">
                                    </div>
                                    <div class="form-group form-box clearfix">
                                        <input name="password" type="password" class="form-control p-2  rounded " autocomplete="off" placeholder="Password..">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-theme"><span>Login</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($errors->any())
                <div class="m-0 alert alert-danger position-fixed bottom-0 end-0 m-2" style="z-index: 1;position: fixed!important;right: 0;bottom: 0;">
                    <ol class="m-0 pl-3">
                        @foreach ($errors->all() as $error)
                            <li style="list-style-type:circle">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ol>
                </div>
            @endif
    </div>
    <script src="{https://storage.googleapis.com/theme-vessel-items/checking-sites/oddo-3-html/HTML/main/assets/js/jquery-3.6.0.min.js}"></script>
    <script src="https://storage.googleapis.com/theme-vessel-items/checking-sites/oddo-3-html/HTML/main/assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://storage.googleapis.com/theme-vessel-items/checking-sites/oddo-3-html/HTML/main/assets/js/jquery.validate.min.js"></script>
    <script src="https://storage.googleapis.com/theme-vessel-items/checking-sites/oddo-3-html/HTML/main/assets/js/app.js"></script>
</body>
</html>
