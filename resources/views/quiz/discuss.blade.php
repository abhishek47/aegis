@extends('layouts.master')

@section('css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

<link rel="stylesheet" type="text/css" href="/css/markdown.css">
<link rel="stylesheet" type="text/css" href="/css/editor.css">



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

	     <div class="editor--container hidden">
	       <textarea id="marked-mathjax-input"  name="comment" class="form-control">{{ $question->solution }}
	    </textarea>	
	    </div>
		  <div id="main--output" style="width: 100%;" class="markdown-body hidden">
		  <div class="preview" id="marked-mathjax-preview"></div>
		  <div class="preview" id="marked-mathjax-preview-buffer" 
		       style="display:none;
		              position:absolute; 
		              top:0; left: 0"></div>
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

  <script>
Preview.Init();
Preview.Update();
</script>


  <script type="text/javascript" src="/js/functions.js"></script>



@endsection