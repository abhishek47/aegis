<div  @include('crud::inc.field_wrapper_attributes') >
 <label>{!! $field['label'] !!}</label>

 <div style="height:0px;overflow:hidden">
     <form id="file-upload" method="POST" action="/image/upload" enctype="multipart/form-data">
       <input type="file" id="fileInput" name="files" />
     </form>
 </div>


<div id="editor" class="editor--toolbar">
      <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups"> 
        <div class="btn-group" role="group" aria-label="First group"> 
            <button type="button" title="Add Heading" data-toggle="tooltip" class="btn btn-default" onclick="addHeader();return false;"><i class="fa fa-header"></i></button>
            <button type="button" title="Add Link" data-toggle="tooltip" class="btn btn-default" onclick="addLink();return false;"><i class="fa fa-link"></i></button>  
            <button type="button" title="Add List" data-toggle="tooltip" class="btn btn-default" onclick="addList();return false;"><i class="fa fa-list-ul"></i></button>
            <button type="button" title="Add Numbered List" data-toggle="tooltip" class="btn btn-default" onclick="addNList();return false;"><i class="fa fa-list-ol"></i></button> 
            <button type="button" title="Add Table" data-toggle="tooltip" class="btn btn-default" onclick="addTable();return false;"><i class="fa fa-table"></i></button> 
            <button type="button" title="Add Image" data-toggle="tooltip" class="btn btn-default" onclick="addImage();return false;"><i class="fa fa-photo"></i></button> 

            <button type="button" title="Upload Image" data-toggle="tooltip" class="btn btn-default" onclick="chooseFile();">Upload Image</button>
            <button type="button" title="Add Example" data-toggle="tooltip" class="btn btn-default" onclick="addExample();return false;">E.g.</button>
            <button type="button" title="Add Solution" data-toggle="tooltip" class="btn btn-default" onclick="addSoln();return false;">Soln.</button>
            <button type="button" title="Add Theorem" data-toggle="tooltip" class="btn btn-default" onclick="addTheorem();return false;">Theorem</button>  
            <button type="button" title="Add Proof" data-toggle="tooltip" class="btn btn-default" onclick="addProof();return false;">Proof</button>
            <button type="button" title="Add Definition" data-toggle="tooltip" class="btn btn-default" onclick="addDef();return false;">Df.</button> 
             
             
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
      <textarea id="marked-mathjax-input"  name="{{ $field['name'] }}" @include('crud::inc.field_attributes') rows="17" class="form-control">{{ old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' )) }} 
      
      
      </textarea>

    </div>




    





</div>



@if ($crud->checkIfFieldIsFirstOfItsType($field, $fields))
  {{-- FIELD EXTRA CSS  --}}
  {{-- push things in the after_styles section --}}

      @push('crud_fields_styles')
          <!-- no styles -->
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
      @endpush
@endif