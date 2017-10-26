<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

<!-- Meta Tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>

<meta property="og:image" content="https://aegisacademy.co.in/images/bg/bg4.png" />

<meta property="og:description" content="Aegis Academy is started by young educators to provide high - quality education at affordable price. Almost every country conducts several exams to hunt extraordinary problem - solving skilled students.Olympiads are the most prestigious exam among them." />

<meta property="og:url" content="https://aegisacademy.co.in/" />

<meta property="og:title" content="Aegis Academy | If you love challenges, you are at the right place." />



<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title> @yield('title', 'Aegis Academy | Online Courses, Wiki Pages, Offline Courses') </title>


<!-- Favicon and Touch Icons -->
<link href="/images/favicon.ico" rel="shortcut icon" type="image/ico">

<!-- Stylesheet -->
 <!-- Styles -->
<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<link href="/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="/css/animate.css" rel="stylesheet" type="text/css">
<link href="/css/css-plugin-collections.css" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link href="/css/menuzord-megamenu.css" rel="stylesheet"/>
<link id="menuzord-menu-skins" href="/css/menuzord-rounded-boxed.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="/css/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="/css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="/css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<link href="/css/custom.css" rel="stylesheet" type="text/css"> 

<!-- Revolution Slider 5.x CSS settings -->
<link  href="/js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
<link  href="/js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
<link  href="/js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>

