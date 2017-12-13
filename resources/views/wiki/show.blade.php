@extends('layouts.master')

@section('title')
  
  {{ $wiki->title }} | Aegis Academy

@endsection


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
      

          $('#slickQuiz-'+qid).slickQuiz({
            json: response.data
           });

            

            MathJax.Hub.Queue(
              ["Typeset",MathJax.Hub,document.getElementById('slickQuiz-'+qid)],
              function() {
                  
                  
              }
            );

        });
    });


           $('img').each( function() {
               var $img = $(this)
               if($img.parent().is('a'))
               {

                  
               } else {
                    href = $img.attr('src');
                    $img.wrap('<a href="' + href + '" class="img-expand" data-featherlight="image"></a>');
               }
            

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
Preview.callback.autoReset = true;  // make sure it can run more than once</script>

@endsection


@section('content')

<div class="container">
<div class="page-header">
  <h2>{{ $wiki->title }}</h2>

  <i class="hidden" id="wid">{{ $wiki->id }}</i>

	<a href="#" id="edit" style="color: #313131;" onclick="toggleEditor()"><i class="fa fa-edit"></i> Edit this wiki</a> 
 
</div>  
   <form method="POST" action="/wiki/update/{{ $wiki->id }}">
   {{ csrf_field() }}
   <div id="editor--container" class="hidden">


     <div>
       <div class="pull-right"> 
       	  <a href="#" class="btn btn-default btn-flat" onclick="toggleEditor()">Cancel</a> &nbsp;
       	  <a href="#" class="btn btn-colored btn-theme-colored2 btn-flat" onclick="inEdit=true;Preview.Update()">Preview</a> &nbsp;
          <button type="submit" class="btn btn-colored btn-success btn-flat" >Update</button> &nbsp;
       </div>
     </div>


     <div class="clearfix"></div>

   
   <div id="editor" class="editor--toolbar" style="margin-top: 20px;">
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups"> 
        <div class="btn-group" role="group" aria-label="First group"> 
            <button type="button" title="Add Heading" data-toggle="tooltip" class="btn btn-default" onclick="addHeader();return false;"><i class="fa fa-header"></i></button>
            <button type="button" title="Add Link" data-toggle="tooltip" class="btn btn-default" onclick="addLink();return false;"><i class="fa fa-link"></i></button>  
            <button type="button" title="Add List" data-toggle="tooltip" class="btn btn-default" onclick="addList();return false;"><i class="fa fa-list-ul"></i></button> 
            <button type="button" title="Add Numbered List" data-toggle="tooltip" class="btn btn-default" onclick="addNList();return false;"><i class="fa fa-list-ol"></i></button> 
            <button type="button" title="Add Table" data-toggle="tooltip" class="btn btn-default" onclick="addTable();return false;"><i class="fa fa-table"></i></button> 
            <button type="button" title="Add Image" data-toggle="tooltip" class="btn btn-default" onclick="addImage();return false;"><i class="fa fa-photo"></i></button> 
            <vue-core-image-upload
            class="btn btn-default"
            :crop="false"
            @imageuploaded="imageuploaded"
            :max-file-size="5242880"
            url="/image/upload" >
          </vue-core-image-upload>
         </div> 
         <div class="btn-group" role="group" aria-label="Second group"> 
            <button type="button" title="Add Example" data-toggle="tooltip" class="btn btn-default" onclick="addExample();return false;">E.g.</button>
            <button type="button" title="Add Solution" data-toggle="tooltip" class="btn btn-default" onclick="addSoln();return false;">Soln.</button>
            <button type="button" title="Add Theorem" data-toggle="tooltip" class="btn btn-default" onclick="addTheorem();return false;">Theorem</button>  
            <button type="button" title="Add Proof" data-toggle="tooltip" class="btn btn-default" onclick="addProof();return false;">Proof</button>
             <button type="button" title="Add Problems Section" class="btn btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-question-circle"></i></button> 
         </div> 
         <div class="btn-group" role="group" aria-label="Third group"> 
            <button type="button" title="Add Definition" data-toggle="tooltip" class="btn btn-default" onclick="addDef();return false;">Df.</button> 
             <button type="button" title="Add Table of Contents" data-toggle="tooltip" class="btn btn-default" onclick="addToc();return false;"><i class="fa fa-list-alt"></i></button> 
            <button type="button" title="Align to Center" data-toggle="tooltip" class="btn btn-default" onclick="addCenterAlign();return false;"><i class="fa fa-align-center"></i></button> 
            <button type="button" title="Add Box" data-toggle="tooltip" class="btn btn-default" onclick="addBox();return false;">Box</button> 
         </div> 
          <div class="btn-group" role="group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
	    <textarea id="marked-mathjax-input" style="height: 1700px;" name="comment" class="form-control">{{ $wiki->body }}
	    </textarea>

    </div>

    </div>






  <div id="main--output" style="width: 100%;" class="markdown-body hidden">
  <div class="preview" id="marked-mathjax-preview"></div>
  <div class="preview" id="marked-mathjax-preview-buffer" 
       style="display:none;
              position:absolute; 
              top:0; left: 0"></div>
</div>


</form>



@if($wiki->liked())
<a id="likeBtn" href="#" style="color: #337ab7;
    font-size: 22px;"><i class="fa fa-thumbs-up"></i> {{ count($wiki->likes) }} Likes</a>
@else
<a id="likeBtn" href="#" style="color: #337ab7;
    font-size: 22px;"><i class="fa fa-thumbs-o-up"></i> {{ count($wiki->likes) }} Likes</a>
@endif

<br><br>


  </div>         	


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Choose Quiz to Add</h4>
      </div>
      <div class="modal-body">
        <div class="list-group">
         @foreach($quizzes as $quiz)
          <a href="#" onclick="addQuestion({{ $quiz->id }});" data-dismiss="modal" class="list-group-item" style="padding: 15px;font-size: 17px;">{{ $quiz->name }}</a>
         @endforeach 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

          



@endsection

@section('js')
  
  <script>
Preview.Init();
Preview.Update();
</script>

<script type="text/javascript">
  $('#likeBtn').click(function(e)
  {
      e.preventDefault();

      $.get('/wiki/{{$wiki->id}}/like', function(data, status){
       

         if(data.msg == 'liked')
         {
            $('#likeBtn').html('<i class="fa fa-thumbs-up"></i> ' + data.likes + ' Likes');
         } else {
            $('#likeBtn').html('<i class="fa fa-thumbs-o-up"></i> ' + data.likes + ' Likes');
         }

      });
  });
</script>



 <script type="text/javascript" src="/js/functions.js"></script>

 <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>



@endsection

