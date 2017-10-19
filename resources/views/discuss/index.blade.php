@extends('layouts.master')

@section('css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

@endsection

@section('content')
	
<section>

	<div class="container">


	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title" style="font-weight: bold;">Start New Discussion ( Put latex commands inside \$ \$ )</h3>
	  </div>
	  <div class="panel-body">
	  <form method="POST" action="/discuss">
	    {{ csrf_field() }}
	    
	    <div class="form-group">
	    	
	    	<label>Title</label>
	    	<input type="text" name="title" class="form-control">
	    </div>

	     <div id="editor" class="editor--toolbar" style="margin-top: 20px;">
	   	
    	<label>Description</label>
	    <textarea id="marked-mathjax-input" name="question" rows="8" class="form-control"></textarea>

    </div>
       
       <br>

    	<button class="btn btn-success" type="submit">Post Question</button>	


       </form>
	    
	  </div>

	  </div>

	<!-- <div>
		<a href="#" class="btn btn-primary pull-left"><< Prev</a>
		<a href="#" class="btn btn-primary pull-right">Next >></a>
	</div> -->

	<div class="clearfix"></div>
	<br>
	

	<div class="page-header">
		<h2>Recent Discussions</h2>
	</div>




	@foreach($discussions as $discussion)
       
       <div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title" style="font-weight: bold;"><a href="/discuss/discussion:{{ $discussion->id }}">{{ $discussion->title }}</a></h3>
	  </div>
	  <div class="panel-body" style="font-size: 17px;color: #000;">
	    
	    <h4>{{ substr($discussion->question, 0, 100) }}...</h4>

	   
	  </div>
	  <div class="panel-footer">
	  	{{ $discussion->user->name }} | {{ $discussion->created_at->diffForHumans() }}
	  </div>
	</div>


	@endforeach


	<div>
		{{ $discussions->links() }}
	</div>




	
	</div>

	</div>

</section>
@endsection


@section('js')
  
  <script>
var simplemde = new SimpleMDE();
</script>


  <script type="text/javascript" src="/js/functions.js"></script>

@endsection