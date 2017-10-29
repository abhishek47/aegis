<div  @include('crud::inc.field_wrapper_attributes') >

 <label>{!! $field['label'] !!}</label>

 <div style="height:0px;overflow:hidden">
     <form id="file-upload" method="POST" action="/image/upload" enctype="multipart/form-data">
       <input type="file" id="fileInput" name="files" />
     </form>
 </div>


<div id="editor" class="editor--toolbar">
      <div class="editor--buttons"> 
            <a title="Add Heading" data-toggle="tooltip" data-placement="bottom"  onclick="addHeader();return false;"><i class="fa fa-header"></i></a>
            <a title="Add Link" data-toggle="tooltip" data-placement="bottom"  onclick="addLink();return false;"><i class="fa fa-link"></i></a>  
            <a title="Add List" data-toggle="tooltip" data-placement="bottom"  onclick="addList();return false;"><i class="fa fa-list-ul"></i></a>
            <a title="Add Numbered List" data-toggle="tooltip" data-placement="bottom"  onclick="addNList();return false;"><i class="fa fa-list-ol"></i></button> 
            <a title="Add Table" data-toggle="tooltip" data-placement="bottom"  onclick="addTable();return false;"><i class="fa fa-table"></i></a> 
            <i class="separator">|</i>
            <a title="Add Image from URL" data-toggle="tooltip" data-placement="bottom"  onclick="addImage();return false;"><i class="fa fa-photo"></i></a> 

            <a title="Upload Image from Computer" data-toggle="tooltip" data-placement="bottom"  onclick="chooseFile();"><i class="fa fa-file"></i></a>
            <i class="separator">|</i>
            <a title="Add Example" data-toggle="tooltip" data-placement="bottom"   onclick="addExample();return false;">E.g.</a>
            <a title="Add Solution" data-toggle="tooltip" data-placement="bottom"  onclick="addSoln();return false;">Sn.</a>
            <i class="separator">|</i>
            <a title="Add Theorem" data-toggle="tooltip" data-placement="bottom"   onclick="addTheorem();return false;">Th.</a>  
            <a title="Add Proof" data-toggle="tooltip" data-placement="bottom"  onclick="addProof();return false;">Pr.</a>
            <i class="separator">|</i>
           <span title="Add Problems Section" data-toggle="tooltip" data-placement="bottom" > <a   data-toggle="modal" data-target="#myModal" ><i class="fa fa-question-circle"></i></a></span> 
            <a type="button" title="Add Definition" data-toggle="tooltip" data-placement="bottom"   onclick="addDef();return false;">Df.</a> 
             
             <i class="separator">|</i>
            <a title="Align to Center" data-toggle="tooltip" data-placement="bottom"  onclick="addCenterAlign();return false;"><i class="fa fa-align-center"></i></a> 
            <a title="Add Box" data-toggle="tooltip" data-placement="bottom"  onclick="addBox();return false;">Box</a> 
