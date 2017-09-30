@extends('layouts.app')



@section('content')
<div class="container">
<form method="POST" action="/wiki">

 <div class="form-group">
   <label>Page Title</label>
	 <input class="form-control" type="text" name="title" placeholder="Ex. The \(uvw\) method" required="true">
  </div>

   <div class="form-group">
   <label>Body</label>
	 <textarea name="body" id="body"></textarea>
  </div>

	  <div class="form-group">
	  <label>Wiki Category</label>
	  <select class="form-control" name="category_id">
	     <option value="1">Category 1</option>
	     <option value="2">Category 2</option>
	     <option value="3">Category 3</option>
	  </select>
	</div>
	<br>
	<hr>

	<button type="submit" class="btn btn-primary">Post Wiki Page</button>
	
</form>

</div>
@endsection


@section('js')

<script>
var simplemde = new SimpleMDE({ 
        previewRender: function(plainText, preview) {
          setTimeout(function() {
            markjax(plainText, preview);
          }, 50);
          return preview.innerHTML;
        },  element: document.getElementById("body") });
</script>


@endsection