<!-- CSS | Theme Color -->
<link href="/css/colors/theme-skin-color-set2.css" rel="stylesheet" type="text/css">

 <link rel="stylesheet" type="text/css" href="/css/markdown.css">
   <link rel="stylesheet" type="text/css" href="/css/editor.css">
 
    <script type="text/x-mathjax-config">
      MathJax.Hub.Config({
       "HTML-CSS": {
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
        TeX: { equationNumbers: {autoNumber: "AMS"}, extensions: ["AMSmath.js","AMSsymbols.js", "http://sonoisa.github.io/xyjax_ext/xypic.js"] },

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




<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="">
<div id="wrapper" class="clearfix">
 <div id="app">
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      <img alt="" src="/images/preloaders/2.gif">
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
  </div>
  
  @include('partials.nav')

  <div class="main-content">


  @yield('content')

  <!-- Footer -->
  <footer id="footer" class="footer" data-bg-color="#212331">
    <div class="container pt-70 pb-40">
      <div class="row">
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <img class="mt-5 mb-20" alt="" src="/images/logo-white-footer.png">
            <p>Nashik, Maharashtra, India</p>
            <ul class="list-inline mt-5">
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored2 mr-5"></i> <a class="text-gray" href="#">8800106866</a> </li>
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored2 mr-5"></i> <a class="text-gray" href="#">info@aegisinstitute.co.in</a> </li>
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-colored2 mr-5"></i> <a class="text-gray" href="#">www.aegisacademy.co.in</a> </li>
            </ul>            
            
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h4 class="widget-title line-bottom-theme-colored-2">Useful Links</h4>
            <ul class="angle-double-right list-border">
              <li><a href="/">Home Page</a></li>
              <li><a href="/about">About Us</a></li>
              <li><a href="/courses">Courses</a></li>
              <li><a href="/careers">Careers</a></li>
              <li><a href="/wiki">Wiki Pages</a></li>              
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h4 class="widget-title line-bottom-theme-colored-2">Top Courses</h4>
            <div class="latest-posts">
                           <article class="post media-post clearfix pb-0 mb-10">
                <div class="post-right">
                  <h5 class="post-title mt-0 mb-5"><a href="/courses/4">ISI/CMI Entrance exam and JEE(..</a></h5>
                  <p class="post-date mb-0 font-12">Coming Soon</p>
                </div>
              </article>
                           <article class="post media-post clearfix pb-0 mb-10">
                <div class="post-right">
                  <h5 class="post-title mt-0 mb-5"><a href="/courses/3">Introductory Geometry..</a></h5>
                  <p class="post-date mb-0 font-12">Coming Soon</p>
                </div>
              </article>
                           <article class="post media-post clearfix pb-0 mb-10">
                <div class="post-right">
                  <h5 class="post-title mt-0 mb-5"><a href="/courses/2">Introductory Number Theory..</a></h5>
                  <p class="post-date mb-0 font-12">Coming Soon</p>
                </div>
              </article>
              
              
              
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h4 class="widget-title line-bottom-theme-colored-2">Institute Hours</h4>
            <div class="opening-hours">
              <ul class="list-border">
                <li class="clearfix"> <span> Mon - Tues :  </span>
                  <div class="value pull-right"> 8.00 am - 8.00 pm </div>
                </li>
                <li class="clearfix"> <span> Wednes - Thurs :</span>
                  <div class="value pull-right"> 8.00 am - 8.00 pm </div>
                </li>
                <li class="clearfix"> <span> Fri : </span>
                  <div class="value pull-right"> 8.00 pm - 8.00 pm </div>
                </li>
                <li class="clearfix"> <span> Sun : </span>
                  <div class="value pull-right bg-theme-colored2 text-white closed"> Closed </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom" data-bg-color="#2b2d3b">
      <div class="container pt-20 pb-20">
        <div class="row">
          <div class="col-md-6">
            <p class="font-12 text-black-777 m-0 sm-text-center">Copyright &copy;2017 AEGIS. Powered by <a target="_blank" href="http://trumpetstechnologies.com">Trumpets.</a></p>
          </div>
          <div class="col-md-6 text-right">
            <div class="widget no-border m-0">
              <ul class="list-inline sm-text-center mt-5 font-12">
                <li>
                  <a href="/terms-of-use">Terms &amp; Conditions</a>
                </li>
                <li>|</li>
                <li>
                  <a href="/privacy-policy">Privacy Policy</a>
                </li>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>


  </div>
  
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
  </div>
</div>
<!-- end wrapper -->



      <!-- external javascripts -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- <script src="/js/jquery-ui.min.js"></script> -->
<!-- JS | jquery plugin collection for this theme -->
<script src="/js/jquery-plugin-collection.js"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

   <script src="https://use.fontawesome.com/4891465124.js"></script>


     <!-- END REVOLUTION SLIDER -->
        <script type="text/javascript">
          var tpj=jQuery;
          var revapi34;
          tpj(document).ready(function() {
            if(tpj("#rev_slider_home").revolution == undefined){
              revslider_showDoubleJqueryError("#rev_slider_home");
            }else{
              revapi34 = tpj("#rev_slider_home").show().revolution({
                sliderType:"standard",
                jsFileLocation:"js/revolution-slider/js/",
                sliderLayout:"fullwidth",
                dottedOverlay:"none",
                delay:5000,
                navigation: {
                  keyboardNavigation:"on",
                  keyboard_direction: "horizontal",
                  mouseScrollNavigation:"off",
                  onHoverStop:"on",
                  touch:{
                    touchenabled:"on",
                    swipe_threshold: 75,
                    swipe_min_touches: 1,
                    swipe_direction: "horizontal",
                    drag_block_vertical: false
                  }
                  ,
                  arrows: {
                    style:"zeus",
                    enable:true,
                    hide_onmobile:true,
                    hide_under:600,
                    hide_onleave:true,
                    hide_delay:200,
                    hide_delay_mobile:1200,
                    tmp:'<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
                    left: {
                      h_align:"left",
                      v_align:"center",
                      h_offset:30,
                      v_offset:0
                    },
                    right: {
                      h_align:"right",
                      v_align:"center",
                      h_offset:30,
                      v_offset:0
                    }
                  },
                  bullets: {
                    enable:true,
                    hide_onmobile:true,
                    hide_under:600,
                    style:"metis",
                    hide_onleave:true,
                    hide_delay:200,
                    hide_delay_mobile:1200,
                    direction:"horizontal",
                    h_align:"center",
                    v_align:"bottom",
                    h_offset:0,
                    v_offset:30,
                    space:5,
                    tmp:'<span class="tp-bullet-img-wrap"><span class="tp-bullet-image"></span></span>'
                  }
                },
                viewPort: {
                  enable:true,
                  outof:"pause",
                  visible_area:"80%"
                },
                responsiveLevels:[1240,1024,778,480],
                gridwidth:[1240,1024,778,480],
                gridheight:[600,550,500,450],
                lazyType:"none",
                parallax: {
                  type:"scroll",
                  origo:"enterpoint",
                  speed:400,
                  levels:[5,10,15,20,25,30,35,40,45,50],
                },
                shadow:0,
                spinner:"off",
                stopLoop:"off",
                stopAfterLoops:-1,
                stopAtSlide:-1,
                shuffle:"off",
                autoHeight:"off",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false,
                fallbacks: {
                  simplifyAll:"off",
                  nextSlideOnWindowFocus:"off",
                  disableFocusListener:false,
                }
              });
            }
          }); /*ready*/
        </script>
      <!-- END REVOLUTION SLIDER -->

 <!-- Scripts -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="/js/custom.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
      (Load Extensions only on Local File Systems ! 
       The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="/js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="/js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="/js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>




@yield('js')

</body>
</html>