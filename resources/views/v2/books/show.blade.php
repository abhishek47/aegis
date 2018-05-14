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

  
  <div class="banner-innerpage" style="background: url('/images/bg/bg-pattern.png'); background-size: cover;height: 340px;padding: 0;">
               <div class="overlay" style="height: 340px;background: rgba(0, 173, 10, 0.8);">
                <div class="container">
                    <!-- Row  -->
                    <div class="row ">
                        <div class="col-md-3 m-t-40">
                              <img src="{{ isset($book->image) ? Storage::disk('s3')->url($book->image) : 'http://via.placeholder.com/350x150' }}" style="width: 100%;height: 260px;box-shadow: 0px 0px 30px rgba(115, 128, 157, 0.4);">
                        </div>
                        <!-- Column -->
                        <div class="col-md-8 aos-init aos-animate" data-aos="fade-down" data-aos-duration="1200">
                            <h1 class="title p-t-30" style="">{{ $book->title }}<br>
            <span style="font-size: 14px;color: #000;">by {{ $book->authors }}</span></h1>
                            <h6 class="subtitle font-medium">{{ substr($book->short_description, 0, 350) }}...</h6> </div>
                        <!-- Column -->
                    </div>
                </div>
                </div>
            </div>


    <div class="bg-white mini-spacer" style="min-height: 1000px;">


        







<div class="container pb-30 pt-30">

      <h4 style="font-weight: bold;color: #9a9a9a;">Synopsis</h4>

      <div style="margin-bottom: 40px;">
      {!! $book->description !!}
      </div>       
		
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