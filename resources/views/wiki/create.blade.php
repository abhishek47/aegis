@extends('layouts.app')

@section('css')

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
<form method="POST" action="/wiki">
 {{csrf_field()}}
<div class="page-header">
  <div class="form-group">
   <label>Page Title</label>
	 <input class="form-control" type="text" name="title" placeholder="Ex. The \(uvw\) method" required="true">
  </div>

	<a href="#" id="edit" onclick="toggleEditor()">Edit Content</a>

</div>  
   
   <div id="editor--container" class="hidden">

     <div>
       <h3 class="pull-left" style="margin-top: 0;padding-top: 0;font-weight: bold;">Wiki Page Content</h3>
       <div class="pull-right"> 
       	  <a href="#" class="btn btn-default" onclick="toggleEditor()">Cancel</a> &nbsp;
       	  <a href="#" class="btn btn-primary" onclick="Preview.Update()">Preview</a> &nbsp;
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
            <button type="button" class="btn btn-default" onclick="addTheorem();return false;">Theorem</button>  
            <button type="button" class="btn btn-default" onclick="addProof();return false;">Proof</button>
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
	    <textarea id="marked-mathjax-input" name="comment" class="form-control">We have developed a very simple language for adding elements to the wiki page. As per the number of buttons above we have given what the button prints and you click on ***Preview*** to see what that results to.

***NOTE : Don't leave any spaces while writing commands.***

#### For automatically generating table of contents you can click on Button 10 ( The cursor should be at the start of line )

[[toc]]

#### Button 1 : 
# Your Header

#### Button 2:
[Name your link](https://www.link.com)

#### Button 3 :
* Item 1
* Item 2

#### Button 4:
Title | Title | Title
 --- | --- | ---
 *Still* | `renders` | **nicely**
 1 | 2 | 3    

#### Button 5:
![alt text](https://assets.servedby-buysellads.com/p/manage/asset/id/28536 "Image Title")

## Custom Marks

<startexample>
### The Example comes here - Button 6
<endexample> 

<starttheorem>
#### The theorem of anything!
<startproof>
### Similary the theorem/proof here. - Button 8
<endproof>
<endtheorem>  



<startdefinition>
### Definition part - Button 9
<enddefinition>

## Latex Formulas

This plot demonstrates that the error bars on the observed velocities are reasonably small compared to the velocities. Below, the observed velocities are compared to the Newtonian prediction \(v = \sqrt{\frac{GM}{r}}\), where curve A is the Newtonian prediction and curve B is the experimental data:

Even though the radius of a typical star’s orbit around a galactic bulge is vastly larger than the distances in the solar system, Newton’s laws of gravity still apply to the orbits of stars. The magnitude of the Newtonian gravitational force \(F_g\) on a star of mass \(m\) well outside the galactic bulge is given as a function of radius \(r\) from the center of the galaxy by:

\[F_g = G\frac{mM}{r^2}\]

where \(G\approx 6.67 \times 10^{-11} \text{ N}\cdot\text{m}^2/\text{kg}^2\) is Newton’s gravitational constant and \(M\) is the total mass of the galaxy. 

Assuming these stars move in circular orbits around the center,  they are bound by a centripetal force given by:

\[F_c = \frac{mv^2}{r}.\]

Since the gravitational force is the only force keeping the stars in orbit, it is equal to the centripetal force. Equating the two yields a formula for the velocity of these far-away stars as a function of radius \(r\) from the center of the galaxy:

\[v(r) = \sqrt{\frac{GM}{r}}.\]

 ## Questions Section     
      
 <startquestion></endquestion>    
      
	    
	    </textarea>

    </div>

    </div>





  <div id="main--output" class="markdown-body">
  <div class="preview" id="marked-mathjax-preview"></div>
  <div class="preview" id="marked-mathjax-preview-buffer" 
       style="display:none;
              position:absolute; 
              top:0; left: 0"></div>
</div>

<br>
<hr>

<div class="form-group">
  <label>Wiki Category</label>
  <select class="form-control" name="category_id">
     <option value="1">Category 1</option>
     <option value="2">Category 2</option>
     <option value="3">Category 3</option>
  </select>
</div>
<br>
<hr>

<button type="submit" class="btn btn-primary">Post Wiki Page</button>

<br><br><br>
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

