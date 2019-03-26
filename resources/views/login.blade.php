
<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: School ::</title>
    <!-- Favicon-->
    <link rel="icon" href="{{env('TML_URL')}}/favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{env('TML_URL')}}/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{env('TML_URL')}}/assets/css/main.css">
    <link rel="stylesheet" href="{{env('TML_URL')}}/assets/css/authentication.css">
    <link rel="stylesheet" href="{{env('TML_URL')}}/assets/css/color_skins.css">
</head>

<body class="theme-green authentication sidebar-collapse">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
    <div class="container">        
        <div class="navbar-translate n_logo">
            <!--a class="navbar-brand" href="javascript:void(0);" title="" target="_blank" style='color: black;'>EIS 2.0</a-->
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
       <!--  <div class="navbar-collapse">
            <ul class="navbar-nav">               
                <li class="nav-item">
                    <a class="nav-link" title="Follow us on Twitter" href="javascript:void(0);" target="_blank">
                        <i class="zmdi1 zmdi-twitter"></i>
                        <p class="d-lg-none d-xl-none"><span style='color: #939393;'>Twitter</span></p>
                    </a>
                </li>            
            </ul>
        </div> -->
    </div>
</nav>
<!-- End Navbar -->
<div class="page-header">
    <!--div class="page-header-image" style="background-image:url(assets/images/hero-bg.jpg);"></div-->
    <div class="page-header-image"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="header">
                        <div class="logo-container">
                            <img src="assets/images/logo.png" alt="">
                        </div>
                        <h1><span style='color: #939393; font-size: 25px;'>Schools</span></h1>
                    </div>
                    <style>
                        ::placeholder {
                        color: #3f3f3f;
                        opacity: 1; /* Firefox */
                        }

                        :-ms-input-placeholder { /* Internet Explorer 10-11 */
                        color: #3f3f3f;
                        }

                        ::-ms-input-placeholder { /* Microsoft Edge */
                        color: #3f3f3f;
                        }
                        
                        input, select, textarea{
                            color: #3f3f3f;
                        }                       
                    </style>
                    <div class="content">                
                        <div class="input-group input-lg">
                            <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus placeholder="Enter User Name" style='background-color: #ffffff; color: #939393; font-size: 20px;'>

                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                            <!-- <input name="username" type="text" class="form-control" placeholder="Enter User Name" style='background-color: #ffffff; color: #939393; font-size: 20px;'> -->
                        </div>
                        <div class="input-group input-lg">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password" style='background-color: #ffffff; color: #939393; font-size: 20px;'>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="footer text-center">
                       <!--  <a href="index.html" class="btn btn-primary btn-round btn-lg btn-block ">SIGN IN</a> -->
                        <button type="submit" class="btn btn-primary btn-round btn-lg btn-block ">
                                    {{ __('Login') }}
                                </button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="copyright">
                <span style='color: #939393;'>
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script> EQULM</span>
            </div>
        </div>
    </footer>
</div>

<!-- Jquery Core Js -->
<script src="{{env('TML_URL')}}/assets/bundles/libscripts.bundle.js"></script>
<script src="{{env('TML_URL')}}/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script>
   $(".navbar-toggler").on('click',function() {
    $("html").toggleClass("nav-open");
});
//=============================================================================
$('.form-control').on("focus", function() {
    $(this).parent('.input-group').addClass("input-group-focus");
}).on("blur", function() {
    $(this).parent(".input-group").removeClass("input-group-focus");
});
</script>
</body>
</html>