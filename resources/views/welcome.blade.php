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
                <h3>Online Course Facilities</h3>
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
                <h3>Modern WIKI Library</h3>
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
                <h3>Learn at our Institute</h3>
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
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas voluptatem maiores eaque similique non distinctio voluptates perspiciatis omnis, repellendus ipsa aperiam, laudantium voluptatum nulla?.</p>
              <p class="hidden-md">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, assumenda, voluptatum. Libero eligendi molestias iure error animi totam laudantium, aspernatur similique id eos at consectetur illo culpa, quisquam temporibus esse!</p>
              <p class="hidden-md">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, assumenda, voluptatum. Libero eligendi molestias iure error animi totam laudantium, aspernatur similique id eos at consectetur illo culpa, quisquam temporibus esse!</p>
              <a href="#" class="btn btn-colored btn-theme-colored2 text-white btn-lg pl-40 pr-40 mt-15">Read More</a>
            </div>
            
          </div>
        </div>
      </div>
    </section>

   <section id="cta"> 
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
            <div class="item">
              <div class="course-single-item bg-white border-1px clearfix mb-30">
                <div class="course-thumb">
                  <div class="price-tag">Free</div>
                </div>
                <div class="course-details clearfix p-20 pt-15">
                  <div class="course-top-part pull-left mr-40">
                    <a href="/courses/show"><h4 class="mt-0 mb-5">Name of the Course</h4></a>
                    <ul class="list-inline">
                      <li class="review-stars">
                       <b>Online</b>
                      </li>
                      <li>25 <i class="fa fa-comments-o text-theme-colored2"></i></li>
                      <li>68 <i class="fa fa-thumbs-o-up text-theme-colored2"></i></li>
                    </ul>
                  </div>
                  
                  <div class="clearfix"></div>
                  <p class="course-description mt-20">Lorem ipsum dolor sit amet, consec teturadipsi cing elit. Nobis commodi esse aliquam eligend reprehenderit, numquam a odio.</p>
                  <ul class="list-inline course-meta mt-15">
                    <li>
                      <h6>4 year</h6>
                      <span> Course</span>
                    </li>
                    <li>
                      <h6>35</h6>
                      <span> Class Size</span>
                    </li>
                    <li>
                      <h6><span class="course-time">2 hours 30 min</span></h6>
                      <span> Class Duration</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="course-single-item bg-white border-1px clearfix mb-30">
                <div class="course-thumb">
                  <div class="price-tag">Free</div>
                </div>
                <div class="course-details clearfix p-20 pt-15">
                  <div class="course-top-part pull-left mr-40">
                    <a href="/courses/show"><a href="page-course-details.html"><h4 class="mt-0 mb-5">Name of the Course</h4></a></a>
                    <ul class="list-inline">
                      <li class="review-stars">
                        <b>Offline</b>
                      </li>
                      <li>25 <i class="fa fa-comments-o text-theme-colored2"></i></li>
                      <li>68 <i class="fa fa-thumbs-o-up text-theme-colored2"></i></li>
                    </ul>
                  </div>
                 
                  <div class="clearfix"></div>
                  <p class="course-description mt-20">Lorem ipsum dolor sit amet, consec teturadipsi cing elit. Nobis commodi esse aliquam eligend reprehenderit, numquam a odio.</p>
                  <ul class="list-inline course-meta mt-15">
                    <li>
                      <h6>3 year</h6>
                      <span> Course</span>
                    </li>
                    <li>
                      <h6>20</h6>
                      <span> Class Size</span>
                    </li>
                    <li>
                      <h6><span class="course-time">1 hour 45 min</span></h6>
                      <span> Class Duration</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="course-single-item bg-white border-1px clearfix mb-30">
                <div class="course-thumb">
                  <div class="price-tag">Free</div>
                </div>
                <div class="course-details clearfix p-20 pt-15">
                  <div class="course-top-part pull-left mr-40">
                    <a href="/courses/show"><h4 class="mt-0 mb-5">Name of the Course</h4></a>
                    <ul class="list-inline">
                      <li class="review-stars">
                        <b>Offline</b>
                      </li>
                      <li>25 <i class="fa fa-comments-o text-theme-colored2"></i></li>
                      <li>68 <i class="fa fa-thumbs-o-up text-theme-colored2"></i></li>
                    </ul>
                  </div>
                  
                  <div class="clearfix"></div>
                  <p class="course-description mt-20">Lorem ipsum dolor sit amet, consec teturadipsi cing elit. Nobis commodi esse aliquam eligend reprehenderit, numquam a odio.</p>
                  <ul class="list-inline course-meta mt-15">
                    <li>
                      <h6>2 year</h6>
                      <span> Course</span>
                    </li>
                    <li>
                      <h6>30</h6>
                      <span> Class Size</span>
                    </li>
                    <li>
                      <h6><span class="course-time">2 hours 30 min</span></h6>
                      <span> Class Duration</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="course-single-item bg-white border-1px clearfix mb-30">
                <div class="course-thumb">
                  <div class="price-tag">&#8377 2000</div>
                </div>
                <div class="course-details clearfix p-20 pt-15">
                  <div class="course-top-part pull-left mr-40">
                    <a href="/courses/show"><h4 class="mt-0 mb-5">Name of the Course</h4></a>
                    <ul class="list-inline">
                      <li class="review-stars">
                        <b>Online</b>
                      </li>
                      <li>25 <i class="fa fa-comments-o text-theme-colored2"></i></li>
                      <li>68 <i class="fa fa-thumbs-o-up text-theme-colored2"></i></li>
                    </ul>
                  </div>
                 
                  <div class="clearfix"></div>
                  <p class="course-description mt-20">Lorem ipsum dolor sit amet, consec teturadipsi cing elit. Nobis commodi esse aliquam eligend reprehenderit, numquam a odio.</p>
                  <ul class="list-inline course-meta mt-15">
                    <li>
                      <h6>1 year</h6>
                      <span> Course</span>
                    </li>
                    <li>
                      <h6>45</h6>
                      <span> Class Size</span>
                    </li>
                    <li>
                      <h6><span class="course-time">3 hours 20 min</span></h6>
                      <span> Class Duration</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
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
