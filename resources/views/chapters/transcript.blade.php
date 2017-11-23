<div id="transcript" class="{{ $chapter->status == 0 ? 'hidden' : '' }}" style="">



<div id="newMessage"  style="width: 100%;" class="{{ $chapter->status == 1 && auth()->user()->hasRole('administrator') ? '' : 'hidden' }}">
 
  <div id="editor2" class="editor--toolbar" style="width: 100%">
    <div class="editor--buttons">
      <a title="Add Heading" data-toggle="tooltip" data-placement="bottom"   onclick="addHeader2();return false;"><i class="fa fa-header"></i></a>
      <a title="Add Link" data-toggle="tooltip" data-placement="bottom"    onclick="addLink2();return false;"><i class="fa fa-link"></i></a>
      <a title="Add List" data-toggle="tooltip" data-placement="bottom"    onclick="addList2();return false;"><i class="fa fa-list-ul"></i></a>
      <a title="Add Numbered List" data-toggle="tooltip" data-placement="bottom"   onclick="addNList2();return false;"><i class="fa fa-list-ol"></i></a>
        <a title="Add Table" data-toggle="tooltip" data-placement="bottom"   onclick="addTable2();return false;"><i class="fa fa-table"></i></a>
        <i class="separator">|</i>
        <a title="Add Image from URL" data-toggle="tooltip" data-placement="bottom"   onclick="addImage2();return false;"><i class="fa fa-photo"></i></a>
        <a title="Upload Image from Computer" data-toggle="tooltip" data-placement="bottom"   onclick="chooseFile2();"><i class="fa fa-file"></i></a>
        <i class="separator">|</i>
        <a title="Add Example" data-toggle="tooltip" data-placement="bottom"    onclick="addExample2();return false;">E.g.</a>
        <a title="Add Solution" data-toggle="tooltip" data-placement="bottom"   onclick="addSoln2();return false;">Sn.</a>
        <i class="separator">|</i>
        <a title="Add Theorem" data-toggle="tooltip"  data-placement="bottom"   onclick="addTheorem2();return false;">Th.</a>
        <a title="Add Proof" data-toggle="tooltip" data-placement="bottom"   onclick="addProof2();return false;">Pr.</a>
        <i class="separator">|</i>
        <a title="Add Definition" data-toggle="tooltip" data-placement="bottom"    onclick="addDef2();return false;">Df.</a>
        
        <i class="separator">|</i>
        <a title="Align to Center" data-toggle="tooltip" data-placement="bottom"   onclick="addCenterAlign2();return false;"><i class="fa fa-align-center"></i></a>
        <a title="Add Box" data-toggle="tooltip" data-placement="bottom"   onclick="addBox2();return false;">Box</a>
        <i class="separator">|</i>
        <a title="Preview" data-toggle="tooltip" data-placement="bottom"   onclick="Preview2.Update();" ><i class="fa fa-eye"></i></a>
        <a title="Saved Messages" data-toggle="tooltip" data-placement="bottom"   onclick="toggleMessagesView();" ><i class="fa fa-list"></i></a>
        <a title="Fullscreen" id="btn-fullscreen2" data-toggle="tooltip" data-placement="bottom"   onclick="toggleFullscreen2();return false;" ><i class="fa fa-arrows-alt"></i></a>
        @if(auth()->user()->hasRole('administrator'))
      <a title="Toggle Members Visibility" id="toggleMembers" data-toggle="tooltip" data-placement="bottom" ><i class="fa fa-eye"></i></a>

      <a title="Close Session" id="closeSession" data-toggle="tooltip" data-placement="bottom" ><i class="fa fa-close"></i></a>
      @endif
        
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
    <div id="editor--area2" class="hidden">
      <textarea id="marked-mathjax-input2" name="message"  class="form-control">
      
      
      </textarea>
      
    </div>
  </div>
  <div id="main--output2" class="editor-preview markdown-body">
    <div class="preview" id="marked-mathjax-preview2"></div>
    <div class="preview" id="marked-mathjax-preview-buffer2"
      style="display:none;
      position:absolute;
    top:0; left: 0"></div>
  </div>
  <div id="saved-messages" class="{{ auth()->user()->hasRole('administrator') ? 'is-admin' : ''  }}">
      <textarea id="marked-mathjax-input3"  class="form-control latex-editor-textarea" readonly="">{{ isset($chapter->messages) ? $chapter->messages->body : '' }}</textarea>
      
    </div>
  <button id="sendBtn" type="button" class="btn btn-success">Post Message</button>
  <button id="closeSession" type="button" class="btn btn-danger pull-right">Close Session</button>
</div>


<div id="messages" class="messagesHolder {{ auth()->user()->hasRole('administrator') ? 'is-admin' : ''  }}" style="">
<div class="pinnedMessage {{ auth()->user()->hasRole('administrator') ? 'is-admin' : ''  }}" style="width: {{ $chapter->view_members  && !auth()->user()->hasRole('administrator') ? '85%' : '100%' }}">

 <h4 ><span id="pin-name">Abhishek Wani</span> <small style="color: grey;">pinned message</small></h4>

 <p id="pin-message">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  
</div>
<ul id="listMessages"  style="" ></ul>

</div>









 <div style="height:0px;overflow:hidden">
     <form id="file-upload2" method="POST" action="/image/upload" enctype="multipart/form-data">
       <input type="file" id="fileInput2" name="files" />
     </form>
 </div>