@extends('v2.layouts.master')
@section('content')
<div class="bg-light mini-spacer" style="min-height: 1000px;">
  <div class="container ">
    <div class="card card-shadow">
      <div class="card-header bg-info">
        
      </div>
      <div class="card-body">
        
          <h3 class="m-b-0"><b>What are Live Courses?</b></h3>
     
        
        
        <p class="course-description" style="font-size: 17px;">
          {!! \Config::get('settings.live_course_desc') !!}
        </p>
      </div>
    </div>
    <?php $classroomChunks = $classrooms->chunk(3); ?>
    @foreach($classroomChunks as $classroomChunk)
    <div class="row mt-4">
      @foreach($classroomChunk as $index => $classroom)
      
      <div class="col-md-4" id="classrooms">
        <div class="card card-shadow" style="cursor: pointer;" @click="openLink('/classrooms/{{$classroom->id}}')">
          <div class="card-header bg-success text-white font-medium">
           <p class="float-left m-b-0">{{isset($classroom->chapters()->first()->date)? $classroom->chapters()->first()->date :'Not Added'}}</p>
           <p class="float-right m-b-0">{{$classroom->chapters()->count()}} Chapters</p>
          </div>
          <div class="card-body">
            <h4 class="card-title">
            <a href="/classrooms/{{$classroom->id}}">{{ $classroom->title }}</b></a>
            
            
            </h4>
            <p class="card-subtitle">{{$classroom->weeks}} Weeks | {{$classroom->likes()->count()}} <i class="fa fa-thumbs-o-up text-theme-colored2"></i></p>
            
            <div class="clearfix"></div>
            <p class="course-description " style="font-size: 17px;">{{ substr($classroom->description, 0, 100) }}...</p>
            
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