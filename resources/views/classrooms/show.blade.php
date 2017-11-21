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


    <div style="background-color: #fafafa;min-height: 900px;">

  <div class="container pt-20">

 
   
                  <h3 style="font-weight: bold;">Syllabus</h3>
                


                  <p class="course-description mt-10  markdown-body" id="classroom-summary" style="font-size: 16px;">{{ $classroom->summary }}
                  </p>

                </div>








<div class="container pb-30 pt-30">
            
		@for($i = 0; $i < $classroom->weeks; $i++)
                <div class="course-single-item bg-white border-1px clearfix mb-30 week-box" id="week-{{$i+1}}">
					    
					  <div class="course-details clearfix p-20 pt-15">

					                  <div class="course-top-part pull-left mr-40">
					                    <h4 class="mt-0 mb-5"><b>Week {{$i+1}}</b><span class="topics-done-count">{{$classroom->chapters()->where('week', $i+1)->where('status', 2)->count()}}/{{$classroom->chapters()->where('week', $i+1)->count()}}</span></h4>

					                  </div>

					                 
					                  
					                  <div class="clearfix"></div>
					                  @if($classroom->chapters()->where('week', $i+1)->count())
					                  <p style="font-size: 15px;font-weight: bold;color: #1A458E;">Sessions :</p>
					                  <ul class="topics">
					                   @foreach($classroom->chapters()->where('week', $i+1)->get() as $chapter)
					                  	<li class="topic"><a href="/classrooms/{{ $chapter->classroom->id }}/chapter/{{ $chapter->id }}"><i class="fa fa-file-text-o"></i>  <span class="title">{{$chapter->title}}</span> <span class="status {{ $chapter->getStatusClass() }}" id="status-{{ $chapter->id }}">{{ $chapter->getStatusText() }}</span></a> <span class="duration">{{ $chapter->date }} | {{ $chapter->begin_time }}</span></li>
					                   @endforeach	
					                  </ul>
					                  <br><br>
					                  <p style="font-size: 15px;font-weight: bold;color: #1A458E;">Homework : <span class="homework-count"><span class="number">{{ $classroom->homeworks()->where('week', $i+1)->count() }}</span> Questions</span></p>
					                  @else
					                  	<p class="no-topics">Topics to be added soon!</p>
					                  @endif
					                </div>


					  </div>
         
           @endfor
            </div>
<!--

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
-->

	




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
    

     fireBase{{ $chapter->id }}.once("child_added", function(snapshot) {
           console.log("Session Started");	 
           var message = snapshot.val();
           if(message.text != '~end~')
           {
           	  $('#status-'+{{ $chapter->id }}).html('Session Started');
           	  $('#status-'+{{ $chapter->id }}).removeClass('scheduled');
           	   $('#status-'+{{ $chapter->id }}).addClass('live');
           } else {
           		$('#status-'+{{ $chapter->id }}).html('Session Completed');
           		$('#status-'+{{ $chapter->id }}).removeClass('live');
           		$('#status-'+{{ $chapter->id }}).addClass('completed');
           }
        
      });
    
    
  
   



  </script>

  @endforeach


@endsection