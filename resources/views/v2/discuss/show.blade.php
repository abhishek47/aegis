@extends('v2.layouts.master')

@section('css')


<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>


<script>
var Preview = {
  delay: 50,        // delay after keystroke before updating
  preview: null,     // filled in by Init below
  buffer: null,      // filled in by Init below
  timeout: null,     // store setTimout id
  mjRunning: false,  // true when MathJax is processing
  oldText: null,     // used to check if an update is needed
  //
  //  Get the preview and buffer DIV's
  //
  Init: function () {
    this.preview = document.getElementById("marked-mathjax-preview");
    this.buffer = document.getElementById("marked-mathjax-preview-buffer");
    this.textarea = document.getElementById("marked-mathjax-input");
    this.editorContainer = document.getElementById("editor--container");
    this.output = document.getElementById("main--output");
  },
  //
  //  Switch the buffer and preview, and display the right one.
  //  (We use visibility:hidden rather than display:none since
  //  the results of running MathJax are more accurate that way.)
  //
  SwapBuffers: function () {
    var buffer = this.preview;
    var preview = this.buffer;
    this.buffer = buffer;
    this.preview = preview;
    buffer.style.display = "none";
    buffer.style.position = "absolute";
    preview.style.position = ""; 
    preview.style.display = "";
  },
  //
  //  This gets called when a key is pressed in the textarea.
  //  We check if there is already a pending update and clear it if so.
  //  Then set up an update to occur after a small delay (so if more keys
  //    are pressed, the update won't occur until after there has been 
  //    a pause in the typing).
  //  The callback function is set up below, after the Preview object is set up.
  //
  Update: function () {
    if (this.timeout) {clearTimeout(this.timeout)}
    this.timeout = setTimeout(this.callback,this.delay);
  },
  //
  //  Creates the preview and runs MathJax on it.
  //  If MathJax is already trying to render the code, return
  //  If the text hasn't changed, return
  //  Otherwise, indicate that MathJax is running, and start the
  //    typesetting.  After it is done, call PreviewDone.
  //  
  CreatePreview: function () {
    Preview.timeout = null;
    if (this.mjRunning) return;
    var text = this.textarea.value;
    if (text === this.oldtext) return;
    text = this.Escape(text);                       //Escape tags before doing stuff
    this.buffer.innerHTML = this.oldtext = text;
    this.mjRunning = true;
    MathJax.Hub.Queue(
      ["Typeset",MathJax.Hub,this.buffer],
      ["PreviewDone",this]
    );
  },
  //
  //  Indicate that MathJax is no longer running,
  //  do markdown over MathJax's result, 
  //  and swap the buffers to show the results.
  //
  PreviewDone: function () {
    this.mjRunning = false;

    

    text = this.buffer.innerHTML;
    // replace occurrences of &gt; at the beginning of a new line
    // with > again, so Markdown blockquotes are handled correctly
    text = text.replace(/^&gt;/mg, '>');
     text = md.render(text) ;

    

     this.buffer.innerHTML = aegismarked(text);
 
     this.SwapBuffers();

       $('.slickQuiz').each(function(i, obj) {
        var qid = $(this).data('id');

        axios.get('/quiz/'+qid).then(function(response) {
          console.log(response.data);

          $('#slickQuiz-'+qid).slickQuiz({
            json: response.data
           });

            MathJax.Hub.Queue(
              ["Typeset",MathJax.Hub,document.getElementById('slickQuiz-'+qid)],
              function() {
                 console.log('Done');
              }
            );

        });
    });

     

     
    

    //$('#editor--container').toggleClass('hidden');
    $('#main--output').toggleClass('hidden');
  },
  Escape: function (html, encode) {
    return html
      .replace(!encode ? /&(?!#?\w+;)/g : /&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
     .replace(/'/g, '&#39;');
  },
  // The idea here is to perform fast updates. See http://stackoverflow.com/questions/11228558/let-pagedown-and-mathjax-work-together/21563171?noredirect=1#comment46869312_21563171
  // But our implementation is a bit buggy: flickering, bad rendering when someone types very fast.
  //
  // If you want to enable such buggy fast updates, you should 
  // add something like  onkeypress="Preview.UpdateKeyPress(event)" to textarea's attributes.
  UpdateKeyPress: function (event) {
    if (event.keyCode < 16 || event.keyCode > 47) {
      this.preview.innerHTML = '<p>' + marked(this.textarea.value) + '</p>';
      this.buffer.innerHTML = '<p>' + marked(this.textarea.value) + '</p>';
    }
    this.Update();


  }
  
};
//
//  Cache a callback to the CreatePreview action
//
Preview.callback = MathJax.Callback(["CreatePreview",Preview]);
Preview.callback.autoReset = true;  // make sure it can run more than once</script>

@endsection

@section('content')
	
<section class="bg-light mini-spacer" style="min-height: 1000px;">

<div class="container">
<div class="page-header">
  <h2 class="title font-bold text-dark m-t-0">{{ $discussion->title }}</h2>


@if($discussion->user_id == auth()->id())
	<a href="#" id="edit" style="color: #313131;font-size: 12px;" onclick="toggleEditor()"><i class="fa fa-edit"></i> Edit this Discussion</a> 
@endif
</div>  
   <form method="POST" action="/discussion/update/{{ $discussion->id }}">
   {{ csrf_field() }}
   <div id="editor--container" class="hidden">

  

     <div>
       <div class="pull-right"> 
       	  <a href="#" class="btn btn-default btn-flat text-dark" onclick="toggleEditor()">Cancel</a> &nbsp;
       	  <a href="#" class="btn btn-colored btn-theme-colored2 btn-flat text-dark" onclick="Preview.Update()">Preview</a> &nbsp;
          <button type="submit" class="btn btn-colored btn-success btn-flat" >Update</button> &nbsp;
       </div>
     </div>


     <div class="clearfix"></div>

   
   <div id="editor" class="editor--toolbar" style="margin-top: 20px;">
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups"> 
        <div class="btn-group" role="group" aria-label="First group"> 
            <button type="button" title="Add Heading" data-toggle="tooltip" class="btn btn-default text-dark" onclick="addHeader();return false;"><i class="fa fa-header"></i></button>
            <button type="button" title="Add Link" data-toggle="tooltip" class="btn btn-default text-dark" onclick="addLink();return false;"><i class="fa fa-link"></i></button>  
            <button type="button" title="Add List" data-toggle="tooltip" class="btn btn-default text-dark" onclick="addList();return false;"><i class="fa fa-list-ul"></i></button> 
            <button type="button" title="Add Numbered List" data-toggle="tooltip" class="btn btn-default text-dark" onclick="addNList();return false;"><i class="fa fa-list-ol"></i></button> 
            <button type="button" title="Add Table" data-toggle="tooltip" class="btn btn-default text-dark" onclick="addTable();return false;"><i class="fa fa-table"></i></button> 
            <button type="button" title="Add Image" data-toggle="tooltip" class="btn btn-default text-dark" onclick="addImage();return false;"><i class="fa fa-photo"></i></button> 
            <button type="button" title="Upload Image" data-toggle="tooltip" class="btn btn-default text-dark" onclick="uploadImage();return false;"><i class="fa fa-file-image-o"></i></button> 
            <vue-core-image-upload
            class="btn btn-default text-dark"
            :crop="false"
            @imageuploaded="imageuploaded"
            :max-file-size="5242880"
            url="/image/upload" >
          </vue-core-image-upload>
         </div> 
         <div class="btn-group" role="group" aria-label="Second group"> 
            <button type="button" title="Add Example" data-toggle="tooltip" class="btn btn-default text-dark" onclick="addExample();return false;">E.g.</button>
            <button type="button" title="Add Solution" data-toggle="tooltip" class="btn btn-default text-dark" onclick="addSoln();return false;">Soln.</button>
            <button type="button" title="Add Theorem" data-toggle="tooltip" class="btn btn-default text-dark" onclick="addTheorem();return false;">Theorem</button>  
            <button type="button" title="Add Proof" data-toggle="tooltip" class="btn btn-default text-dark" onclick="addProof();return false;">Proof</button> 
         </div> 
         <div class="btn-group" role="group" aria-label="Third group"> 
            <button type="button" title="Add Definition" data-toggle="tooltip" class="btn btn-default text-dark" onclick="addDef();return false;">Df.</button> 
             <button type="button" title="Add Table of Contents" data-toggle="tooltip" class="btn btn-default text-dark" onclick="addToc();return false;"><i class="fa fa-list-alt"></i></button> 
            <button type="button" title="Align to Center" data-toggle="tooltip" class="btn btn-default text-dark" onclick="addCenterAlign();return false;"><i class="fa fa-align-center"></i></button> 
            <button type="button" title="Add Box" data-toggle="tooltip" class="btn btn-default text-dark" onclick="addBox();return false;">Box</button> 
         </div> 
          <div class="btn-group" role="group">
          <button type="button" class="btn btn-default dropdown-toggle text-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Line
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="#" onclick="addLine(1);return false;">
             <svg width="100" height="1">
                <rect width="100" height="1" 
                style="fill:#989898;stroke-width:0" />
              Sorry, your browser does not support inline SVG.
              </svg>
              </a>
             </li>
             <li><a href="#" onclick="addLine(2);return false;"><svg width="100" height="2">
                <rect width="100" height="2" 
                style="fill:#989898;stroke-width:0" />
              Sorry, your browser does not support inline SVG.
              </svg></a></li>
              <li><a href="#" onclick="addLine(3);return false;"><svg width="100" height="3">
                <rect width="100" height="3" 
                style="fill:#989898;stroke-width:0" />
              Sorry, your browser does not support inline SVG.
              </svg></a></li>
          </ul>
        </div>
      </div>
	    <textarea id="marked-mathjax-input" class="" style="height: 1700px;" name="question" class="form-control">{{ $discussion->question }}
	    </textarea>

    </div>

    </div>






  <div id="main--output" class="markdown-body hidden">
  <div class="preview text-dark" style="font-size: 20px;" id="marked-mathjax-preview"></div>
  <div class="preview text-dark" style="font-size: 20px;" id="marked-mathjax-preview-buffer" 
       style="display:none;
              position:absolute; 
              top:0; left: 0"></div>
</div>


</form>

       	




	<div class="page-header pt-3">
		<h5 class="font-bold">Comments</h45>
	</div>




	@foreach($discussion->comments as $comment)
       
       <div class="panel panel-default">
		  
		  <div class="panel-body">
        <h3 class="panel-title text-dark font-medium" >{{ $comment->user->name }} | {{ $comment->created_at->diffForHumans() }}</h3>
     
		    
		      <div class="m-t-10 m-b-10" style="font-size: 16px;color: #000" id="comment-{{$comment->id}}"> {!! $comment->body !!} </div> 
		      

		      
		    

          <a class="text-danger" href="/solutions/{{$comment->id}}/like"><i class="fa fa-thumbs-up"></i> {{ $comment->likes }}</a> |  <a class="text-dark" href="/solutions/{{$comment->id}}/dislike"><i class="fa fa-thumbs-down"></i> {{ $comment->dislikes }}</a> 
		  </div>
		   
		</div>


	@endforeach




	    
	  <form method="POST" action="/solutions/{{ $discussion->id }}">
	    {{ csrf_field() }}
	   
    	<small>Note : Put latex commands inside \$ \$ </small>
	    <textarea id="comment-input" name="comment" rows="2" style="max-height: 140px !important;" class="form-control"></textarea>
	    
   		
       

    	<button class="btn btn-success" type="submit">Post Comment</button>	

    	<br><br>

       </form>
	   

	</div>

</section>
@endsection


@section('js')
  
  <script>
Preview.Init();
Preview.Update();
</script>

 <script type="text/javascript" src="/js/functions.js"></script>

 <script>
var simplemde = new SimpleMDE({ element: document.getElementById("comment-input") });
</script>


<script type="text/javascript">
	@foreach($discussion->comments as $comment)
	$('#comment-{{$comment->id}}').html(md.render($('#comment-{{$comment->id}}').html()));
	@endforeach
</script>

 <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>

@endsection