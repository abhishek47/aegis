@extends('layouts.master2')
@section('content')



<section class="heading">
  <div class="container pb-0">

    <h2 style="font-weight: bold;float: left;margin-right: 15px;">Courses</h2>

    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link active" href="#">Virtual</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Self-Paced</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Offline</a>
      </li>
     
    </ul>
    <hr>
  </div>
</section>

<section class="pt-3">
  <div class="container">
    <?php $courseChunks = $onlineCourses->chunk(3); ?>

        @foreach($courseChunks as $courseChunk)
          <div class="row">
          
              @foreach($courseChunk as $index => $course)
              
                 <div class="col-md-4" id="classrooms">
                    <div class="card text-light" style="background: {{ getColor($course->id) }};cursor: pointer;" @click="openLink('/courses/{{$course->id}}')">
                      <div class="card-body">
                        <h4 class="card-title">{{ $course->name }}</h4>
                        <p class="card-text">{{ $course->description }}</p>
                        <a href="/courses/{{$course->id}}" class="btn btn-dark">Start Course</a>
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