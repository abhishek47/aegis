<template>
    
<div class="d-flex flex" data-plugin="chat">
            <div class="fade aside aside-sm" id="content-aside">
                <div class="d-flex flex-column w-xl b-r dark modal-dialog" id="chat-nav">
                    <div class="white p-2" style="background: #fff;margin: 10px;">
                     <a href="/home"> <img src="/images/logo-wide.png" style="width: 190px;
    margin: auto;
    display: block;"></a>
                    </div>
                    <div>
                         <a class="nav-link mt-2" data-toggle="modal" data-target="#addFriend"><span class="btn btn-sm btn-block btn-rounded danger"><i class="fa fa-plus float-left"></i> New</span></a>
                    </div>
                    <div class="navbar box-shadow">
                        <div class="input-group flex">
                            <input type="text"  class="form-control px-0 no-bg no-border no-shadow search" placeholder="Search" required=""> <span class="input-group-btn"><button class="btn no-bg no-border no-shadow" type="button"><i class="fa fa-search text-muted"></i></button></span></div>
                    </div>
                    <div class="scrollable hover">

                        <div class="list inset">
                            <div class="p-2 px-3 text-muted text-sm">Inbox</div>

                            <div v-for="thread in chatThreads" class="list-item" @click="openChats(thread)" style="cursor: pointer;" v-bind:class="thread.id == currentThread.id ? 'light' : ''" data-id="item-1"><span class="w-40 avatar circle grey"> <img :src="thread.second_user.profile_pic.encoded" alt="."></span>
                                <div class="list-body"><a href="#"  class="item-title _500" v-text="thread.second_user.name"></a>
                                    <div class="item-except text-sm text-muted h-1x" v-text="thread.second_user.email"></div>
                                    <div class="item-tag tag hide"></div>
                                </div>
                                <div></div>
                            </div>
                            
                            
                        </div>
                        <div class="no-result hide">
                            <div class="p-4 text-center">No Results</div>
                        </div>
                    </div>
                    <div class="p-3 mt-auto"><span class="text-sm text-muted">Messages: <span v-text="threads.length"></span></span></div>
                </div>
            </div>
            <div class="d-flex flex" id="content-body">
                <div class="d-flex flex-column flex" id="chat-list" v-if="threads.length != 0">
                    <div class="navbar flex-nowrap white lt box-shadow">

                     <a data-toggle="modal" data-target="#content-aside" data-modal class="mr-1 d-md-none">
                      <span class="btn btn-sm btn-icon primary"><i class="fa fa-th"></i> </span>
                     </a>

                     <span class="text-md text-ellipsis flex"><span v-text="currentThread.second_user.name"></span> 
                     <span style="font-size: 12px;color:green;" v-text="status"></span></span>

                     <button  @click="unfriend(currentThread.second_user)"  class="btn btn-danger">Unfriend</button>
                        
                    </div>



                    <div v-if="currentThread.accepted == 2">
                      <h3 style="margin-top: 35vh;">Your friend request to <span class="font-weight-bold" v-text="currentThread.acceptor.name"></span> is rejected!</h3>

                            <p style="font-size:18px;">You cannot send messages until the request is accepted!</p>
                    </div>

                    <div v-if="currentThread.accepted == 0">
                        <div class="d-flex flex-column flex  align-items-center"  v-if="currentThread.requestor.id == user.id">
                            
                            <h3 style="margin-top: 35vh;">Your friend request to <span class="font-weight-bold" v-text="currentThread.acceptor.name"></span> is not yet accepted!</h3>

                            <p style="font-size:18px;">You cannot send messages until the request is accepted!</p>

                       
                            <a :href="'/threads/'+currentThread.id+'/cancel'" class="btn btn-primary">Cancel Request</a>
                                   
                        </div>

                        <div class="d-flex flex-column flex  align-items-center"  v-else>
                            <h3 style="margin-top: 35vh;"><span class="font-weight-bold" v-text="currentThread.requestor.name"></span> sent you a friend request!</h3>

                            <p style="font-size:18px;">You cannot send messages until the request is accepted!</p>

                            
                            <div>
                                <button @click="acceptRequest()"  class="btn btn-primary">Accept</button>
                                <button @click="rejectRequest()"  class="btn btn-danger">Reject</button>
                            </div>
                        </div>

                    </div>
                    <div class="scrollable hover" v-if="currentThread.accepted == 1" id="chats">
                        <div class="p-3">
                            <div class="chat-list">
                               <div v-for="message in messages" class="chat-item" :data-class="getClass(message)">
                                    <a href="#" class="avatar w-40"><img :src="message.sender_id == user.id ? currentThread.first_user.profile_pic.encoded : currentThread.second_user.profile_pic.encoded" alt="."></a>
                                    <div class="chat-body">
                                        <div class="chat-content rounded msg" v-text="message.message"></div>
                                        <div class="chat-date date" v-text="message.created_at"></div>
                                    </div>
                                </div>
                               
                               
                            </div>
                            
                        </div>
                    </div>
                    <div class="p-3 white lt b-t mt-auto" id="chat-form" v-if="currentThread.accepted == 1" >
                        <p>Put all latex commands inside <span class="tex2jax_ignore">$</span> symbol.Ex. : <span class="tex2jax_ignore">$\sin(sin^{-1})$</span></p>
                        <div class="input-group">
                            <span class="input-group-btn"><button @click="toggleKeyboard();" class="btn white b-a no-shadow" type="button" id="newBtn"><i class="fa fa-keyboard-o text-success"></i></button></span>
                           <input type="text"  class="form-control" v-model="newMessage"    @keyup.enter="sendMessage();" placeholder="Say something" id="math-field">  
                            
                            <span class="input-group-btn"><button @click="sendMessage();" class="btn white b-a no-shadow" type="button" id="newBtn"><i class="fa fa-send text-success"></i></button></span></div>


                         <div id="keyboard" class="mt-2">
                          <div>
                            <a href="/uploads/latexcheatsheet.pdf" style="color: blue;text-decoration:underline !important;" target="_blank">Read LaTex Symbols Cheat Sheet</a>
                          </div>
                         <!--
                            <div class="btn-group">
                              <button type="button" @click="addCode('$0$')"  class="btn btn-default">0</button>
                              <button type="button" @click="addCode('$1$')" class="btn btn-default">1</button>
                              <button type="button" @click="addCode('$2$')" class="btn btn-default">2</button>
                              <button type="button" @click="addCode('$3$')" class="btn btn-default">3</button>
                              <button type="button" @click="addCode('$4$')" class="btn btn-default">4</button>
                              <button type="button" @click="addCode('$5$')" class="btn btn-default">5</button>
                              <button type="button" @click="addCode('$6$')" class="btn btn-default">6</button>
                              <button type="button" @click="addCode('$7$')" class="btn btn-default">7</button>
                              <button type="button" @click="addCode('$8$')" class="btn btn-default">8</button>
                              <button type="button" @click="addCode('$9$')" class="btn btn-default">9</button>
                              <button type="button" @click="addCode('$.$')" class="btn btn-default">.</button>
                            </div>
                            -->

                              <div class="btn-group mt-1">
                                <button type="button" @click="addCode('$.$')" class="btn btn-default">.</button>
                                <button type="button" @click="addCode('$=$')" class="btn btn-default">=</button>
                                <button type="button" @click="addCode('$\\neq$')" class="btn btn-default">$\neq$</button>
                                <button type="button" @click="addCode('$\\infty$')" class="btn btn-default" >&infin;</button>
                            </div>

                              <div class="btn-group mt-1">
                                <button type="button" @click="addCode('$\\therefore$')" class="btn btn-default">$\therefore$</button>
                                <button type="button" @click="addCode('$\\because$')" class="btn btn-default">$\because$</button>
                                <button type="button" @click="addCode('$\\sim$')" class="btn btn-default" >$\sim$</button>
                            </div>

                             <div class="btn-group ">
                              <button type="button" @click="addCode('$\\sin$')"  class="btn btn-default">sin</button>
                              <button type="button" @click="addCode('$\\cos$')" class="btn btn-default">cos</button>
                              <button type="button" @click="addCode('$\\tan$')" class="btn btn-default">tan</button>
                              <button type="button" @click="addCode('$cosine$')" class="btn btn-default">cosine</button>
                              <button type="button" @click="addCode('$\\sin^{-1}$')"  class="btn btn-default">$sin^{-1}$</button>
                              <button type="button" @click="addCode('$\\cos^{-1}$')" class="btn btn-default">$cos^{-1}$</button>
                              <button type="button" @click="addCode('$\\tan^{-1}$')" class="btn btn-default">$tan^{-1}$</button>
                              <button type="button" @click="addCode('$cosine^{-1}$')" class="btn btn-default">$cosine^{-1}$</button>
                            </div>


                            <div class="btn-group mt-1">
                                <button type="button" @click="addCode('$\\rightarrow$')" class="btn btn-default">$\rightarrow$</button>
                                <button type="button" @click="addCode('$\\leftarrow$')" class="btn btn-default">$\leftarrow$</button>
                                <button type="button" @click="addCode('$\\uparrow$')" class="btn btn-default">$\uparrow$</button>
                                <button type="button" @click="addCode('$\\downarrow$')" class="btn btn-default">$\downarrow$</button>
                            </div>

                             <div class="btn-group mt-1">
                                <button type="button" @click="addCode('$\\exists$')" class="btn btn-default">$\exists$</button>
                                <button type="button" @click="addCode('$\\forall$')" class="btn btn-default">$\forall$</button>
                                <button type="button" @click="addCode('$\\neg$')" class="btn btn-default">$\neg$</button>
                            </div>


                          


                            <br>
                           

                             <div class="btn-group mt-1">
                              <button type="button" @click="addCode('$\\alpha$')"  class="btn btn-default">&alpha;</button>
                              <button type="button" @click="addCode('$\\beta$')" class="btn btn-default">&beta;</button>
                              <button type="button" @click="addCode('$\\gamma$')" class="btn btn-default">&gamma;</button>
                              <button type="button" @click="addCode('$\\delta$')" class="btn btn-default">&delta;</button>
                            </div>


                             

                            <div class="btn-group mt-1">
                                <button type="button" @click="addCode('$\\frac{1}{4}$')" class="btn btn-default">&frac14;</button>
                                <button type="button" @click="addCode('$\\sqrt[2]{4}$')" class="btn btn-default">&radic;</button>
                                <button type="button" @click="addCode('$\\sqrt[3]{4}$')" class="btn btn-default" >&#8731;</button>
                            </div>

                             <div class="btn-group mt-1">
                              <button type="button" @click="addCode('$a^{b}$')"  class="btn btn-default">$a^{b}$</button>
                              <button type="button" @click="addCode('$a_{b}$')" class="btn btn-default">$a_{b}$</button>
                              <button type="button" @click="addCode('$a^{\\frac{1}{4}}$')"  class="btn btn-default">$a^{\frac{1}{4}}$</button>
                            </div>

                            <div class="btn-group mt-1">
                                <button type="button" @click="addCode('$\\sum_{k=1}^n$')" class="btn btn-default">&sum;</button>
                                <button type="button" @click="addCode('$\\prod_{k=1}^n$')" class="btn btn-default">&prod;</button>
                                <button type="button" @click="addCode('$\\int_{a}^{b} x^2 dx$')" class="btn btn-default">&int;</button>
                                <button type="button" @click="addCode('$\\frac{du}{dt}$')" class="btn btn-default">$\frac{du}{dt}$</button>
                                <button type="button" @click="addCode('$\\frac{\\partial u}{\\partial t}$')" class="btn btn-default">
                                  $\frac{\partial u}{\partial t}$
                                </button>
                            </div>

                            <div class="btn-group mt-1">
                              <button type="button" @click="addCode('$\\nless$')"  class="btn btn-default">$\nless$</button>
                              <button type="button" @click="addCode('$\\ngtr$')" class="btn btn-default">$\ngtr$</button>
                              <button type="button" @click="addCode('$\\nleqslant$')"  class="btn btn-default">$\nleqslant$</button>
                              <button type="button" @click="addCode('$\\ngeqslant$')"  class="btn btn-default">$\ngeqslant$</button>
                            </div>

                            <div class="btn-group mt-1">
                                <button type="button" @click="addCode('$\\overline{\\rm AB}$')" class="btn btn-default">$\overline{\rm AB}$</button>
                                <button type="button" @click="addCode('$\\overrightarrow{\\rm AB}$')" class="btn btn-default">$\overrightarrow{\rm AB}$</button>
                                <button type="button" @click="addCode('$\\vec{o}$')" class="btn btn-default">$\vec{a}$</button>
                                <button type="button" @click="addCode('$\\hat{o}$')" class="btn btn-default">$\hat{o}$</button>
                                <button type="button" @click="addCode('$\\hat{\\jmath}$')" class="btn btn-default">$\hat{\jmath}$</button>
                            </div>
                         </div>   
                    </div>
                   
                </div>
                 <div class="d-flex flex-column flex chat-start align-items-center" id="chat-start" v-else>

                    <h3 style="margin-top: 45vh;">You have no chat threads yet!</h3>

                    <p  style="font-size:18px;">Start adding your friends and talk mathematics here!</p>

               
                    <a href="#addFriend" data-toggle="modal" class="btn btn-primary">Add Friend</a>
                  

                 </div>
            </div>

             <div id="addFriend" class="modal" data-backdrop="true" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Friend</h5>
                    </div>
                    
                    <div class="modal-body  p-lg">
                        <div class="form-group">
                            <label>Enter user's name or email to add</label>
                            <div>
                              <input type="text" placeholder="Search user" v-model="query" v-on:keyup="autoComplete" class="form-control">
                              <div class="panel-footer" v-if="results.length">
                               <ul class="list-group">
                                <li class="list-group-item" v-for="result in results">
                                 <div @click="chooseUser(result)" style="cursor: pointer;">
                                  {{ result.name }} <br>
                                  <small>{{ result.email }}</small>
                                 </div>
                                </li>
                               </ul>
                              </div>
                             </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">Close</button> 
                        <button type="button" @click="addFriend()" class="btn danger p-x-md" data-dismiss="modal">Add</button>
                    </div>

                </div>
            </div>
        </div>
        </div>


       
