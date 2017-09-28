@extends('layouts.app')


@section('content')
    
    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Wiki Pages</h1>
        <p>
          <a class="btn btn-lg btn-primary" href="/wiki/create" role="button">Add New Page</a>
        </p>
      </div>

    </div> <!-- /container -->
	<div class="container">
	  <?php $wikiChunks = $wikis->chunk(2); ?>

	  @foreach($wikiChunks as $wikiG)
	  <div class="row">

		@foreach($wikiG as $index => $wiki)
          <div class="col-md-6 wiki--item">
           <a href="/wiki/{{$wiki->id}}">
				<div class="panel panel-default {{ $index%2 == 0 ? 'bg--primary' : 'bg--success' }}" >
				  <div class="panel-body">
				    <h2>{{ $wiki->title }}</h2>
				  </div>
				</div>
			</a>
	      </div>		

		@endforeach
      </div>

      @endforeach
	</div>


@endsection