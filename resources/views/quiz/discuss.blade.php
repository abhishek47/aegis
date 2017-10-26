@extends('layouts.master')

@section('css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>



@endsection


@section('content')
	


	<div class="container">

	<!-- <div>
		<a href="#" class="btn btn-primary pull-left"><< Prev</a>
		<a href="#" class="btn btn-primary pull-right">Next >></a>
	</div> -->

	<div class="clearfix"></div>
	<br>
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title" style="font-weight: bold;">Question</h3>
	  </div>
	  <div class="panel-body" style="font-size: 17px;color: #000;">
	    
	    <h4 id="question">{{ $question->q }}</h4>

	    <p><b>Solution : </b></p>

	    <div id="solution">
	   		{{ $question->solution }}
	   </div>
	  </div>
	</div>

	<div class="page-header">
		<h5>Comments</h5>
	</div>




	@foreach($question->comments as $comment)
       
       <div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title" style="font-weight: bold;">{{ $comment->user->name }} | {{ $comment->created_at->diffForHumans() }}</h3>
		  </div>
		  <div class="panel-body">
		    <div class="media"> 
		      <div class="media-body" style="font-size: 16px;color: #000" id="comment-{{$comment->id}}"> {!! $comment->body !!} </div> 
		      <br><br>
		    </div>
		  </div>
		   <div class="panel-footer">
		   	<a href="/comment/{{$comment->id}}/like"><i class="fa fa-thumbs-up"></i> {{ $comment->likes }}</a> |  <a href="/comment/{{$comment->id}}/dislike"><i class="fa fa-thumbs-down"></i> {{ $comment->dislikes }}</a> 
		   </div>
		</div>


	@endforeach




	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title" style="font-weight: bold;">Add New Comment ( Put latex commands inside \$ \$ )</h3>
	  </div>
	  <div class="panel-body">
	  <form method="POST" action="/comments/{{ $question->id }}">
	    {{ csrf_field() }}
	     <div id="editor" class="editor--toolbar" style="margin-top: 20px;">
	   
    
	    <textarea  id="comment-input" name="comment" rows="8" class="form-control" ></textarea>

    </div>
       
       <br>

    	<button class="btn btn-success" type="submit">Post Comment</button>	


       </form>
	    
	  </div>
	</div>

	</div>

@endsection


@section('js')
  
  <script>
var simplemde = new SimpleMDE({ element: document.getElementById("comment-input") });
</script>


<script type="text/javascript">
	@foreach($question->comments as $comment)
	$('#comment-{{$comment->id}}').html(md.render($('#comment-{{$comment->id}}').html()));
	@endforeach
</script>	


  <script type="text/javascript" src="/js/functions.js"></script>


  <script type="text/javascript">
  		
  	 var text = $('#question').html();		

  	 text = text.replace(/^&gt;/mg, '>');
     text = md.render(text) ;

     text = aegismarked(text);

  	 $('#question').html(text);

  	 MathJax.Hub.Queue(
              ["Typeset",MathJax.Hub,document.getElementById('solution')],
              function() {
                
                   
                    var text = $('#solution').html();		

  	  
				  	 text = text.replace(/^&gt;/mg, '>');
				     text = md.render(text) ;

				     text = aegismarked(text);

				  	 $('#solution').html(text);
              }
            );



  </script>

@endsection