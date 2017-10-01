@extends('layouts.app')


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
	    <h3 class="panel-title">Question</h3>
	  </div>
	  <div class="panel-body" style="font-size: 17px;">
	    
	    <h4>{{ $question->q }}</h4>

	    <p><b>Desired Solution : </b></p>

	   {{ $question->solution }}
	  </div>
	</div>

	<div class="page-header">
		<h5>Comments</h5>
	</div>




	@foreach($question->comments as $comment)
       
       <div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">{{ $comment->user->name }} | {{ $comment->created_at->diffForHumans() }}</h3>
		  </div>
		  <div class="panel-body">
		    <div class="media"> 
		      <div class="media-body"> {{ $comment->body }} </div> 
		    </div>
		  </div>
		   <div class="panel-footer">
		   	<a href="/comment/{{$comment->id}}/like"><i class="fa fa-thumbs-up"></i> {{ $comment->likes }}</a> |  <a href="/comment/{{$comment->id}}/dislike"><i class="fa fa-thumbs-down"></i> {{ $comment->dislikes }}</a> 
		   </div>
		</div>


	@endforeach




	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Add New Comment</h3>
	  </div>
	  <div class="panel-body">
	  <form method="POST" action="/comments/{{ $question->id }}">
	    {{ csrf_field() }}
	     <div id="editor" class="editor--toolbar" style="margin-top: 20px;">
	   
      <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups"> 
        <div class="btn-group" role="group" aria-label="First group"> 
            <button type="button" title="Add Heading" data-toggle="tooltip" class="btn btn-default" onclick="addHeader();return false;"><i class="fa fa-header"></i></button>
            <button type="button" title="Add Link" data-toggle="tooltip" class="btn btn-default" onclick="addLink();return false;"><i class="fa fa-link"></i></button>  
            <button type="button" title="Add List" data-toggle="tooltip" class="btn btn-default" onclick="addList();return false;"><i class="fa fa-list-ul"></i></button> 
            <button type="button" title="Add Table" data-toggle="tooltip" class="btn btn-default" onclick="addTable();return false;"><i class="fa fa-table"></i></button> 
            <button type="button" title="Add Image" data-toggle="tooltip" class="btn btn-default" onclick="addImage();return false;"><i class="fa fa-photo"></i></button> 
         </div> 
         <div class="btn-group" role="group" aria-label="Second group"> 
            <button type="button" title="Add Example" data-toggle="tooltip" class="btn btn-default" onclick="addExample();return false;">E.g.</button>
            <button type="button" title="Add Solution" data-toggle="tooltip" class="btn btn-default" onclick="addSoln();return false;">Soln.</button>
            <button type="button" title="Add Theorem" data-toggle="tooltip" class="btn btn-default" onclick="addTheorem();return false;">Theorem</button>  
            <button type="button" title="Add Proof" data-toggle="tooltip" class="btn btn-default" onclick="addProof();return false;">Proof</button> 
         </div> 
         <div class="btn-group" role="group" aria-label="Third group"> 
            <button type="button" title="Add Definition" data-toggle="tooltip" class="btn btn-default" onclick="addDef();return false;">Df.</button> 
             <button type="button" title="Add Table of Contents" data-toggle="tooltip" class="btn btn-default" onclick="addToc();return false;"><i class="fa fa-list-alt"></i></button> 
         </div> 
         <div class="btn-group" role="group" aria-label="Fourth group"> 
            <button type="button" title="Align to Center" data-toggle="tooltip" class="btn btn-default" onclick="addCenterAlign();return false;"><i class="fa fa-align-center"></i></button> 
         </div> 
      </div>
	    <textarea id="marked-mathjax-input" name="comment" rows="8" class="form-control"></textarea>

    </div>
       
       <br>

    	<button class="btn btn-success" type="submit">Post Comment</button>	


       </form>
	    
	  </div>
	</div>

	</div>

@endsection


@section('js')
  


  <script type="text/javascript" src="/js/functions.js"></script>

@endsection