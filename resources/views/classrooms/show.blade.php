@extends('layouts.master')


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

	<section class="inner-header divider " style="background-color: #24324a !important" >
      <div class="container pt-30 pb-30">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-light font-36">{{ $classroom->title }}</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="#">Home</a></li>
                <li><a href="#">Live Courses</a></li>
                <li><a href="#">{{ $classroom->title }}</a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>


    <div style="background-color: #fff;min-height: 900px;">

  <div class="container pt-50">

  <div class="course-single-item bg-white border-1px clearfix mb-30">
    <div class="course-thumb">
                  <div class="price-tag">Summary</div>
                </div>
  <div class="course-details clearfix p-20 pt-15">

                  <div class="course-top-part pull-left mr-40">
                    <h4 class="mt-0 mb-5"><b>Course Summary</b></h4>
                  </div>

                 
                  
                  <div class="clearfix"></div>
                  <p class="course-description mt-10  markdown-body" id="classroom-summary" style="font-size: 15px;">{{ $classroom->summary }}
                  </p>

                </div>


  </div>


</div>


  <div class="container">
    <div class="section-title pt-0 pb-0 mb-10">
          <div class="row">
            <div class="col-md-12">
              <h2 class="text-uppercase title">Course <span class="text-theme-colored2">Content</span></h2>
              <div class="double-line-bottom-theme-colored-2"></div>
            </div>
          </div>
        </div>
</div>


<div class="container pb-30">
<?php $chaptersChunks = $classroom->chapters->chunk(3); ?>

        @foreach($chaptersChunks as $chapterChunk)
          <div class="row mt-4">

              @foreach($chapterChunk as $index => $chapter)
              
                 <div class="col-md-6" id="classrooms">
                   <div class="course-single-item bg-white border-1px clearfix mb-30" style="cursor: pointer;" @click="openLink('/classrooms/{{ $chapter->classroom->id }}/chapter/{{ $chapter->id }}')">
              
                <div class="course-details clearfix p-20 pt-15">
                  <div class="course-top-part pull-left mr-40">
                    <a href="/classrooms/{{ $chapter->classroom->id }}/chapter/{{ $chapter->id }}"><h4 class="mt-0 mb-5"><b>{{ $index+1 }}. {{ $chapter->title }}</b></h4></a>
                    
                  </div>
                  
                  <div class="clearfix"></div>
                  <p class="course-description mt-10" style="font-size: 17px;">{{ substr($chapter->description, 0, 100) }}...</p>
                  <ul class="list-inline course-meta mt-15">
                    <li>
                      <h6><span id="status-{{ $chapter->id }}">{{ $chapter->getStatusText() }}</span></h6>
                      <span> Status</span>
                    </li>
                    <li>
                      <h6>{{$chapter->date}}</h6>
                      <span> Date</span>
                    </li>
                     <li>
                      <h6>{{$chapter->begin_time}}</h6>
                      <span>Begin Time</span>
                    </li>
                   
                  </ul>
                </div>
              </div>
                 </div>
              
              @endforeach
      
        </div>

  @endforeach

  </div>

</div>


	




@endsection


@section('js')

	<script type="text/javascript">

			var text = $('#classroom-summary').text();

        	text = md.render(text);

        	text = aegismarked(text);

        	$('#classroom-summary').html(text);

		 MathJax.Hub.Queue(
              ["Typeset",MathJax.Hub,document.getElementById('classroom-summary')],
              function() {
                	
                	

                	
                   
                  console.log('Done');
              });
	</script>

	@foreach($classroom->chapters as $chapter)

  <script type="text/javascript">
     // Get a reference to the database service

     var fireBase{{ $chapter->id }} = new firebase.database().ref('/messages/chapter-{{ $chapter->id }}');
    

     fireBase{{ $chapter->id }}.on("child_added", function(snapshot) {
           console.log("Session Started");	 
           var message = snapshot.val();
           if(message.text != '~end~')
           {
           	  $('#status-'+{{ $chapter->id }}).html('Session Started');
           } else {
           		$('#status-'+{{ $chapter->id }}).html('Session Completed');
           }
        
      });
    
    
  
   



  </script>

  @endforeach


@endsection