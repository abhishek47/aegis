@extends('v2.layouts.master')


@section('content')
    



<div class="bg-light mini-spacer" style="min-height: 1000px;">

      <div class="container pt-50">

      <h2 class="title font-bold m-b-40 m-t-0">Free Video Lectures</h2>

      @foreach($lectures as $index => $lecture)

        
             
               
           <div class="card card-shadow" style="width: 100%;cursor: pointer;" >
                 
                 <div class="card-body"> 
                 
                    <h2  class="title font-medium m-t-0"><a class="text-dark" href="/lectures/{{ $lecture->id }}">{{ $lecture->name }}</a></h2> 
                    
                    <div class="text-dark marked-input m-b-10" >   
                       {{ $lecture->short_description }}..<a href="/lectures/{{ $lecture->id }}">Read More</a>
                    </div>
                  
                     <p class="m-b-10 font-medium text-primary">Lecture on : {{ $lecture->date }}, {{ $lecture->start_time }}</p>

                     <a target="_blank" href="{{ $lecture->link }}" class="btn btn-primary"><i class="fa fa-play-circle"></i> &nbsp; Join Class</a>

                     <p class="text-grey font-bold m-t-10">** Please note the above link works only on Google Chrome or Mozilla Firefox.</p>
                  
                  </div>

                  <div class="card-footer bg-danger" style="padding: 2px;"></div>
                </div>
              
           
              
           @endforeach
    


          {{ $lectures->links() }}

          <br><br>
          </div>
</div>
   


     



@endsection



