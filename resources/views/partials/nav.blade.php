<!-- Header -->
  <header id="header" class="header">
    
    <div class="header-top bg-theme-colored2 sm-text-center hidden-sm">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="widget text-white">
              <ul class="list-inline xs-text-center text-white">
                <li class="m-0 pl-10 pr-10"> <a href="#" class="text-white"><i class="fa fa-phone text-white"></i> 8800106866</a> </li>
                <li class="m-0 pl-10 pr-10"> 
                  <a href="#" class="text-white"><i class="fa fa-envelope-o text-white mr-5"></i> info@aegisacademy.co.in</a> 
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-4 pr-0 pt-5">
            <div class="widget">
             
            </div>
          </div>
          <div class="col-md-2 pt-5">

            <ul class="list-inline sm-pull-none sm-text-center text-right text-white mb-sm-20 mt-10">
             @guest
              <li class="m-0 pl-10"><a href="/login" class="text-white"><i class="fa fa-user-o mr-5 text-white"></i> Login /</a></li>
              <li class="m-0 pl-0 pr-10"> 
                <a href="/register" class="text-white"><i class="fa fa-edit mr-5"></i>Register</a> 
              </li>
             @else
               
                <li class="m-0 pl-10"> 
                <a href="/account" class="text-white"><i class="fa fa-user mr-5"></i>Profile /</a> 
              </li>
              
               <li class="m-0 pl-0 pr-10">
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();" class="text-white">
                     <i class="fa fa-sign-out mr-5 text-white"></i>Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </li>

             @endguest 
            </ul>
          </div>
        </div>
      </div>
    </div>
   
    <div class="header-nav" style="box-shadow: 0 0 1px 1px rgba(20,23,28,.1), 0 3px 1px 0 rgba(20,23,28,.1);">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-white" style="z-index: auto; position: static; top: auto;">
        <div class="container">
          <nav id="menuzord-right" class="menuzord default menuzord-responsive"><em></em><em></em><em></em>
               </a><a class="menuzord-brand pull-left flip mt-sm-10 mb-sm-20" href="/"><img src="/images/logo-wide.png" alt=""></a>
            <ul class="menuzord-menu menuzord-right menuzord-indented scrollable" style="max-height: 400px;">
              @guest
              <li><a href="/">Home</a></li>
              <li><a href="/courses">Courses</a></li>
              <li><a href="/wiki">Wiki</a></li>
              <li><a href="/careers">Careers</a></li>
              <li><a href="/contact">Contact</a></li>
              @else
              <li><a href="/">Home</a></li>
               <li><a href="/courses">Courses</a></li>
             <!-- <li><a href="/courses">Courses</a>
                <ul class="dropdown" style="right: auto; display: none;">
                  <li><a href="/courses">Live Courses</a></li>
                  <li><a href="/courses/self">Self Paced Courses</a></li>
                  <li><a href="/courses/self">Offline Courses</a></li>
                </ul>
              </li> -->
             
               <li><a href="/courses">Wiki</a>
                <ul class="dropdown" style="right: auto; display: none;">
                  <li><a href="/wiki">Topical</a></li>
                  <li><a href="/wiki/problematic">Problematic</a></li>
                </ul>
              </li>
               <li><a href="/discuss">Discuss</a></li>
               <li><a href="/chats">Chat</a></li>
              @endguest
              <li class="scrollable-fix"></li>
            </ul>
           </nav>
        </div>
      </div><div style="display: none; width: 2048px; height: 70px; float: none;"></div>
    </div>
  </header>




