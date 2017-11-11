@extends('layouts.master2')


@section('css')

	

	<link rel="stylesheet" type="text/css" href="/css/classroom.css">

	<script src="/js/classroom.js"></script>
@endsection


@section('content')


 <nav class="navbar navbar-expand-lg navbar-light tab-bar">
    <div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">

        <a class="nav-link" href="/classrooms/{{ $classroom->id }}/chapter/{{ $chapter->id }}">Session</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/classrooms/{{ $classroom->id }}/chapter/{{ $chapter->id }}/homework">Homework <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/classrooms/{{ $classroom->id }}/chapter/{{ $chapter->id }}/notes">Notes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/classrooms/{{ $classroom->id }}/chapter/{{ $chapter->id }}/discuss">Discuss</a>
      </li>
    </ul>
   
  </div>
  </div>
</nav>



<div class="pt-4 container">

	<div class="row">

		<div style="width: 100%;margin-bottom: 20px;">
		<h3 class="font-weight-bold">{{ $chapter->title }} | Homework</h3>
		<hr>
		</div>


    @foreach($chapter->homeworks as $index => $homework)

        @include('chapters.homework._question')

    @endforeach

	</div>



@endsection


@section('js')

  @foreach($chapter->homeworks as $homework)

    <div id="buffer-{{ $homework->id }}" class="hidden"></div>
    <div id="solution-buffer-{{ $homework->id }}" class="hidden"></div>

     <script type="text/javascript">
    var text =  $('#homework-question-{{ $homework->id  }}').text();
    console.log(text);
     text = text.replace(/^&gt;/mg, '>');
    var text = md.render(text);
      $('#homework-question-{{ $homework->id  }}').html(aegismarked(text));
    </script>

    <script type="text/javascript">
    var text =  $('#homework-solution-{{ $homework->id  }}').text();
    console.log(text);
     text = text.replace(/^&gt;/mg, '>');
    var text = md.render(text);
      $('#homework-solution-{{ $homework->id  }}').html(aegismarked(text));
    </script>



  @endforeach


  <script type="text/javascript">
    function submitAnswer(hid)
    {
      var answer = $('#answer-'+hid).val();

      axios.post('/chapter-homework/'+hid+'/check', {answer: answer})
        .then(function(res){
          console.log(res);
          if(res.data.msg == 'correct')
          {
             $('#answer-response-'+hid).html('Your answer is Correct!'); 
             attempts = 3 - res.data.attempts;
             $('#solution-'+hid).html('<b>Problem Solved in ' +  attempts + ' attempts! Your answer : ' + answer + '');
          } else if(res.data.msg == 'incorrect')
          {
            $('#answer-response-'+hid).html('Your answer is Incorrect!You have ' + res.data.attempts + ' attempts left!'); 
          }
        });
    }
  </script>


@endsection



