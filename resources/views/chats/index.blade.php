<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">

	<title>Chats | Aegis Academy | Online Courses, Wiki Pages, Offline Courses</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>

	<meta property="og:image" content="https://aegisacademy.co.in/images/bg/icon.png" />

	<meta property="og:description" content="Aegis Academy is started by young educators to provide high - quality education at affordable price. Almost every country conducts several exams to hunt extraordinary problem - solving skilled students.Olympiads are the most prestigious exam among them." />

	<meta property="og:url" content="https://aegisacademy.co.in/" />

	<meta property="og:title" content="Aegis Academy | Online Courses, Wiki Pages, Offline Courses - Aegis Academy is started by young educators to provide high - quality education at affordable price. Almost every country conducts several exams to hunt extraordinary problem - solving skilled students.Olympiads are the most prestigious exam among them." />



	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">



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

	<link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css">

	<link rel="stylesheet" type="text/css" href="/css/chats.min.css">

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

    <style type="text/css">
       .chat-start {
          background-color: #fff;
          
        }
    </style>

</head>

<body>

  <div class="app" id="app">


<div id="content" class="app-content box-shadow-0" role="main">
   
    <div class="content-main d-flex flex" id="content-main">
      <chats :threads="{{ $threads }}" :user="{{ auth()->user() }}" :chats="{{ isset($chats) ? $chats : 1 }}"  ></chats> 
    </div>
    <div class="content-footer white hide" id="content-footer">
        <div class="d-flex p-3"><span class="text-sm text-muted flex">&copy; Copyright. AEGIS</span>
            <div class="text-sm text-muted">Version 1.0.2</div>
        </div>
    </div>
</div>
</div>












  </div>


  <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>

  <script src="/js/chats.min.js"></script>

  <script src="/js/app.js"></script>

</body>
</html>
