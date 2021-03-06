@extends('layouts.master')



@section('content')



<section class="inner-header divider " style="background-color: #24324a !important" >
      <div class="container pt-30 pb-30">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-light font-36">Live Courses</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="#">Home</a></li>
                <li><a href="#">Courses</a></li>
                 <li><a href="#">Live Courses</a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>




<div style="background-color: #fff;min-height: 900px;">

  <div class="container pt-50">

  <div class="course-single-item bg-white border-1px clearfix mb-30">
    <div class="course-thumb">
                  <div class="price-tag">Info</div>
                </div>
  <div class="course-details clearfix p-20 pt-15">

                  <div class="course-top-part pull-left mr-40">
                    <h3 class="mt-0 mb-5"><b>What are Live Courses?</b></h3>
                  </div>

                 
                  
                  <div class="clearfix"></div>
                  <p class="course-description mt-10" style="font-size: 17px;">
                      {!! \Config::get('settings.live_course_desc') !!}
                  </p>

                </div>


  </div>




    <?php $classroomChunks = $classrooms->chunk(3); ?>

        @foreach($classroomChunks as $classroomChunk)
          <div class="row mt-4">

              @foreach($classroomChunk as $index => $classroom)
              
                 <div class="col-md-4" id="classrooms">
                   <div class="course-single-item bg-white border-1px clearfix mb-30" style="cursor: pointer;" @click="openLink('/classrooms/{{$classroom->id}}')">
                <div class="course-thumb">
                  <div class="price-tag">&#8377 {{ $classroom->price }}</div>
                </div>
                <div class="course-details clearfix p-20 pt-15">
                  <div class="course-top-part pull-left mr-40">
                    <a href="/classrooms/{{$classroom->id}}"><h4 class="mt-0 mb-5"><b>{{ $classroom->title }}</b></h4></a>
                    <ul class="list-inline">
                      <li style="font-weight: bold;">
                          {{$classroom->weeks}} Weeks
                      </li>
                      <li>{{$classroom->likes()->count()}} <i class="fa fa-thumbs-o-up text-theme-colored2"></i></li>
                    </ul>
                  </div>
                  
                  <div class="clearfix"></div>
                  <p class="course-description mt-20" style="font-size: 17px;">{{ substr($classroom->description, 0, 100) }}...</p>
                  <ul class="list-inline course-meta mt-15">
                    <li>
                      <h6>{{ $classroom->chapters()->count() }}</h6>
                      <span> Chapters</span>
                    </li>
                    <li>
                      <h6>{{$classroom->enrollments()->count()}}</h6>
                      <span> Enrollments</span>
                    </li>
                     <li>
                      <h6>{{isset($classroom->chapters()->first()->date)? $classroom->chapters()->first()->date :'Not Added'}}</h6>
                      <span>Start Date</span>
                    </li>
                   
                  </ul>
                </div>
              </div>
                 </div>
              
              @endforeach
      
        </div>

  @endforeach
{{ $classrooms->links() }}
<br><br>

</div>

 
</div>

@endsection


@section('js')



@endsection