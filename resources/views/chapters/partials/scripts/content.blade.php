
	
	<script type="text/javascript">
		 // Get a reference to the database service

     
		 (function() {
  var SimpleChat, myChatApp;

  SimpleChat = (function() {
    var fireBase;

    fireBase = new firebase.database().ref('/messages/chapter-{{ $chapter->id }}');

    function SimpleChat() {
      fireBase.on("child_added", (function(_this) {
        return function(snapshot) {
         
          var message;
          message = snapshot.val();
          var key = snapshot.key;
          if(message.text != '~end~' && message.text != '~togglemembers-0~' && message.text != '~togglemembers-1~')
          {
          	
             
              return _this.messagesView(key, message.name, message.text, message.user_id, message.is_admin, message.created_at);
          }
     

         
        };
      })(this));

       fireBase.on("child_removed", (function(_this) {
        return function(snapshot) {
         
              var key = snapshot.key;
              
               $('#' + key).remove();

          
        };
      })(this));

      

     
    }

    SimpleChat.prototype.messagesView = function(mid, name, text, usedId, isAdmin, createdAt) {
     
      var listItem, nameItem, textItem;
      listItem = jQuery("<li/>", {
        "id": mid,
      	"class": "panel w-100  message-panel",
        "tabindex": 1,

      });
      
      text = text.replace(/^&gt;/mg, '>');
      text = md.render(text);
      text = text.replace('>', '&gt;');
      text = text.replace('<', '&lt;');
      text = aegismarked(text);

      if(!isAdmin)
      {
        nameItem = jQuery("<div/>", {
         "class": "panel-heading name",
        html: '<span class="username">' + name + '</span> <small>' +  moment(createdAt).format("M-D-YYYY h:mm:ss a")  + '</small>',
        "data-id": mid
        });
      }
      else {
        nameItem = jQuery("<div/>", {
        "class": "panel-heading name is-admin",
        html: '<span class="username">' + name + '</span> <small>' +  moment(createdAt).format("M-D-YYYY h:mm:ss a")  + '</small>',
        "data-id": mid
        });
     }
      textItem = jQuery("<p/>", {
        "class": "panel-body text markdown-body",
        html: text,
        "white-space" : "pre",
        "data-latex": text
      });
      listItem.appendTo("#transcriptMessages");
      nameItem.appendTo(listItem);
      textItem.appendTo(listItem);

      MathJax.Hub.Queue(
              ["Typeset",MathJax.Hub,document.getElementById('transcriptMessages')],
              function() {
                
                   
                 
              }
            );

      return listItem;
    };

    



    return SimpleChat;

  })();

  myChatApp = new SimpleChat;

}).call(this);

                       
</script>


 @foreach($chapter->homeworks as $homework)

    <div id="buffer-{{ $homework->id }}" class="hidden"></div>
    <div id="solution-buffer-{{ $homework->id }}" class="hidden"></div>

     <script type="text/javascript">
    var text =  $('#homework-question-{{ $homework->id  }}').text();
    console.log(text);
     text = text.replace(/^&gt;/mg, '>');
    var text = md.render(text);
      $('#homework-question-{{ $homework->id  }}').html(aegismarked(text));
    </script>

    <script type="text/javascript">
    var text =  $('#homework-solution-{{ $homework->id  }}').text();
    console.log(text);
     text = text.replace(/^&gt;/mg, '>');
    var text = md.render(text);
      $('#homework-solution-{{ $homework->id  }}').html(aegismarked(text));
    </script>



  @endforeach


   @foreach($chapter->extraproblems as $homework)

    <div id="ex-buffer-{{ $homework->id }}" class="hidden"></div>
    <div id="ex-solution-buffer-{{ $homework->id }}" class="hidden"></div>

     <script type="text/javascript">
    var text =  $('#ex-homework-question-{{ $homework->id  }}').text();
    console.log(text);
     text = text.replace(/^&gt;/mg, '>');
    var text = md.render(text);
      $('#ex-homework-question-{{ $homework->id  }}').html(aegismarked(text));
    </script>

    <script type="text/javascript">
    var text =  $('#ex-homework-solution-{{ $homework->id  }}').text();
    console.log(text);
     text = text.replace(/^&gt;/mg, '>');
    var text = md.render(text);
      $('#ex-homework-solution-{{ $homework->id  }}').html(aegismarked(text));
    </script>



  @endforeach


  <script type="text/javascript">
    function submitAnswer(hid)
    {
      var answer = $('#answer-'+hid).val();

      axios.post('/chapter-homework/'+hid+'/check', {answer: answer})
        .then(function(res){
          console.log(res);
          if(res.data.msg == 'correct')
          {
             $('#answer-response-'+hid).html('Your answer is Correct!'); 
             attempts = 3 - res.data.attempts;
             $('#solution-'+hid).html('<b>Problem Solved in ' +  attempts + ' attempts! Your answer : ' + answer + '');
          } else if(res.data.msg == 'incorrect')
          {
            $('#answer-response-'+hid).html('Your answer is Incorrect!You have ' + res.data.attempts + ' attempts left!'); 
          }
        });
    }

    function submitExtraProblemAnswer(hid)
    {
      var answer = $('#ex-answer-'+hid).val();

      axios.post('/chapter-extra-problems/'+hid+'/check', {answer: answer})
        .then(function(res){
          console.log(res);
          if(res.data.msg == 'correct')
          {
             $('#ex-answer-response-'+hid).html('Your answer is Correct!'); 
             attempts = 3 - res.data.attempts;
             $('#ex-solution-'+hid).html('<b>Problem Solved in ' +  attempts + ' attempts! Your answer : ' + answer + '');
          } else if(res.data.msg == 'incorrect')
          {
            $('#ex-answer-response-'+hid).html('Your answer is Incorrect!'); 
          }
        });
    }
  </script>


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




	