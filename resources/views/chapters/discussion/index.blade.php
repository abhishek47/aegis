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
      <li class="nav-item">
        <a class="nav-link" href="/classrooms/{{ $classroom->id }}/chapter/{{ $chapter->id }}/homework">Homework </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/classrooms/{{ $classroom->id }}/chapter/{{ $chapter->id }}/notes">Notes</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/classrooms/{{ $classroom->id }}/chapter/{{ $chapter->id }}/discuss">Discuss <span class="sr-only">(current)</span></a>
      </li>
    </ul>
   
  </div>
  </div>
</nav>



<div class="pt-4 container">

	<div class="row">

		<div style="width: 100%;margin-bottom: 20px;">
		<h3 class="font-weight-bold">{{ $chapter->title }} | Discussion</h3>
		<hr>
		</div>

	</div>



@endsection



