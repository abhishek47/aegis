
@extends('layouts.classroom')


@section('css')

	  <script src="https://www.gstatic.com/firebasejs/4.6.0/firebase.js"></script>
	<script>
	  // Initialize Firebase
	  var config = {
	    apiKey: "AIzaSyBtfeW_1rcka4LcDIMPHew7-LMC3ZRxW00",
	    authDomain: "aegisvc-ed73f.firebaseapp.com",
	    databaseURL: "https://aegisvc-ed73f.firebaseio.com",
	    projectId: "aegisvc-ed73f",
	    storageBucket: "aegisvc-ed73f.appspot.com",
	    messagingSenderId: "841108811787"
	  };
	  firebase.initializeApp(config);

	</script>

	<link rel="stylesheet" type="text/css" href="/css/classroom.css">

	<script src="/js/classroom.js"></script>

  <style type="text/css">
    .editor--toolbar.fullscreen {
      width: 50% !important;
    }
     #saved-messages.fullscreen {

      width: 50% !important;
    }
    .editor-preview.fullscreen {
      width: 50% !important;
    }
  </style>
@endsection


@section('content')


<div class="chat-left {{ $chapter->view_members && !auth()->user()->hasRole('administrator') ? '' : 'hidden' }}" >

  <div class="users-heading">
   <h3>Users Enrolled</h3>

 
  </div>
  
  <ul id="members">
    
  </ul> 

  


</div>


  

<div class="chat-right" style="width: {{ $chapter->view_members  && !auth()->user()->hasRole('administrator') ? '80%' : '100%' }}">

  <section class="chat-heading">

    <h2>{{ $chapter->title }} <span><i class="fa fa-circle"></i> Session Live</span></h2>

    
    <a href="/classrooms/{{ $chapter->classroom->id }}" class="icon-close"><i class="fa fa-close"></i></a>

    
  </section>
 




<div class="pt-4" id="class-messages" style="overflow: auto;background: #fafafa;">

	<div class="row" style="">

		

		@if($chapter->status == 0)

			@include('chapters.status')

		@else		
			
			@if($chapter->status == 2)
				<div class="alert alert-info" style="width: 100%;padding-left: 25px;">
				
						<b>This chapter session is closed and the transcript is available for reference</b>
				
				</div>
			@endif

		
     @endif

      @include('chapters.transcript')
		
	</div>

</div>

@if(!auth()->user()->hasRole('administrator'))
<div class="panel-footer fixed-bottom">
    <form id="userMessageForm">
        <textarea id="user-message" name="message" class="form-control input-sm " rows="3" style="font-size: 17px;" placeholder="Your Message here..." ></textarea>
       
      </form>
</div>
  
@endif

</div>
</div>




@endsection


@section('js')
  
  
 

	
	<script type="text/javascript">
		 // Get a reference to the database service


      function deleteMessage(el)
      {
           var key = $(el).parent().data('id');

          

           var fireBase;

          fireBase = new firebase.database().ref('/messages/chapter-{{ $chapter->id }}');

           fireBase.child(key).remove().then(function() {
                 $('#' + key).remove();
            });
      }

       function quoteMessage(el)
      {
           var key = $(el).parent().data('id');

           @if(auth()->user()->hasRole('administrator'))

               var tex =  $('#'+key + ' .text').data('latex');

               $("#marked-mathjax-input2").val("").selectRange(0,0);

               

               insertAtCaret2('<blockquote style="margin-bottom:4px;">' + '<b style="font-size:14px;">' + $('#'+key + ' .username').text() + '</b> : ' + tex + '</blockquote>\n ');

           @else

              var tex =  $('#'+key + ' .text').data('latex');

               $("#user-message").val("").selectRange(0,0);

               $("#user-message").val('<blockquote style="margin-bottom:4px;">' + '<b style="font-size:14px;">' + $('#'+key + ' .username').text() + '</b> : ' + tex + '</blockquote>\n ');

           @endif
      }


     function pasteIntoInput(el, text) {
    el.focus();
    if (typeof el.selectionStart == "number"
            && typeof el.selectionEnd == "number") {
        var val = el.value;
        var selStart = el.selectionStart;
        el.value = val.slice(0, selStart) + text + val.slice(el.selectionEnd);
        el.selectionEnd = el.selectionStart = selStart + text.length;
    } else if (typeof document.selection != "undefined") {
        var textRange = document.selection.createRange();
        textRange.text = text;
        textRange.collapse(false);
        textRange.select();
    }
}

