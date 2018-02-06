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

</head>

<body>

  <div class="app" id="app">


<div id="content" class="app-content box-shadow-0" role="main">
   
    <div class="content-main d-flex flex" id="content-main">
        <div class="d-flex flex" data-plugin="chat">
            <div class="fade aside aside-sm" id="content-aside">
                <div class="d-flex flex-column w-xl b-r dark modal-dialog" id="chat-nav">
                    <div class="navbar box-shadow">
                        <div class="input-group flex">
                            <input type="text" class="form-control px-0 no-bg no-border no-shadow search" placeholder="Search" required=""> <span class="input-group-btn"><button class="btn no-bg no-border no-shadow" type="button"><i class="fa fa-search text-muted"></i></button></span></div>
                    </div>
                    <div class="scrollable hover">
                        <div class="list inset">
                            <div class="p-2 px-3 text-muted text-sm">People</div>

                            <div class="list-item"  style="cursor: pointer;" class="light" data-id="item-1">
                               <span class="w-40 avatar circle grey"><i class="on b-white avatar-right"></i> <img src="user.profile_pic.encoded" alt="."></span>
                                <div class="list-body"><a href="#"  class="item-title _500" >Abhishek Wani</a>
                                    <div class="item-except text-sm text-muted h-1x">New Message</div>
                                    <div class="item-tag tag hide"></div>
                                </div>
                                <div></div>
                            </div>
                            
                            
                        </div>
                        <div class="no-result hide">
                            <div class="p-4 text-center">No Results</div>
                        </div>
                    </div>
                    <div class="p-3 mt-auto"><span class="text-sm text-muted">Messages: <span >12</span></span></div>
                </div>
            </div>
            <div class="d-flex flex" id="content-body">
                <div class="d-flex flex-column flex" id="chat-list">
                    <div class="navbar flex-nowrap white lt box-shadow"><a data-toggle="modal" data-target="#content-aside" data-modal class="mr-1 d-md-none"><span class="btn btn-sm btn-icon primary"><i class="fa fa-th"></i> </span></a><span class="text-md text-ellipsis flex"><span >Abhishek Wani</span> <span style="font-size: 12px;color:green;" v-text="status"></span></span>
                        
                    </div>
                    <div class="scrollable hover" id="chats">
                        <div class="p-3">
                            <div class="chat-list">
                                <div v-for="message in messages" class="chat-item" >
                                    <a href="#" class="avatar w-40"><img src="message.sender.profile_pic.encoded" alt="."></a>
                                    <div class="chat-body">
                                        <div class="chat-content rounded msg" >Some Message</div>
                                        <div class="chat-date date" >12:00 AM</div>
                                    </div>
                                </div>
                               
                               
                            </div>
                            
                        </div>
                    </div>
                    <div class="p-3 white lt b-t mt-auto" id="chat-form">
                        <div class="input-group">
                            <input type="text" class="form-control" v-model="newMessage"  placeholder="Say something" id="newField"> <span class="input-group-btn"><button class="btn white b-a no-shadow" type="button" id="newBtn"><i class="fa fa-keyboard text-success"></i></button></span>
                            <span class="input-group-btn"><button class="btn white b-a no-shadow" type="button" id="newBtn"><i class="fa fa-send text-success"></i></button></span></div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="content-footer white hide" id="content-footer">
        <div class="d-flex p-3"><span class="text-sm text-muted flex">&copy; Copyright. AEGIS</span>
            <div class="text-sm text-muted">Version 1.0.2</div>
        </div>
    </div>
</div>
</div>












  </div>



  <script src="/js/chats.min.js"></script>


</body>
</html>


