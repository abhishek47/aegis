<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>

<meta property="og:image" content="https://aegisacademy.co.in/images/bg/icon.png" />

<meta property="og:description" content="Aegis Academy is started by young educators to provide high - quality education at affordable price. Almost every country conducts several exams to hunt extraordinary problem - solving skilled students.Olympiads are the most prestigious exam among them." />

<meta property="og:url" content="https://aegisacademy.co.in/" />

<meta property="og:title" content="Aegis Academy | Online Courses, Wiki Pages, Offline Courses - Aegis Academy is started by young educators to provide high - quality education at affordable price. Almost every country conducts several exams to hunt extraordinary problem - solving skilled students.Olympiads are the most prestigious exam among them." />
    <!-- Favicon icon -->
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title> @yield('title', 'Aegis Academy | Online Courses, Wiki Pages, Offline Courses') </title>


<!-- Favicon and Touch Icons -->
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


<!-- Bootstrap Core CSS -->
<link href="/css/landing/bootstrap.min.css" rel="stylesheet">
<!-- This is for the animation CSS -->
<link href="/css/landing/aos.css" rel="stylesheet">
<!-- This page plugin CSS -->
<link href="/css/landing/bootstrap-touch-slider.css" rel="stylesheet">
<link href="/css/landing/owl.theme.green.css" rel="stylesheet">
<!-- This css we made it from our predefine componenet 
we just copy that css and paste here you can also do that -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="/css/landing/demo.css" rel="stylesheet">
<!-- Common style CSS -->
<link href="/css/landing/style.css" rel="stylesheet">
<link href="/css/landing/yourstyle.css" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<link href="/css/my-style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="/css/markdown.css">
   <link rel="stylesheet" type="text/css" href="/css/editor.css">


 <script type="text/x-mathjax-config">
      MathJax.Hub.Config({
      CommonHTML: { linebreaks: {automatic: true}},
  SVG: { linebreaks: {automatic: true}},
 
       "HTML-CSS": {
       linebreaks: {automatic: true},
    styles: {
      ".MathJax_Display": {
        width: null,
        position: null,
        display: "table"
      }
    }
  },
        showProcessingMessages: false,
        tex2jax: { inlineMath: [['$','$'],['\\(','\\)']] },
        TeX: { equationNumbers: {autoNumber: "AMS"}, extensions: ["AMSmath.js","AMSsymbols.js"] },

      });
    </script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
    <script type="text/javascript" src="/js/marked.js"></script>
    <script type="text/javascript" src="/js/aegismarked.js"></script>

    <script>
    marked.setOptions({
      renderer: new marked.Renderer(),
      gfm: true,
      tables: true,
      breaks: false,
      pedantic: false,
      sanitize: false, // IMPORTANT, because we do MathJax before markdown,
                       //            however we do escaping in 'CreatePreview'.
      smartLists: true,
      smartypants: false
    });

    </script>

    @yield('css')

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108413394-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-108413394-1');
</script>


</head>

