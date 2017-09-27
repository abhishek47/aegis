@extends('layouts.app')

@section('css')



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
      ["PreviewDone",this],
      ["resetEquationNumbers", MathJax.InputJax.TeX]
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

    $('#editor--container').toggleClass('hidden');
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
<div class="page-header">
  <h2>{{ $wiki->title }}</h2>

	<a href="#" id="edit" onclick="toggleEditor()">Edit this wiki</a> 

</div>  
   <form method="POST" action="/wiki/update/{{ $wiki->id }}">
   {{ csrf_field() }}
   <div id="editor--container" class="">


     <div>
       <div class="pull-right"> 
       	  <a href="#" class="btn btn-default" onclick="toggleEditor()">Cancel</a> &nbsp;
       	  <a href="#" class="btn btn-primary" onclick="Preview.Update()">Preview</a> &nbsp;
          <button type="submit" class="btn btn-success" >Update</button> &nbsp;
       </div>
     </div>


     <div class="clearfix"></div>

   
   <div id="editor" class="editor--toolbar" style="margin-top: 20px;">
     <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups"> 
        <div class="btn-group" role="group" aria-label="First group"> 
            <button type="button" class="btn btn-default" onclick="addHeader();return false;"><i class="fa fa-header"></i></button>
            <button type="button" class="btn btn-default" onclick="addLink();return false;"><i class="fa fa-link"></i></button>  
            <button type="button" class="btn btn-default" onclick="addList();return false;"><i class="fa fa-list-ul"></i></button> 
            <button type="button" class="btn btn-default" onclick="addTable();return false;"><i class="fa fa-table"></i></button> 
            <button type="button" class="btn btn-default" onclick="addImage();return false;"><i class="fa fa-photo"></i></button> 
         </div> 
         <div class="btn-group" role="group" aria-label="Second group"> 
            <button type="button" class="btn btn-default" onclick="addExample();return false;">E.g.</button> 
            <button type="button" class="btn btn-default" onclick="addProof();return false;">Th.</button>
            <button type="button" class="btn btn-default" onclick="addQuestion(1);return false;"><i class="fa fa-question-circle"></i></button> 
         </div> 
         <div class="btn-group" role="group" aria-label="Third group"> 
            <button type="button" class="btn btn-default" onclick="addDef();return false;">Df.</button> 
             <button type="button" class="btn btn-default" onclick="addToc();return false;"><i class="fa fa-list-alt"></i></button> 
         </div> 
         <div class="btn-group" role="group" aria-label="Fourth group"> 
            <button type="button" class="btn btn-default" onclick="addCenterAlign();return false;"><i class="fa fa-align-center"></i></button> 
         </div> 
      </div>
	    <textarea id="marked-mathjax-input" name="comment" class="form-control">{{ $wiki->body }}
	    </textarea>

    </div>

    </div>






  <div id="main--output" class="markdown-body hidden">
  <div class="preview" id="marked-mathjax-preview"></div>
  <div class="preview" id="marked-mathjax-preview-buffer" 
       style="display:none;
              position:absolute; 
              top:0; left: 0"></div>
</div>


</form>


  </div>         	



@endsection

@section('js')
  
  <script>
Preview.Init();
Preview.Update();
</script>

 <script type="text/javascript" src="/js/functions.js"></script>


@endsection

