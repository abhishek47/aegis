@extends('layouts.master2')


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

	<section class="pt-3">
		<div class="container">
			<div class="card" style="width: 100%;">
			    <div class="card-header"><h3>{{ $classroom->title }}</h3></div>
				<div class="card-body markdown-body" id="classroom-summary">{{ $classroom->summary }}</div>
			</div>

			<div class="pt-4">
				<h2>Chapters</h2>
				<hr>
			</div>

			<div class="pt-3">
				@foreach($classroom->chapters as $index => $chapter)

					<div class="card" style="width: 100%;">
					    <div class="card-header"><h4>{{ $index+1 }}. {{ $chapter->title }}</h4></div>
						<div class="card-body" id="classroom-summary">
						 
						   	{{ $chapter->description }}
						  	
						  	<br><br>

						   	<span><b>Schedule :</b> {{ $chapter->date }} | {{ $chapter->begin_time }} | {{ $chapter->duration }} mins</span>

						   	<br><br>

						   	<span><b>Status :</b> <span id="status-{{ $chapter->id }}">{{ $chapter->getStatusText() }}</span></span>
						   	
						   	<br><br>
						   	
						   
						   	<a href="/classrooms/{{ $chapter->classroom->id }}/chapter/{{ $chapter->id }}" class="btn btn-sm btn-primary">Open Chapter</a>
						   	
						 </div>
					</div>

				@endforeach
			</div>
		</div>
	</section>




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