<body class="">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== 
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Onyomark</p>
        </div>
    </div>-->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <div class="topbar">
            <div class="header1 po-relative">
                    <div class="container">
                        <!-- Header 1 code -->
                        <nav class="navbar navbar-expand-lg h1-nav">
                            <a class="navbar-brand" href="#"><img style="width: 200px;" src="/images/logo-wide.png" alt="wrapkit"></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header1" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="ti-menu"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="header1">
                                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                                    <li class="nav-item active"><a class="nav-link font-bold" href="/">Home</a></li>
                                    <li class="nav-item"><a class="nav-link font-bold" href="/about">About</a></li>
                                    <li class="nav-item"><a class="nav-link font-bold" href="/contact">Contact</a></li>

                                    <li class="nav-item"><a class="nav-link font-bold" href="/login">Sign In</a></li>
                                   
                                    <li class="nav-item"><a class="btn btn-success" href="/register">Create Account</a></li>
                                </ul>
                            </div>
                        </nav>
                       
                    </div>
                </div>
        </div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" id="app">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            
              <div id="register"></div> 
            <div class="container-fluid">


            @yield('content')



            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Back to top -->
            <!-- ============================================================== 
            <a class="bt-top btn btn-circle btn-lg btn-success" href="#top"><i class="fa fa-arrow-up"></i></a>-->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

        @guest
        <!-- ============================================================== -->
        <!-- footer 4  -->
        <!-- ============================================================== -->
        <div class="footer2 font-14 bg-dark">
       
        <div class="f2-middle">
            <div class="container">
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-md-6">
                        <p class="p-t-10">Aegis Academy is started by young educators to provide high - quality education at affordable price. Almost every country conducts several exams to hunt extraordinary problem - solving skilled students.</p>
                        <p>Get the best for yourself by choosing AEGIS!</p>
                        <div class="m-t-20 m-b-30">
                            <a href="#" class="link"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="link"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="link"><i class="fa fa-linkedin"></i></a>
                            <a href="#" class="link"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="link"><i class="fa fa-instagram"></i></a>
                        </div>

                         <div class="m-t-20 ml-auto align-self-center">
                            <span class="text-white">Powered By <a href="http://www.trumpetstechnologies.com">Trumpets.</a></span> © 2017 All rights reserved.
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-2 col-md-6">
                        <ul class="general-listing">
                            <li><a href="/"><i class="fa fa-circle"></i> Home</a></li>
                            <li><a href="/about"><i class="fa fa-circle"></i> About</a></li>
                            <li><a href="/courses"><i class="fa fa-circle"></i> Courses</a></li>
                            <li><a href="/wiki"><i class="fa fa-circle"></i> Wiki</a></li>
                            <li><a href="/terms-of-service"><i class="fa fa-circle"></i> Terms Of Service</a></li>
                            <li><a href="/privacy-policy"><i class="fa fa-circle"></i> Privacy Policy</a></li>
    
                        </ul>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6 info-box">
                       <div class="d-flex no-block">
                            <div class="display-7 m-r-20 align-self-top"><i class="icon-Location-2"></i></div>
                            <div class="info">
                                <p>Nashik, Maharashtra 
                                <br/>
                                India</p>
                           </div>
                       </div>
                       <div class="d-flex no-block">
                            <div class="display-7 m-r-20 align-self-top"><i class="icon-Over-Time"></i></div>
                            <div class="info">
                                <span class="font-medium text-muted db  m-t-5">9.00 AM - 6:00PM</span>
                            </div>
                       </div>
                       <div class="d-flex no-block">
                            <div class="display-7 m-r-20 align-self-top"><i class="icon-Phone-2"></i></div>
                            <div class="info">
                                <span class="font-medium text-muted db  m-t-5"> (+91) 8800106866</span>
                            </div>
                       </div>
                       <div class="d-flex no-block">
                            <div class="display-7 m-r-20 align-self-top"><i class="icon-Mail"></i></div>
                            <div class="info">
                                <a href="#" class="font-medium text-muted db  m-t-5">info@aegisacademy.co.in</a>
                           </div>
                       </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="subscribe-box">
                            <div class="display-4 text-white"><i class="icon-Mail-3"></i></div>
                            <p>Join AEGIS and gain access to our extensive practice problems. It's absolutely free </p>
                            <form>
                                <div class="m-b-20"><input class="form-control" placeholder="enter email"></div>
                                <button class="btn btn-danger-gradiant">JOIN US</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- ============================================================== -->
        <!-- footer 4  -->
        <!-- ============================================================== -->

        @endguest
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

   <script src="{{ asset('js/app.js') }}"></script>


    <script src="/js/landing/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="/js/landing/popper.min.js"></script>
    <script src="/js/landing/bootstrap.min.js"></script>
    <!-- This is for the animation -->
    <script src="/js/landing/aos.js"></script>
    <!--Custom JavaScript -->
    <script src="/js/landing/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="/js/landing/owl.carousel.min.js"></script>


    <!-- include summernote css/js-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>




    @yield('js')
</body>

</html>