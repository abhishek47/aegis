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

   



    

