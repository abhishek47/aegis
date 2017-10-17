@extends('layouts.master')


@section('content')
	
<section>

	<div class="container">


	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title" style="font-weight: bold;">Start New Discussion ( You can use latex for writing mathematics )</h3>
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
		    <h3 class="panel-title" style="font-weight: bold;"><a href="#">{{ $discussion->user->name }} | {{ $discussion->created_at->diffForHumans() }}</a></h3>
		  </div>
		  <div class="panel-body">
		    <div class="media"> 
		      <div class="media-body" style="font-size: 16px;color: #000"> 
				<a href="/discuss/discussion:{{ $discussion->id }}" style="color: #000;">{{ $discussion->title }}</a> </div> 
		      <br><br>
		    </div>
		  </div>
		  
		</div>


	@endforeach




	
	</div>

	</div>

</section>
@endsection


@section('js')
  


  <script type="text/javascript" src="/js/functions.js"></script>

@endsection