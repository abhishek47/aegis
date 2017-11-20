
	
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



	