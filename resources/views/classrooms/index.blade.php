@extends('layouts.master2')



@section('content')



<section class="pt-3 heading">
  <div class="container pb-0">

    <h2 style="font-weight: bold;float: left;margin-right: 15px;">Courses</h2>

    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link active" href="#">Live</a>
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
    <?php $courseChunks = $classrooms->chunk(3); ?>

        @foreach($courseChunks as $courseChunk)
          <div class="row mt-4">

              @foreach($courseChunk as $index => $course)
              
                 <div class="col-md-4" id="classrooms">
                    <div class="card text-light" style="background: {{ getColor($course->id) }};cursor: pointer;" @click="openLink('/courses/{{$course->id}}')">
                      <div class="card-body">
                        <h4 class="card-title">{{ $course->title }}</h4>
                        <p class="card-text">{{ $course->description }}</p>
                        <a href="/classrooms/{{$course->id}}" class="btn btn-dark">View Course</a>
                      </div>
                    </div>
                 </div>
              
              @endforeach
      
        </div>

  @endforeach
</section>
{{ $classrooms->links() }}
<br><br>

</section>



@endsection


@section('js')



@endsection