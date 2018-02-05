
@extends($chapter->status != 2 ? 'layouts.classroom' : 'v2.layouts.master')


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

  @if($chapter->status != 2)
	<link rel="stylesheet" type="text/css" href="/css/classroom.css">

	<script src="/js/classroom.js"></script>

  <style type="text/css">
    .editor--toolbar.fullscreen {
      width: 50% !important;
    }
     #saved-messages.fullscreen {

      width: 50% !important;
    }
    .editor-preview.fullscreen {
      width: 50% !important;
    }

     </style>

    @else

      <link rel="stylesheet" type="text/css" href="/css/content.css">

    @endif
 
@endsection


@section('content')

@if($chapter->status != 2)


@include('chapters.partials.classroom')


       
@else        

@include('chapters.partials.content')

@endif



</div>
</div>





@endsection


@section('js')
  
  
 
@if($chapter->status != 2)
  
  @include('chapters.partials.scripts.classroom')

@else
  
  @include('chapters.partials.scripts.content')

@endif

@endsection


