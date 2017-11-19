
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
@endsection


@section('content')


<div class="chat-left">
   <h3>Chapter Summary</h3>

   <p>{{ $chapter->description }}</p>

  <a href="/classrooms/{{ $chapter->classroom->id }}" class="btn btn-danger btn-exit">Exit Session</a>

  <div class="course-intro">
       <h4>Course</h4>
     <p class="course-name">{{ $chapter->classroom->title }}</p>

  </div>
</div>


  

<div class="chat-right" >

  <section class="chat-heading">

    <h2>{{ $chapter->title }} <span><i class="fa fa-circle"></i> Session Live</span></h2>

    <a href="/classrooms/{{ $chapter->classroom->id }}" class="icon-close"><i class="fa fa-close"></i></a>
    
  </section>
 




<div class="pt-4" style="overflow: auto;background: #fafafa;">

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


<div class="panel-footer fixed-bottom">
    <form id="userMessageForm">
        <textarea id="user-message" name="message"  type="text" class="form-control input-sm " rows="3" style="font-size: 17px;" placeholder="Your Message here..." ></textarea>
       
      </form>
</div>

</div>
</div>




@endsection


@section('js')
  

	
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
          if(message.text != '~end~')
          {
          	 $('#status').addClass('hidden');
  			 $('#newMessage').removeClass('hidden');
	  		 $('#transcript').removeClass('hidden');	
	  		 $('#chapterTabs').removeClass('hidden');
          	 return _this.messagesView(message.name, message.text, message.user_id);
          }
      	  else
      	  {
  	  		$('#newMessage').addClass('hidden');
      	  }	
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

      $("#userMessageForm #user-message").keypress((function(_this) {
        return function(e) {
           if (event.keyCode == 13 || event.which == 13) {
              var name, text;
            
              name = "{{ auth()->user()->name }}";
              text = $("#userMessageForm textarea[name='message']").val();
              $("#userMessageForm textarea[name='message']").val("");
              return _this.newMessage(name, text);
           }
        };
      })(this));
    }

    SimpleChat.prototype.messagesView = function(name, text, usedId) {
      var listItem, nameItem, textItem;
      listItem = jQuery("<li/>", {
      	"class": "panel w-100  message-panel",
        "tabindex": 1
      });
      
      text = md.render(text);
      text = text.replace('>', '&gt;');
      text = text.replace('<', '&lt;');
      text = aegismarked(text);
      nameItem = jQuery("<div/>", {
        "class": "panel-heading name",
        text: name
      });
      textItem = jQuery("<p/>", {
        "class": "panel-body text markdown-body",
        html: text
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


