@extends('layouts.master')


@section('content')
	


	<div class="container">


	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title" style="font-weight: bold;">Start New Comment ( You can use latex for writing mathematics )</h3>
	  </div>
	  <div class="panel-body">
	  <form method="POST" action="/discussion">
	    {{ csrf_field() }}
	     <div id="editor" class="editor--toolbar" style="margin-top: 20px;">
	   
    
	    <textarea id="marked-mathjax-input" name="question" rows="8" class="form-control"></textarea>

    </div>
       
       <br>

    	<button class="btn btn-success" type="submit">Post Comment</button>	


       </form>
	    
	  </div>

	<!-- <div>
		<a href="#" class="btn btn-primary pull-left"><< Prev</a>
		<a href="#" class="btn btn-primary pull-right">Next >></a>
	</div> -->

	<div class="clearfix"></div>
	<br>
	

	<div class="page-header">
		<h5>Recent Discussions</h5>
	</div>




	@foreach($discussions as $discussion)
       
       <div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title" style="font-weight: bold;">{{ $discussion->user->name }} | {{ $discussion->created_at->diffForHumans() }}</h3>
		  </div>
		  <div class="panel-body">
		    <div class="media"> 
		      <div class="media-body" style="font-size: 16px;color: #000"> {!! $discussion->question !!} </div> 
		      <br><br>
		    </div>
		  </div>
		  
		</div>


	@endforeach




	
	</div>

	</div>

@endsection


@section('js')
  


  <script type="text/javascript" src="/js/functions.js"></script>

@endsection