@extends('v2.layouts.master')


@section('css')

    <script src="https://www.gstatic.com/firebasejs/4.6.0/firebase.js"></script>
  <script>
    // Initialize Firebase
    var config = {
      apiKey: "AIzaSyBtfeW_1rcka4LcDIMPHew7-LMC3ZRxW00",
      authDomain: "aegisvc-ed73f.firebaseapp.com",
      databaseURL: "https://aegisvc-ed73f.firebaseio.com",
      projectId: "aegisvc-ed73f",
      storageBucket: "aegisvc-ed73f.appspot.com",
      messagingSenderId: "841108811787"
    };
    firebase.initializeApp(config);

  </script>

@endsection


@section('content')




    <div class="bg-light mini-spacer" style="min-height: 1000px;">

  <div class="container p-t-20 p-b-30">

        <div class="row">

          <div class="col-md-3">

              <img src="{{ isset($book->image) ? Storage::disk('s3')->url($book->image) : 'http://via.placeholder.com/350x150' }}" style="width: 100%;height: 200px;">
                  
          </div>
   

               <div class="col-md-9"> 
                  <h2>{{ $book->title }}</h2>
                  <p class="course-description mt-10  markdown-body" id="classroom-summary" style="font-size: 16px;">{{ $book->description }}
                  </p>
               </div>   
         </div>

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
            
		
                <div class="course-single-item bg-white border-1px clearfix m-b-30 week-box" >
					    
					  <div class="course-details clearfix p-20 pt-15">

					                  <div class="course-top-part pull-left mr-40">
					                    <h4 class="mt-0 m-b-10"><b>Chapters</b><span class="topics-done-count">{{$book->chapters()->count()}}</span></h4>

					                  </div>

					                 
					                  
					                  <div class="clearfix"></div>
					                  @if($book->chapters()->count())
					                  <ul class="topics">
					                   @foreach($book->chapters as $chapter)
					                  	<li class="topic"><a href="/books/{{ $chapter->book->id }}/chapter/{{ $chapter->id }}"><i class="fa fa-file-text-o"></i>  <span class="title">{{$chapter->title}}</span> </a> <span class="duration">{{ $chapter->problems()->count() }} questions</span></li>
					                   @endforeach	
					                  </ul>
					                  
					                  @else
					                  	<p class="no-topics">Chapters to be added soon!</p>
					                  @endif
					                </div>


					  </div>
         
         
            </div>



	




@endsection


@section('js')

	


@endsection