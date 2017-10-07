<div id="app" @include('crud::inc.field_wrapper_attributes') >
 <label>{!! $field['label'] !!}</label>

<div id="editor" class="editor--toolbar">
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
            url="/image/upload">
          </vue-core-image-upload>
            <button type="button" title="Add Example" data-toggle="tooltip" class="btn btn-default" onclick="addExample();return false;">E.g.</button>
            <button type="button" title="Add Solution" data-toggle="tooltip" class="btn btn-default" onclick="addSoln();return false;">Soln.</button>
            <button type="button" title="Add Theorem" data-toggle="tooltip" class="btn btn-default" onclick="addTheorem();return false;">Theorem</button>  
            <button type="button" title="Add Proof" data-toggle="tooltip" class="btn btn-default" onclick="addProof();return false;">Proof</button>
            <button type="button" title="Add Problems Section" class="btn btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-question-circle"></i></button> 
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
	    <textarea id="marked-mathjax-input"  name="{{ $field['name'] }}" @include('crud::inc.field_attributes') rows="17" class="form-control">{{ old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' )) }} 
      
	    
	    </textarea>

    </div>


 <?php $quizzes = \App\Quiz::orderBy('name', 'asc')->get(); ?>


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
          <!-- no styles -->
      @endpush


  {{-- FIELD EXTRA JS --}}
  {{-- push things in the after_scripts section --}}

      @push('crud_fields_scripts')
      <script src="{{ asset('js/app.js') }}"></script> 
         <script type="text/javascript" src="/js/functions.js"></script>
      @endpush
@endif