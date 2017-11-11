@extends('layouts.master2')

@section('css')



<script>
var inEdit = false;
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

     

     
    

       if(inEdit)
       {

          $('#editor--container').toggleClass('hidden');
       }
    $('#main--output').toggleClass('hidden');

    var width = $(window).width(); 
        var height = $(window).height(); 

       

    var id = 0;
    $('#main--output h2').each(function(){


         if ((width >= 768  ) && (height>=768)) {

            var openingDiv = '<div id="section-'+id+'-body">'
            $(this).nextUntil('h2').wrapAll(openingDiv);


            $(this).attr('id', 'section-'+id);

            $('#section-'+id).append(' <a onclick="editSection(' + id +')" style="font-weight:normal;float:right;color: #616161 !important;margin-right: 10px;font-size: 14px;cursor:pointer;"><i class="fa fa-edit"> Edit this Section</i></a>');
        }
        else {

          var openingDiv = '<div id="section-'+id+'-body" class="collapse">'
          $(this).nextUntil('h2').wrapAll(openingDiv);

          $(this).wrap('<a  class="collapse--header" id="section-' + id + '" href="#section-' + id + '-body" data-toggle="collapse"><a>')
          
         

          $('#section-'+id+' h2').append(' <i style="font-weight:normal;float:right;color: #b3b3b3;font-size: 20px; \
            margin-right: 10px;" class="fa fa-chevron-down"></i>');

            
        }

        
      


         id++;
    });

    $('#main--output h3').each(function(){

        if ((width >= 1024  ) && (height>=768)) {

            var openingDiv = '<div id="section-'+id+'-body">'
            $(this).nextUntil('h3').wrapAll(openingDiv);


            $(this).attr('id', 'section-'+id);

            $('#section-'+id).append(' <a onclick="editSection(' + id +')" style="font-weight:normal;float:right;color: #616161 !important;margin-right: 10px;cursor:pointer;font-size: 14px;"><i class="fa fa-edit"> Edit this Section</i></a>');
        }
        else {

          var openingDiv = '<div id="section-'+id+'-body" class="collapse">'
          $(this).nextUntil('h3').wrapAll(openingDiv);

          $(this).wrap('<a class="collapse--header" id="section-' + id + '" href="#section-' + id + '-body" data-toggle="collapse"><a>')
          
         

          $('#section-'+id+' h3').append(' <i style="font-weight:normal;float:right;color: #b3b3b3;font-size: 20px; \
            margin-right: 10px;" class="fa fa-chevron-down"></i>');

            
        }



         id++;
    });
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
Preview.callback.autoReset = true;  // make sure it can run more than once



</script>


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
        <a class="nav-link" href="/classrooms/{{ $classroom->id }}/chapter/{{ $chapter->id }}/homework">Homework</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/classrooms/{{ $classroom->id }}/chapter/{{ $chapter->id }}/notes">Notes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/classrooms/{{ $classroom->id }}/chapter/{{ $chapter->id }}/discuss">Discuss <span class="sr-only">(current)</span></a>
      </li>
    </ul>
   
  </div>
  </div>
</nav>



<div class="pt-4 container">

	

		<div style="width: 100%;margin-bottom: 20px;">
		<h3 class="font-weight-bold">{{ $chapter->title }} | Notes</h3>
		<hr>
		</div>


   <div id="main--output" style="width: 100%;" class="markdown-body hidden">
  <div class="preview" id="marked-mathjax-preview"></div>
  <div class="preview" id="marked-mathjax-preview-buffer" 
       style="display:none;
              position:absolute; 
              top:0; left: 0"></div>
</div>


    <textarea id="marked-mathjax-input" style="height: 1700px;" name="comment" class="form-control hidden">{{ isset($chapter->notes) ? $chapter->notes->body : '' }}
      </textarea>
	



@endsection


@section('js')
  
  <script>
Preview.Init();
Preview.Update();
</script>

<script type="text/javascript">
  
</script>



 <script type="text/javascript" src="/js/functions.js"></script>

 <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>



@endsection



