@extends('layouts.master2')


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
  


 <nav id="chapterTabs" class="navbar navbar-expand-lg navbar-light tab-bar {{ $chapter->status == 0 ? 'hidden' : '' }}">
    <div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
       <li class="nav-item active">

        <a class="nav-link" href="/classrooms/{{ $classroom->id }}/chapter/{{ $chapter->id }}">Session <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="/classrooms/{{ $classroom->id }}/chapter/{{ $chapter->id }}/homework">Homework </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/classrooms/{{ $classroom->id }}/chapter/{{ $chapter->id }}/notes">Notes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/classrooms/{{ $classroom->id }}/chapter/{{ $chapter->id }}/discuss">Discuss</a>
      </li>
    </ul>
   
  </div>
  </div>
</nav>



<div class="pt-4 container">

	<div class="row">

		<div style="width: 100%;margin-bottom: 20px;">
		<h3 class="font-weight-bold">{{ $chapter->title }}</h3>
		<hr>
		</div>

		@if($chapter->status == 0)

			@include('chapters.status')

		@endif		
			
			@if($chapter->status == 2)
				<div class="card bg-info text-light" style="width: 100%;">
					<div class="card-body">
						<b>This chapter session is closed and the transcript is available for reference</b>
					</div>
				</div>
			@endif

			@include('chapters.transcript')

		
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
    }

    SimpleChat.prototype.messagesView = function(name, text, usedId) {
      var listItem, nameItem, textItem;
      listItem = jQuery("<li/>", {
      	"class": "card w-100 mb-3"
      });
      listItemBody = jQuery("<div/>", {
      	"class": "card-body"
      })

      listItemBody.appendTo(listItem);

      text = md.render(text);
      console.log(text);
      text = text.replace('>', '&gt;');
      text = text.replace('<', '&lt;');
      text = aegismarked(text);
      console.log(text);
      nameItem = jQuery("<h5/>", {
        "class": "card-title name",
        text: name
      });
      textItem = jQuery("<p/>", {
        "class": "card-text text markdown-body",
        html: text
      });
      listItem.prependTo("#messages #listMessages");
      nameItem.appendTo(listItemBody);
      textItem.appendTo(listItemBody);

      MathJax.Hub.Queue(
              ["Typeset",MathJax.Hub,document.getElementById('listMessages')],
              function() {
                
                   
                  console.log('Done');
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


