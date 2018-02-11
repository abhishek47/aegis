

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Aegis Academy | Online Courses, Wiki Pages, Offline Courses</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================--><!-- Favicon and Touch Icons -->
    <link rel="apple-touch-icon" sizes="57x57" href="/images/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/images/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/images/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/images/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/images/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/images/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/auth/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/auth/vendor/animate/animate.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/auth/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/auth/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/auth/vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/auth/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/auth/css/util.css">
    <link rel="stylesheet" type="text/css" href="/auth/css/main.css">
<!--===============================================================================================-->
</head>
<body>

    <div class="limiter" style="background: url('/images/bg/bg-pattern.png');background-size: cover;">
        <div class="container-login100" style="background: rgba(0, 173, 10, 0.7);background-size: cover;height: 100%;">
            
                <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                    <form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <span class="login100-form-title p-b-53">
                            Sign In With
                        </span>

                        <a href="{{ route('oauth.redirect', ['provider' => 'facebook']) }}"  class="btn-face m-b-20">
                            <i class="fa fa-facebook-official"></i>
                            Facebook
                        </a>

                        <a href="{{ route('oauth.redirect', ['provider' => 'google']) }}" class="btn-google m-b-20">
                            <img src="/auth/images/icons/icon-google.png" alt="GOOGLE">
                            Google
                        </a>

                        <div class="p-t-31 p-b-9">
                            <span class="txt1">
                                E-mail Address
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "E-mail is required">
                            <input class="input100" type="email" name="email" >
                            <span class="focus-input100"></span>
                        </div>

                        <div class="p-t-13 p-b-9">
                            <span class="txt1">
                                Password
                            </span>

                            <a href="{{ route('password.request') }}" class="txt2 bo1 m-l-5">
                                Forgot?
                            </a>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="password" name="password" >
                            <span class="focus-input100"></span>
                        </div>

                        <div class="container-login100-form-btn m-t-17">
                            <button type="submit" class="login100-form-btn">
                                Sign In
                            </button>
                        </div>

                        <div class="w-full text-center p-t-55">
                            <span class="txt2">
                                Not a member?
                            </span>

                            <a href="/register" class="txt2 bo1">
                                Sign up now
                            </a>
                              &nbsp; | &nbsp; 
                             <a href="/" class="txt2 bo1">
                                Go Home
                            </a>
                        </div>
                    </form>
                </div>
            
        </div>
    </div>


    <div id="dropDownSelect1"></div>

<!--===============================================================================================-->
    <script src="/auth/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="/auth/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="/auth/vendor/bootstrap/js/popper.js"></script>
    <script src="/auth/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="/auth/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="/auth/vendor/daterangepicker/moment.min.js"></script>
    <script src="/auth/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="/auth/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="/auth/js/main.js"></script>
   
</body>
</html>