$.fn.selectRange = function(start, end) {
    if(!end) end = start; 
    return this.each(function() {
        if (this.setSelectionRange) {
            this.focus();
            this.setSelectionRange(start, end);
        } else if (this.createTextRange) {
            var range = this.createTextRange();
            range.collapse(true);
            range.moveEnd('character', end);
            range.moveStart('character', start);
            range.select();
        }
    });
};


      var fireBaseMembers;

      fireBaseMembers = new firebase.database().ref('/members/chapter-{{ $chapter->id }}');


       @if($chapter->status == 1)

          fireBaseMembers.push({name: '{{ auth()->user()->name }}', id: '{{auth()->id()}}' });

        @endif

       fireBaseMembers.on("child_added", function(snapshot) {

           var membersList = $('#members');
           var user = snapshot.val();
            var listItem, nameItem;
            listItem = jQuery("<li/>", {
              "class": "member-item",
              
            });

             nameItem = jQuery("<p/>", {
              "class": "",
              text: user.name
            });

             nameItem.appendTo(listItem);

             listItem.appendTo(membersList);



       });
		
		

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
          if(message.text == '~end~')
          {
          	$('#newMessage').addClass('hidden');
          }
      	  else if(message.text == '~togglemembers-0~')
      	  {
             @if(!auth()->user()->hasRole('administrator'))
  	  		   $('.chat-left').addClass('hidden');
             $('.chat-right').css('width', '100%');
             @else
               $('#toggleMembers').removeClass('active');
             @endif
             

      	  }	
           else if(message.text == '~togglemembers-1~')
          {
            @if(!auth()->user()->hasRole('administrator'))
             $('.chat-left').removeClass('hidden');
             $('.chat-right').css('width', '80%');
             @else
              $('#toggleMembers').addClass('active');
             @endif
              
          } 

          else {
             $('#status').addClass('hidden');
             @if(auth()->user()->hasRole('administrator'))
             $('#newMessage').removeClass('hidden');
             @endif
         $('#transcript').removeClass('hidden');  
         $('#chapterTabs').removeClass('hidden');
           var element = document.getElementById("listMessages");
    element.scrollTop = element.scrollHeight;
              var key = snapshot.key;
             return _this.messagesView(key, message.name, message.text, message.user_id, message.is_admin);
             

          }
        };
      })(this));

       fireBase.on("child_removed", (function(_this) {
        return function(snapshot) {
         
              var key = snapshot.key;
              
               $('#' + key).remove();

          
        };
      })(this));

      $("#newMessage #sendBtn").click((function(_this) {
        return function(e) {
          var name, text;
          
            name = "{{ auth()->user()->name }}";
            text = $("#newMessage textarea[name='message']").val();
            $("#newMessage textarea[name='message']").val("");
            return _this.newMessage(name, text);
         
        };
      })(this));
      $("#startSession").click((function(_this) {
        return function(e) {
          var name, text;
          	axios.post('/chapter/{{ $chapter->id }}/start').then(function() {
          		$('#status').addClass('hidden');
          		$('#newMessage').removeClass('hidden');
          		$('#transcript').removeClass('hidden');
          		$('#chapterTabs').removeClass('hidden');
          		name = "{{ auth()->user()->name }}";
	            text = "The session has started!";
	            return _this.newMessage(name, text);
          	});
           
         
        };
      })(this));
      $("#closeSession").click((function(_this) {
        return function(e) {
          var name, text;
          	axios.post('/chapter/{{ $chapter->id }}/close').then(function() {
          		$('#newMessage').addClass('hidden');
          		name = "{{ auth()->user()->name }}";
	            text = "~end~";
	            return _this.newMessage(name, text);
          	});
           
         
        };
      })(this));

       $("#toggleMembers").click((function(_this) {
        return function(e) {
          var name, text;
            axios.post('/chapter/{{ $chapter->id }}/members/toggle').then(function(res) {
              console.log(res);
              name = "{{ auth()->user()->name }}";
              text = "~togglemembers-" + res.data.data + "~";
              return _this.newMessage(name, text);
            });
           
         
        };
      })(this));
      

      $("#userMessageForm #user-message").keypress((function(_this) {
        return function(e) {
           if (event.keyCode == 13 || event.which == 13) {

          
                if(event.shiftKey){
                    pasteIntoInput(this, '');
                } else {
                     var name, text;
            
                      name = "{{ auth()->user()->name }}";
                      text = $("#userMessageForm textarea[name='message']").val();
                      $("#userMessageForm textarea[name='message']").val("").selectRange(0,0);
                      event.preventDefault();
                      return _this.newMessage(name, text);
                }
    
             
           }
        };
      })(this));

      $("#marked-mathjax-input2").keypress((function(_this) {
        return function(e) {
           if (event.keyCode == 13 || event.which == 13) {

          
                if(event.shiftKey){
                    pasteIntoInput(this, '');
                } else {
                     var name, text;
            
                      name = "{{ auth()->user()->name }}";
                      text = $("#marked-mathjax-input2").val();
                      $("#marked-mathjax-input2").val("").selectRange(0,0);
                      event.preventDefault();
                      return _this.newMessage(name, text);
                }
    
             
           }
        };
      })(this));
    }

    SimpleChat.prototype.messagesView = function(mid, name, text, usedId, isAdmin) {
     
      var listItem, nameItem, textItem;
      listItem = jQuery("<li/>", {
        "id": mid,
      	"class": "panel w-100  message-panel",
        "tabindex": 1,

      });
      
      text = md.render(text);
      text = text.replace('>', '&gt;');
      text = text.replace('<', '&lt;');
      text = aegismarked(text);

      if(!isAdmin)
      {
        nameItem = jQuery("<div/>", {
         "class": "panel-heading name",
         @if(auth()->user()->hasRole('administrator'))
        html: '<span class="username">' + name + '</span>' + ' <a onclick="quoteMessage(this)" style="margin-left:10px;cursor:pointer;"><i class="fa fa-comment"></i> quote</a>  <a onclick="deleteMessage(this)" style="margin-left:10px;color:red;cursor:pointer;"><i class="fa fa-trash"></i> delete</a>',
        @else
         html:  '<span class="username">' + name + '</span>' + ' <a onclick="quoteMessage(this)" style="margin-left:10px;cursor:pointer;"><i class="fa fa-comment"></i> quote</a>',

        @endif
        "data-id": mid
        });
      }
      else {
        nameItem = jQuery("<div/>", {
        "class": "panel-heading name is-admin",
        @if(auth()->user()->hasRole('administrator'))
         html: '<span class="username">' + name + '</span>' + ' <a onclick="quoteMessage(this)" style="margin-left:10px;cursor:pointer;"><i class="fa fa-comment"></i> quote</a>  <a onclick="deleteMessage(this)" style="margin-left:10px;color:red;cursor:pointer;"><i class="fa fa-trash"></i> delete</a>',
        @else
         html:  '<span class="username">' + name + '</span>' + ' <a onclick="quoteMessage(this)" style="margin-left:10px;cursor:pointer;"><i class="fa fa-comment"></i> quote</a>',

        @endif
        "data-id": mid
        });
     }
      textItem = jQuery("<p/>", {
        "class": "panel-body text markdown-body",
        html: text,
        "white-space" : "pre",
        "data-latex": text
      });
      listItem.appendTo("#messages #listMessages");
      nameItem.appendTo(listItem);
      textItem.appendTo(listItem);

      MathJax.Hub.Queue(
              ["Typeset",MathJax.Hub,document.getElementById('listMessages')],
              function() {
                
                   
                 
              }
            );

      return listItem;
    };

    SimpleChat.prototype.newMessage = function(name, text) {
      return fireBase.push({
        name: name,
        text: text,
        user_id:  {{ auth()->user()->id }},
        is_admin: {{  auth()->user()->hasRole('administrator') ? 1 : 0 }},
        chapter_id: {{ $chapter->id }},
        created_at: Date.now()
      });
    };



    return SimpleChat;

  })();

  myChatApp = new SimpleChat;

}).call(this);






	</script>

         <script type="text/javascript" src="/js/functions2.js"></script>

         <script>
           function chooseFile2() {
              $("#fileInput2").click();
           }
        </script>

        <script type="text/javascript">
          $(function() {
             $("#fileInput2").change(function (){

                  console.log("FORM IS SUBMITTING");

                    var formData = new FormData();

                    formData.append('files', $('input[type=file]#fileInput2')[0].files[0]);

                     console.log(formData); 

                    $.ajax({
                        url:'/image/upload',
                        data: formData,
                        async:false,
                        type:'post',
                        processData: false,
                        contentType: false,
                        success:function(res){
                          insertAtCaret2('![alt text]('+ res.src + ' "Image Title")');
                        },
                      });
                   });

                
          });


           @if($chapter->status == 1)
       @if(auth()->user()->hasRole('administrator'))
        toggleFullscreen2()
       @endif
     @endif  

         
        </script>

        <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip(); 
        });
        </script>

         <script>
          Preview2.Init();
          Preview2.Update();
          </script>


@endsection


