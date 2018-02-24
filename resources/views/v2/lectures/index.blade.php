@extends('v2.layouts.master')


@section('content')
    



<div class="bg-light mini-spacer" style="min-height: 1000px;">

      <div class="container pt-50">

      <h2 class="title font-bold m-b-40 m-t-0">Video Lectures</h2>

      @foreach($lectures as $index => $lecture)

        
             
               
           <div class="card card-shadow" style="width: 100%;cursor: pointer;" >
                 
                 <div class="card-body"> 
                 <h2  class="title font-medium m-t-0"><a class="text-dark" href="/lectures/{{ $lecture->id }}"></a>{{ $lecture->name }}</h2> 
                    
                  <p class="text-dark">{!! substr($lecture->description, 0, 320) !!}...</p>

                  <p class="m-b-1"><a class="font-bold" href="/lecture/{{ $lecture->id }}">Read More</a></p>

                  <p class="m-b-0 font-medium">Lecture on : {{ $lecture->date }}, {{ $lecture->start_time }}</p>

                  </div>

                  <div class="card-footer bg-danger" style="padding: 2px;"></div>
                </div>
              
           
              
           @endforeach
    


          {{ $lectures->links() }}

          <br><br>
          </div>
</div>
   


     



@endsection


