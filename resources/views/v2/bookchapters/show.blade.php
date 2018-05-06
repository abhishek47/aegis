@extends('v2.layouts.master')





@section('content')




    <div class="bg-light mini-spacer" style="min-height: 1000px;">

  <div class="container p-t-20 p-b-30">

     

         
                  <h2><b>Chapter :</b> {{ $chapter->title }}</h2>
                  <p class="course-description mt-10  markdown-body" id="classroom-summary" style="font-size: 16px;">{{ $chapter->description }}
                  </p>
                

{{--                   <br>

                  @if(!empty($classroom->contents))
                  <a href="{{  Storage::url($classroom->contents) }}" target="_blank" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> Table of Contents</a>
                  @endif
                  @if(!empty($classroom->ready))
                  <a href="{{  Storage::url($classroom->ready) }}" target="_blank" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> Are you Ready?</a>
                  @endif
                  @if(!empty($classroom->need))
                  <a href="{{  Storage::url($classroom->need) }}" target="_blank" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> Do you need this?</a>
                  @endif
     --}}
                </div>








<div class="container pb-30 pt-30">
            
		      
          @foreach($chapter->problems as $index => $problem)
                <div class="course-single-item bg-white border-1px clearfix m-b-30 week-box" >
					    
  					        <div class="course-details clearfix p-20 pt-15">
  	                  <div class="course-top-part pull-left mr-40">
  	                    <h4 class="mt-0 m-b-10"><b>Problem {{ $index+1 }}</b></h4>
  	                  </div>
  		                 
  		                <div class="clearfix"></div>
  		                   <h4>{{ $problem->question }}</h4>

                         <div>

                          {{ $problem->solution }}

                         </div>

		                </div>

    					  </div>
         @endforeach
         
            </div>



	




@endsection


@section('js')

	


@endsection