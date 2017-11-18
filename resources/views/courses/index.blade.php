@extends('layouts.master')
@section('content')




<section class="pt-3">
  <div class="container">
    <?php $courseChunks = $onlineCourses->chunk(3); ?>

        @foreach($courseChunks as $courseChunk)
          <div class="row mt-4">

              @foreach($courseChunk as $index => $course)
              
                 <div class="col-md-4" id="classrooms">
                    <div class="course-single-item bg-white border-1px clearfix mb-30">
                <div class="course-thumb">
                  <div class="price-tag">$290</div>
                </div>
                <div class="course-details clearfix p-20 pt-15">
                  <div class="course-top-part pull-left mr-40">
                    <a href="page-course-details.html"><h4 class="mt-0 mb-5">Nural Networking Course</h4></a>
                    <ul class="list-inline">
                      <li class="review-stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                      </li>
                      <li>25 <i class="fa fa-comments-o text-theme-colored2"></i></li>
                      <li>68 <i class="fa fa-thumbs-o-up text-theme-colored2"></i></li>
                    </ul>
                  </div>
                  <div class="author-thumb">
                    <img src="images/course/xs2.jpg" alt="" class="img-circle">
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
              
              @endforeach
      
        </div>

  @endforeach
</section>
{{ $onlineCourses->links() }}
<br><br>

</section>



@endsection