@extends('v2.layouts.master')





@section('content')
  
   <div class="banner-innerpage" style="background: url('/images/bg/bg-pattern.png'); background-size: cover;height: 340px;padding: 0;">
               <div class="overlay" style="height: 340px;background: rgba(0, 173, 10, 0.8);">
                <div class="container">
                    <!-- Row  -->
                    <div class="row ">
                        <div class="col-md-3 m-t-40">
                              <img src="{{ isset($chapter->book->image) ? Storage::disk('s3')->url($chapter->book->image) : 'http://via.placeholder.com/350x150' }}" style="width: 100%;height: 260px;box-shadow: 0px 0px 30px rgba(115, 128, 157, 0.4);">
                        </div>
                        <!-- Column -->
                        <div class="col-md-8 aos-init aos-animate" data-aos="fade-down" data-aos-duration="1200">
                            <h1 class="title p-t-30" style="">{{ $chapter->book->title }}<br>
            <span style="font-size: 14px;color: #000;">by {{ $chapter->book->authors }}</span></h1>
                            <h6 class="subtitle font-medium">{{ substr($chapter->book->short_description, 0, 350) }}</h6> </div>
                        <!-- Column -->
                    </div>
                </div>
                </div>
            </div>



    <div class="bg-white mini-spacer" style="min-height: 1000px;">

  <div class="container p-t-20 p-b-30">

     

         
                  <h2 style="font-weight: bold;"><a style="color: #000;" href="/books/{{$chapter->book->id}}"><i class="fa fa-arrow-left"></i></a> {{ $chapter->title }}</h2>
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
					          
                    <div class="bg-info p-2">
                      
                    </div> 

  					        <div class="course-details clearfix p-20 pt-15">
  	                  <div class="course-top-part pull-left mr-40">
  	                    <h4 class="mt-0 m-b-10" style="font-weight: 500;">{{ $problem->question }}</h4>
  	                  </div>
  		                 
  		                <div class="clearfix"></div>
  		                  

                         <div style="font-size: 20px;
    color: #000;">

                          {{ $problem->solution }}

                         </div>

		                </div>

    					  </div>
         @endforeach
         
            </div>



	




@endsection


@section('js')

	


@endsection