@extends('layouts.master')
  
@section('content')


  @include('partials.banner')


    <!-- Divider: Features -->
    <section class="divider bg-silver-deep">
      <div class="container pt-50 pb-60">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-4 mb-sm-30">
            <div class="feature-box text-center">
              <div class="feature-icon">
                <img src="images/icons/online.png" alt="">
              </div>
              <div class="feature-title">
                <h3>Online Courses</h3>
                <p>Enroll into our curated courses</p>
                <a href="/courses" class="read-more font-roboto-slab text-theme-colored2">Read More</a>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4 mb-sm-30">
            <div class="feature-box text-center">
              <div class="feature-icon">
                <img src="images/icons/book.png" alt="">
              </div>
              <div class="feature-title">
                <h3>Wiki of the Week</h3>
                @if($wikiOfDay != null)
                <p>{{ substr($wikiOfDay->title, 0, 40) }}...</p>
                <a href="/wiki/{{$wikiOfDay->id}}" class="read-more font-roboto-slab text-theme-colored2">Read More</a>
                @else 
                <p>Read our wiki articles daily...</p>
                <a href="/wiki" class="read-more font-roboto-slab text-theme-colored2">Read More</a>
                @endif
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="feature-box text-center">
              <div class="feature-icon">
                <img src="images/icons/graduate.png" alt="">
              </div>
              <div class="feature-title">
                <h3>Offline Courses</h3>
                <p>Join our institute for more effective learning.</p>
                <a href="/about" class="read-more font-roboto-slab text-theme-colored2">Read More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



   
     
 



     <!-- Section: About -->
    <section>
      <div class="container pb-70">
        <div class="section-content">
          <div class="row">
            <div class="col-md-5">
              <img class="img-fullwidth maxwidth500" src="images/about/1.png" alt="">
            </div>
            <div class="col-md-7">
              <h2 class="text-uppercasetext-theme-colored mt-0 mt-sm-30">About <span class="text-theme-colored2">AEGIS</span></h2>
              <div class="double-line-bottom-theme-colored-2"></div>
              <p style="font-size: 18px;color: #000;">Aegis Academy is started by young educators to provide high - quality education at affordable price. Almost every country conducts several exams to hunt extraordinary problem - solving skilled students.Olympiads are the most prestigious exam among them.</p>
              <p style="font-size: 18px;color: #000;" class="hidden-xs">Preparation for olympiads is exciting and challenging.Due to lack of resources and high - quality education, many students coudn't hone their problem-skills. We are here to fill this gap.</p>
              <p style="font-size: 18px;color: #000;" class="hidden-xs">First, we are starting with the training for maths olympiads and other contests based on maths. Later, we shall add more subjects.We prepare the students for the following exams.</p>
              <a href="/about" class="btn btn-colored btn-theme-colored2 text-white btn-lg pl-40 pr-40 mt-15">Read More</a>
            </div>
            
          </div>
        </div>
      </div>
    </section>


    <section class="mb-30 wikiOfDay" style="cursor: pointer;" @click="openWiki({{$wikiOfDay->id}})">
     <div class="container" style="padding-top: 0px;">
      <div class="call-to-action pt-40 pb-40 mb-20 bg-theme-colored">
        <div class="row">
          <div class="col-xs-12 col-sm-8 col-md-8">
            <div class="icon-box icon-rounded-bordered left media mb-0 ml-60 ml-sm-0"> 
            <a class="media-left pull-left flip hidden-xs" href="#"> <i class="pe-7s-notebook text-white border-1px p-20"></i></a>
              <div class="media-body">
                <h3 class="media-heading heading text-white font-12 wiki-label">Wiki of the Week</h3>
                <p class="text-white wiki-title">{{ $wikiOfDay->title }}</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4 text-center"> 
            <a href="/wiki/{{$wikiOfDay->id}}" class="btn btn-flat btn-default btn-xl mt-20">Read Wiki Page</a> 
          </div>
        </div>
       </div>
      </div>
    </section>

 



    <section class="layer-overlay overlay-white-9" data-bg-img="images/bg/bg-pattern.png" style="background-image: url(&quot;images/bg/bg-pattern.png&quot;);">
      <div class="container pb-40">
          <div class="section-title">
          <div class="row">
            <div class="col-md-12">
              <h2 class="text-uppercase title">Seamless <span class="text-theme-colored2">Learning</span> Process</h2>              
              <div class="double-line-bottom-theme-colored-2"></div>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-md-3">
              <div class="icon-box hover-effect border-1px border-radius-10px text-center bg-white p-15 pt-40 pb-30">
                <a href="/courses" class="icon icon-circled icon-lg" data-bg-color="#FC9928" style="background: rgb(252, 153, 40) !important;">
                  <i class="pe-7s-study text-white font-48"></i>
                </a>
                <h4 class="icon-box-title text-uppercase letter-space-1 font-20 mt-15"><a href="/courses">1. Watch Online Courses</a></h4>
                <p class="">Choose from our huge library of courses, enroll into them and get into an interactive live learning session, like a real classroom.</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="icon-box hover-effect border-1px border-radius-10px text-center bg-white p-15 pt-40 pb-30">
                <a href="/wiki" class="icon icon-circled icon-lg" data-bg-color="#43B14B" style="background: rgb(67, 177, 75) !important;">
                  <i class="pe-7s-notebook text-white font-48"></i>
                </a>
                <h4 class="icon-box-title text-uppercase letter-space-1 font-20 mt-15"><a href="/wiki">2. Read Our Wiki Pages</a></h4>
                <p class="">Once you learn about the course through our live sessions, move to our wiki pages to read and sharpen the learnt knowledge.</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="icon-box hover-effect border-1px border-radius-10px text-center bg-white p-15 pt-40 pb-30">
                <a href="/ajax/quiz-info.html" class="icon icon-circled icon-lg ajaxload-popup"  data-bg-color="#00C3CB" style="background: rgb(0, 195, 203) !important;">
                  <i class="pe-7s-diamond text-white font-48"></i>
                </a>
                <h4 class="icon-box-title text-uppercase letter-space-1 font-20 mt-15"><a href="/ajax/quiz-info.html" class="ajaxload-popup">3. Practice Questions</a></h4>
                <p class="">Practice makes man perfect, hence we have a set of practice questions in each wiki page to practice that set of course.</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="icon-box hover-effect border-1px border-radius-10px text-center bg-white p-15 pt-40 pb-30">
                <a href="/discuss" class="icon icon-circled icon-lg" data-bg-color="#EF5861" style="background: rgb(239, 88, 97) !important;">
                  <i class="pe-7s-medal text-white font-48"></i>
                </a>
                <h4 class="icon-box-title text-uppercase letter-space-1 font-20 mt-15"><a href="/discuss">4. Post Your Doubts</a></h4>
                <p class="">Afterall, if you still got doubts, visit our discuss section to post your queries and get it cleared from other experts around.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


  


    <!-- Section: Courses -->
    <section id="courses" class="bg-silver-deep">
      <div class="container pb-40">
        <div class="section-title">
          <div class="row">
            <div class="col-md-12">
              <h2 class="text-uppercase title">Our <span class="text-theme-colored2">Courses</span></h2>              
              <p class="text-uppercase mb-0">Choose Your Desired Course</p>
              <div class="double-line-bottom-theme-colored-2"></div>
            </div>
          </div>
        </div>
        <div class="row mtli-row-clearfix">
          <div class="owl-carousel-3col" data-nav="true">
           @foreach($courses as $course)
             <div class="item">
              <div class="course-single-item bg-white border-1px clearfix mb-30 col-md-12">
               
                <div class="course-details clearfix p-20 pt-15">
                  <div class="course-top-part pull-left mr-40">
                    <a href="/courses/{{$course->id}}"><h3 class="mt-0 mb-5">{{ $course->name }}</h3></a>
                    <ul class="list-inline">
                      <li class="review-stars text-theme-colored2">
                        {{ $course->type == 0 ? 'Offline' : 'Online' }}
                      </li>
                    </ul>
                  </div>
                  
                  
                </div>
              </div>
            </div>
           @endforeach
          </div>
        </div>
      </div>
    </section>


   


       <section>
      <div class="container pb-50">
        <div class="section-content">
          <div class="row">
                     
            <div class="col-md-7">
              <h3 class="text-uppercase line-bottom-theme-colored-2 line-height-1 mt-0 mt-sm-30"><i class="fa fa-question-circle-o mr-10"></i>Frequently Asked <span class="text-theme-colored2">Questions</span></h3>
              <div class="panel-group accordion-stylished-left-border accordion-icon-filled accordion-no-border accordion-icon-left accordion-icon-filled-theme-colored2" id="accordion6" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headin1">
                    <h6 class="panel-title">
                      <a role="button" data-toggle="collapse" data-parent="#accordion6" href="#collaps1" aria-expanded="true" aria-controls="collaps1">
                        Why Aegis Academy is Best?
                      </a>
                    </h6>
                  </div>
                  <div id="collaps1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headin1">
                    <div class="panel-body">
                      Aegis Academy is started by young educators to provide high - quality education at affordable price.
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="heading2">
                    <h6 class="panel-title">
                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion6" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        Which subjects we get to study at Aegis Academy?
                      </a>
                    </h6>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                    <div class="panel-body">
                      A bunch of online and offline courses to learn about the subject mathematics and different exams related to it.
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="heading3">
                    <h6 class="panel-title">
                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion6" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
                        For which exams I can refer this website?
                      </a>
                    </h6>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                    <div class="panel-body">
                      Please visit our about page to learn about the exams.
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="heading4">
                    <h6 class="panel-title">
                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion6" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
                        What are the Daily Wiki Pages?
                      </a>
                    </h6>
                  </div>
                  <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                    <div class="panel-body">
                      Wiki Pages are the educational articles that gives all the knowledge about a particular topic along with problems to practice that concept.
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="heading5">
                    <h6 class="panel-title">
                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion6" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
                        Do I get any practice questions to solve?
                      </a>
                    </h6>
                  </div>
                  <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
                    <div class="panel-body">
                      Yes, every wiki page has a section for solving different problems related to the topic/course they are studying.
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-5">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <h2 class="mt-0 line-height-1"><span class="text-theme-colored2">Contact us</span></h2>
                  <div class="double-line-bottom-theme-colored-2 mt-15 mb-10"></div>
                  <p class="mb-15">Got any queries? Or interested to join the journey of Aegis.Drop us a message!</p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="icon-box left media bg-white border-1px p-15 mb-15"> <a class="media-left pull-left" href="#"> <i class="pe-7s-map-2 text-theme-colored2"></i></a>
                    <div class="media-body">
                      <h5 class="mt-0">Our Office Location</h5>
                      <p>Nashik, Maharashtra, India</p>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-12">
                  <div class="icon-box left media bg-white border-1px p-15 mb-15"> <a class="media-left pull-left" href="#"> <i class="pe-7s-call text-theme-colored2"></i></a>
                    <div class="media-body">
                      <h5 class="mt-0">Contact Number</h5>
                      <p>(+91) 8800106866</p>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-12">
                  <div class="icon-box left media bg-white border-1px p-15 mb-15"> <a class="media-left pull-left" href="#"> <i class="pe-7s-mail text-theme-colored2"></i></a>
                    <div class="media-body">
                      <h5 class="mt-0">Email Address</h5>
                      <p>info@aegisacademy.co.in</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>





@endsection
