@extends('layouts.master')


@section('content')

		 <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="images/bg/bg1.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Our Courses</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="#">Home</a></li>
                <li class="active">Courses</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

   


    <!-- Section: Courses -->
    <section id="courses" class="bg-silver-deep">
      <div class="container pb-0">
          <h2 class="text-uppercasetext-theme-colored mt-0 mt-sm-30">Online <span class="text-theme-colored2">Courses</span></h2>
	            <div class="double-line-bottom-theme-colored-2"></div>
        <div class="row mtli-row-clearfix">
           @foreach($onlineCourses as $course)
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
    </section>
    

    @if(count($offlineCourses))
     <!-- Section: Courses -->
    <section id="courses" class="bg-silver-deep">
      <div class="container pt-10">
          <h2 class="text-uppercasetext-theme-colored mt-0 mt-sm-30">Offline <span class="text-theme-colored2">Courses</span></h2>
	            <div class="double-line-bottom-theme-colored-2"></div>
        <div class="row mtli-row-clearfix">
           @foreach($offlineCourses as $course)

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
    </section>
@endif



@endsection