<i class="separator">|</i> 
            <a title="Preview" data-toggle="tooltip" data-placement="bottom"  onclick="Preview.Update();" ><i class="fa fa-eye"></i></a>
            <a title="Fullscreen" id="btn-fullscreen1" data-placement="bottom"  data-toggle="tooltip" onclick="toggleFullscreen();return false;" ><i class="fa fa-arrows-alt"></i></a> 
          
        <!--  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
          -->
       
      </div>
      <div id="editor--area" class="hidden">
      <textarea id="marked-mathjax-input" name="{{ $field['name'] }}" @include('crud::inc.field_attributes')  class="form-control hidden">{{ old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' )) }} 
      
      
      </textarea>
      </div>
       </div>

       <div id="main--output" class="editor-preview markdown-body">
  <div class="preview" id="marked-mathjax-preview"></div>
  <div class="preview" id="marked-mathjax-preview-buffer" 
       style="display:none;
              position:absolute; 
              top:0; left: 0"></div>

   


<?php $quizzes = \App\Quiz::latest()->get(); ?>

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


    





</div>



@if ($crud->checkIfFieldIsFirstOfItsType($field, $fields))
  {{-- FIELD EXTRA CSS  --}}
  {{-- push things in the after_styles section --}}

      @push('crud_fields_styles')

<link rel="stylesheet" type="text/css" href="/css/markdown.css">
<link rel="stylesheet" type="text/css" href="/css/editor.css">
 

<script type="text/x-mathjax-config">
  MathJax.Hub.Config({
    showProcessingMessages: false,
    tex2jax: { inlineMath: [['$','$'],['\\(','\\)']] },
    TeX: { equationNumbers: {autoNumber: "AMS"} }
  });
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
<script type="text/javascript" src="/js/marked.js"></script>
<script type="text/javascript" src="/js/aegismarked.js"></script>

<script>
marked.setOptions({
  renderer: new marked.Renderer(),
  gfm: true,
  tables: true,
  breaks: false,
  pedantic: false,
  sanitize: false, // IMPORTANT, because we do MathJax before markdown,
                   //            however we do escaping in 'CreatePreview'.
  smartLists: true,
  smartypants: false
});
</script>

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
    //this.editorContainer = document.getElementById("editor--container");
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
    



     $('#editor--area').toggleClass('hidden');
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
          <!-- no styles -->
          <style type="text/css">

          

           body {
              min-width: 100%;
              word-wrap: normal;
          }

            .editor--buttons {
                  position: relative;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    -o-user-select: none;
                    user-select: none;
                    padding: 0 10px;
                    border-top: 1px solid #bbb;
                    border-left: 1px solid #bbb;
                    border-right: 1px solid #bbb;
                    border-top-left-radius: 4px;
                    border-top-right-radius: 4px;
            }

            #editor.editor--toolbar.fullscreen {
                  background: #fff;
              position: fixed!important;
              top: 0px;
              left: 0;
              right: 0;
              bottom: 0;
              height: auto;
              z-index: 9999;
            }
             #editor.editor--buttons.fullscreen {
                          
                  width: 100%;
                  height: 50px;
                  overflow-x: auto;
                  overflow-y: hidden;
                  white-space: nowrap;
                  padding-top: 10px;
                  padding-bottom: 10px;
                  box-sizing: border-box;
                  background: #fff;
                  border: 0;
                  position: fixed;
                  top: 0;
                  left: 0;
                  opacity: 1;
                  z-index: 9999;
              }

            .editor--buttons a {
              display: inline-block;
              text-align: center;
              text-decoration: none!important;
              color: #2c3e50!important;
              width: 30px;
              height: 30px;
              padding: 5px;
              margin: 0;
              border: 1px solid transparent;
              border-radius: 3px;
              cursor: pointer;
              margin-top: 6px;
              margin-bottom: 6px;
            }

            .editor--buttons a:hover {
              color: #2c3e50!important;
              border: 1px solid #ccc; 
            }

            .editor--buttons i.separator {
                  display: inline-block;
                  width: 0;
                  border-left: 1px solid #bbb;
                  border-right: 1px solid #fff;
                  color: transparent;
                  text-indent: -10px;
                  margin: 0 6px;
              }

            .editor--toolbar textarea {
                  height: auto;
                  min-height: 500px;
                  border: 1px solid #bbb;
                  border-bottom-left-radius: 4px;
                  border-bottom-right-radius: 4px;
                  padding: 10px;
                  font: inherit;
                  z-index: 1;
            }

            .editor--toolbar textarea:focus{
              border: 1px solid #bbb;
            }

             .editor--toolbar.fullscreen textarea
             {
                 height: auto;
                 min-height: 1000px;
             }

            #btn-fullscreen1.active{
               color: #2c3e50!important;
              border: 1px solid #ccc; 
            }

            .editor-preview {
              overflow: scroll!important;
                  background: #fafafa;
                  padding: 5px;
                  border: 1px solid #bbb;
                  height: 500px;
                  width: 100%;
                  margin-bottom: 7px;
              }
              .editor-preview.fullscreen {
                position: fixed!important;
              top: 50px;
              left: 0;
              right: 0;
              bottom: 0;
              height: auto;
              z-index: 19999;
              }

          </style>
      @endpush


  {{-- FIELD EXTRA JS --}}
  {{-- push things in the after_scripts section --}}

      @push('crud_fields_scripts')
      <script src="{{ asset('js/app.js') }}"></script> 
         <script type="text/javascript" src="/js/functions.js"></script>

         <script>
           function chooseFile() {
              $("#fileInput").click();
           }
        </script>

        <script type="text/javascript">
          $(function() {
             $("#fileInput").change(function (){

                  console.log("FORM IS SUBMITTING");

                    var formData = new FormData();

                    formData.append('files', $('input[type=file]#fileInput')[0].files[0]);

                     console.log(formData); 

                    $.ajax({
                        url:'/image/upload',
                        data: formData,
                        async:false,
                        type:'post',
                        processData: false,
                        contentType: false,
                        success:function(res){
                          insertAtCaret('![alt text]('+ res.src + ' "Image Title")');
                        },
                      });
                   });

                
          });

         
        </script>

        <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip(); 
        });
        </script>

         <script>
          Preview.Init();
          Preview.Update();
          </script>



      @endpush
@endif