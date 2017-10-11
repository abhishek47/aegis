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
                <h3>Wiki of the Day</h3>
                <p>{{ substr($wikiOfDay->title, 0, 40) }}...</p>
                <a href="/wiki" class="read-more font-roboto-slab text-theme-colored2">Read More</a>
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

 <!--   <section id="cta"> 
  <div class="container">
     <div class="call-to-action pt-40 pb-40 mb-20 bg-theme-colored2">
        <div class="row">
          <div class="col-xs-12 col-sm-8 col-md-8">
            <div class="icon-box icon-rounded-bordered left media mb-0 ml-60 ml-sm-0"> <a class="media-left pull-left flip" href="#"> <i class="fa fa-info text-white border-1px p-20"></i></a>
              <div class="media-body">
                <h3 class="media-heading heading text-white">{{ $wikiOfDay->title }}</h3>
                <p class="text-white" style="font-size: 16px;">Wiki of the Day</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4 text-center"> 
            <a href="#" class="btn btn-default btn-flat btn-xl mt-20">Read Now</a> 
          </div>
        </div>
      </div>
    </div>
   </section> -->

   
     
 



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
              <p style="font-size: 18px;color: #000;">Preparation for olympiads is exciting and challenging.Due to lack of resources and high - quality education, many students coudn't hone their problem-skills. We are here to fill this gap.</p>
              <p style="font-size: 18px;color: #000;">First, we are starting with the training for maths olympiads and other contests based on maths. Later, we shall add more subjects.We prepare the students for the following exams.</p>
              <a href="/about" class="btn btn-colored btn-theme-colored2 text-white btn-lg pl-40 pr-40 mt-15">Read More</a>
            </div>
            
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container pb-50">
        <div class="section-content">
          <div class="row">
            <div class="col-md-6">
              <h3 class="text-uppercase line-bottom-theme-colored-2 mt-0 line-height-1"><i class="fa fa-calendar mr-10"></i>Daily Wiki <span class="text-theme-colored2">Pages</span></h3>
              @foreach($wikis as $wiki)

                <article>
                  <div class="event-block">
                    <div class="event-date text-center">
                      <ul class="text-white font-18 font-weight-600">
                        <li class="border-bottom">{{ $wiki->created_at->format('d') }}</li>
                        <li class="">{{ $wiki->created_at->format('M') }}</li>
                      </ul>
                    </div>
                    <div class="event-meta border-1px pl-40">
                      <div class="event-content pull-left flip">
                        <h4 class="event-title media-heading font-roboto-slab font-weight-700"><a href="#">{{ substr($wiki->title, 0, 40) }}</a></h4>
                        <p class="mt-5">Read and Learn with our daily updated wiki pages</p>
                      </div>
                    </div>
                  </div>
                </article>

                <br>

              @endforeach
             
            </div>            
            <div class="col-md-6">
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
                      Yes, every wiki page has a section for solving different problems related to the topic/course they are studing.
                    </div>
                  </div>
                </div>
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
                  
                  <div class="clearfix"></div>
                  <p class="course-description mt-20" style="font-size: 16px;!important">{!! substr($course->body, 0, 100) !!}...</p>
                  <ul class="list-inline course-meta mt-15">
                    <li>
                      <h6>{{ $course->days }} Days</h6>
                      <span> Course</span>
                    </li>
                    <li>
                      <h6>{{ $course->enrollments()->count() }}</h6>
                      <span> Enrolls</span>
                    </li>
                    <li>
                      <h6><span class="course-time">{{ $course->duration }} min</span></h6>
                      <span> Class Duration</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
           @endforeach
          </div>
        </div>
      </div>
    </section>


    <!-- Section: Pricing -->
    <section id="pricing">
      <div class="container pt-70">
        <div class="section-title">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="text-uppercase title">Membership <span class="text-theme-colored2">Pricing</span></h2>
              <div class="double-line-bottom-centered-theme-colored-2 mt-20"></div>              
              <p class="text-uppercase">Choose Your Desired Pricing Plan</p>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">

            <div class="col-xs-12 col-sm-6 col-md-6 hvr-float-shadow mb-sm-30">
              <div class="pricing-table bg-silver-deep text-center maxwidth400 pt-10">
                <h2 class="package-type text-uppercase line-bottom-centered mb-50">Free</h2>
                <h2 class="price text-theme-colored2 font-opensans font-weight-400 font-64 bg-white pt-10 pb-20 mb-0"><span class="font-36 currency">&#8377</span>0 <span class="font-16 text-black">/ Month</span></h2>
                <ul class="list price-list theme-colored text-left flip check-circle mt-0 mb-20">
                  <li>Read Unlimited Wiki Pages</li>
                  <li>Solve Various Problems</li>
                  <li>View Solutions to 20 Problems</li>
                  <li>Get Updated about our courses</li>
                </ul>
                <a class="btn btn-lg btn-theme-colored text-uppercase btn-block pt-20 pb-20 btn-flat" href="{{ route('register') }}">Signup Now</a>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 hvr-float-shadow mb-sm-30">
              <div class="pricing-table bg-silver-deep text-center maxwidth400 pt-10">
                <h2 class="package-type text-uppercase line-bottom-centered mb-50">Premium</h2>
                <h2 class="price text-theme-colored2 font-opensans font-weight-400 font-64 bg-white pt-10 pb-20 mb-0"><span class="font-36 currency">&#8377</span>2000 <span class="font-16 text-black">/ Year</span></h2>
                <ul class="list price-list theme-colored text-left flip check-circle mt-0 mb-20">
                  <li>Read Unlimited Wiki Pages</li>
                  <li>Solve Various Problems</li>
                  <li>View Solutions to <b>Unlimited</b> Problems</li>
                  <li>Get Updated about our courses</li>
                </ul>
                <a class="btn btn-lg btn-theme-colored text-uppercase btn-block pt-20 pb-20 btn-flat" href="{{ route('register') }}">Signup Now</a>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </section>




@endsection