</template>

<script>
    export default {

        props: ['user', 'threads', 'chats'],

        data() {
            return {
                chatName: this.threads.length != 0 ? this.threads[0].second_user.name : [],
                status: 'offline',
                globalStatus: 'offline',
                currentThread: this.threads.length != 0 ? this.threads[0] : [],
                newMessage: '',
             
                keyboardEnabled: true,
                userSearch: '',
                query: '',
                results: [],
                selectedUser: [],
                chatThreads: this.threads.length != 0 ? this.threads : [],
                messages: this.chats,
                
            }
        },


        mounted() {
            console.log('Component mounted.');
            


        },

        created() {
             
            
              
              

             console.log('Threads : ' + this.threads);

             if(this.currentThread != [])
             {
                this.joinChats();   
                this.joinRoom(this.getRoomId());

                
             }
             
             if(!Push.Permission.has())
             {
                 Push.create("AEGIS Academy", {
                    body: "You will recieve message notifications here",
                    icon: '../images/fav.png',
                    timeout: 4000,
                    onClick: function () {
                        window.focus();
                        this.close();
                    }
                });
             }

             Echo.private('App.User.' + this.user.id)
                .notification((notification) => {
                     console.log(notification.type);
                    if(notification.type == 'App\\Notifications\\NewChatMessage')
                    {


                    var message = notification.message;
                        
                        self = this;
                        Push.create(message.sender_name, {
                            body: message.message,
                            icon: '../images/fav.png',
                            timeout: 4000,
                            onClick: function () {
                                window.focus();
                                self.openChats(notification.thread);
                                this.close();
                            }
                        });

                     } else if(notification.type == 'App\\Notifications\\ThreadRequestAccepted') {

                        var thread = notification.thread;
                        
                        if(this.currentThread.id == thread.id)
                        {
                          this.currentThread.accepted = 1;
                        }

                        this.chatThreads.forEach((e) => {
                            if(e.id == thread.id)
                            {
                                e.accepted = 1;
                            }
                        });



                        Push.create(thread.acceptor.name + ' accepted your request!', {
                            body: 'Start your conversation!',
                            icon: '../images/fav.png',
                            timeout: 4000,
                            onClick: function () {
                                window.focus();
                                self.openChats(notification.thread, 1);
                                this.close();
                            }
                        });

                     }

                     else if(notification.type == '\\App\\Notifications\\ThreadRequestRejected') {

                        var thread = notification.thread;

                        if(this.currentThread.id == thread.id)
                        {
                          this.currentThread.accepted = 2;
                        }
                        
                         this.chatThreads.forEach((e) => {
                            if(e.id == thread.id)
                            {
                                e.accepted = 2;
                            }
                        });

                        Push.create(thread.acceptor.name + ' rejected your request!', {
                            body: 'You cannot have a conversation!',
                            icon: '../images/fav.png',
                            timeout: 4000,
                            onClick: function () {
                                window.focus();
                                self.openChats(notification.thread, 3);
                                this.close();
                            }
                        });

                     }

                      else if(notification.type == '\\App\\Notifications\\NewThreadRequest') {

                        var thread = notification.thread;

                        this.chatThreads.unshift(thread);
                        console.log(this.chatThreads);
                        this.currentThread = thread;

                        Push.create('You have a new friend request from ' + thread.requestor.name, {
                            body: 'Respond to the request!',
                            icon: '../images/fav.png',
                            timeout: 4000,
                            onClick: function () {
                                window.focus();
                                self.openChats(notification.thread, 3);
                                this.close();
                            }
                        });

                     }
                });


            



        },

        updated() {
            MathJax.Hub.Queue(
                          ["Typeset",MathJax.Hub,document.getElementById('chats')],
                          function() {
                            
                               
                             
                          }
                        );
        },

        methods: {
            openChats(thread, accepted = 0) {
                Echo.leave('thread.'+this.getRoomId());
                Echo.leave('chats');
                this.currentThread = thread;
                if(accepted != 0)
                {
                    this.currentThread.accepted = accepted;
                }
                this.joinChats();   
                 this.joinRoom(this.getRoomId());
                 var self = this;
                  axios.get('/messages/'+self.currentThread.id)
                     .then(function(response){
                        console.log(response.data);
                        self.messages = response.data.messages;
                         
                         
                       
                        $('#chats').animate({scrollTop: $('#chats').prop("scrollHeight")}, 500);

                        MathJax.Hub.Queue(
                          ["Typeset",MathJax.Hub,document.getElementById('chats')],
                          function() {
                            
                               
                             
                          }
                        );
                       
                                        

                     });

            },

            getClass: function(message){
                if(message.sender_id == this.user.id)
                {
                    return 'alt';
                } else {
                    return 'null';
                }
            },


            sendMessage(){
                
                var self = this;
                axios.post('/messages/' + self.currentThread.id, {'message': self.newMessage, 'receiver_id': self.currentThread.second_user.id })
                     .then(function(response){
                        var message = response.data.message;
                        
                        self.messages.push(message);   

                        self.newMessage = '';

                        $('#chats').animate({scrollTop: $('#chats').prop("scrollHeight")}, 500);

                         
                                       
                            

                     });
            },

            getRoomId() {
               
               

                return "" + this.currentThread.id;

            },

            contains(users, user)
            {
                var found = false;
                for(var i = 0; i < users.length; i++) {
                    if (users[i].id == user.id) {
                        found = true;
                        break;
                    }
                }

                return found;
            },

            joinRoom(roomId) {

                  var self = this;
                Echo.join('thread.'+roomId)
                    .here((users) => {
                        if(self.contains(users, self.currentThread.second_user))
                        {

                        self.status = 'active';
                        } else {
                            self.status = self.globalStatus;
                        }
                    
                    })
                    .joining((user) => {
                       
                            if(self.currentThread.second_user.id == self.user.id)
                            {
                             self.status = 'active';
                            } 
                        
                    })
                    .leaving((user) => {
                         if(self.currentThread.second_user.id  == self.user.id)
                            {
                             self.status = self.globalStatus;
                            } 
                    }).listen('NewMessage', function(e){

                        console.log(e.message);

                        var message = e.message;
                        
                        self.messages.push(message);   

                        self.newMessage = '';

                        $('#chats').animate({scrollTop: $('#chats').prop("scrollHeight")}, 500);

                        
                                       

                    });


                    

                       
            },

            joinChats()
            {
                  var self = this;
                 Echo.join('chats')
                    .here((users) => {
                        if(self.contains(users, self.currentThread.second_user))
                        {

                        self.globalStatus = 'online';
                        } else {
                            self.globalStatus = 'offline'
                        }
                    
                    })
                    .joining((user) => {
                       if(user.id == self.currentThread.second_user.id)
                        {
                            self.globalStatus = 'online';
                        }
                            
                        
                    })
                    .leaving((user) => {
                        if(user.id == self.currentThread.second_user.id)
                        {
                            self.globalStatus = 'offline';
                        }
                    });
            },


            addCode(code)
            {
                console.log(code);
                this.newMessage = this.newMessage + code;
                $('#math-field').focus();
            },

            toggleKeyboard()
            {
                if(this.keyboardEnabled)
                {
                    $('#keyboard').hide();
                    this.keyboardEnabled = false;
                } else {
                    $('#keyboard').show();
                    this.keyboardEnabled = true;
                }
                
            },

            searchUser(){

            },

            autoComplete(){
                this.results = [];
                if(this.query.length > 2){
                 axios.get('/api/search',{params: {query: this.query}}).then(response => {
                  this.results = response.data;
                 });
                }
               },

               chooseUser(user) {
                 this.results = [];
                 this.query = user.name;
                 this.selectedUser = user;
               },

               addFriend()
               {
                  self = this;
                  axios.post('/threads', { 'to_id': self.selectedUser.id }).then(response => {

                      self.chatThreads.unshift(response.data.thread);
                       console.log(self.chatThreads);
                      self.currentThread = response.data.thread;
                  });
               },

               acceptRequest()
               {
                  self = this;
                  axios.post('/threads/' + self.currentThread.id + '/respond', { 'response': 1 }).then(response => {

                        self.currentThread.accepted = 1;
                     
                  });
               },

               rejectRequest()
               {
                  self = this;
                  axios.post('/threads/' + self.currentThread.id + '/respond', { 'response': 2 }).then(response => {

                        self.currentThread.accepted = 3;
                     
                  });
               },


               unfriend(user)
               {
                  var r = confirm('Are you sure, you want to unfriend ' + user.name + '?');

                  if (r == true) {
                      
                  this.currentThread.accepted = 0;

                   axios.get('/unfriend/' + this.currentThread.id);

                   //location.reload();

                  } else {
                     
                  }


               }

               
        },




        }            
    
</script>


