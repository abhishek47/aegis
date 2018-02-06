<template>
    
<div class="d-flex flex" data-plugin="chat">
            <div class="fade aside aside-sm" id="content-aside">
                <div class="d-flex flex-column w-xl b-r dark modal-dialog" id="chat-nav">
                    <div class="navbar box-shadow">
                        <div class="input-group flex">
                            <input type="text" class="form-control px-0 no-bg no-border no-shadow search" placeholder="Search" required=""> <span class="input-group-btn"><button class="btn no-bg no-border no-shadow" type="button"><i class="fa fa-search text-muted"></i></button></span></div>
                    </div>
                    <div class="scrollable hover">
                        <div class="list inset">
                            <div class="p-2 px-3 text-muted text-sm">People</div>

                            <div v-for="user in people" class="list-item" @click="openChats(user)" style="cursor: pointer;" v-bind:class="user.id == receiver.id ? 'light' : ''" data-id="item-1"><span class="w-40 avatar circle grey"><i class="on b-white avatar-right"></i> <img :src="user.profile_pic.encoded" alt="."></span>
                                <div class="list-body"><a href="#"  class="item-title _500" v-text="user.name"></a>
                                    <div class="item-except text-sm text-muted h-1x">New Message</div>
                                    <div class="item-tag tag hide"></div>
                                </div>
                                <div></div>
                            </div>
                            
                            
                        </div>
                        <div class="no-result hide">
                            <div class="p-4 text-center">No Results</div>
                        </div>
                    </div>
                    <div class="p-3 mt-auto"><span class="text-sm text-muted">Messages: <span v-text="chats.length"></span></span></div>
                </div>
            </div>
            <div class="d-flex flex" id="content-body">
                <div class="d-flex flex-column flex" id="chat-list">
                    <div class="navbar flex-nowrap white lt box-shadow"><a data-toggle="modal" data-target="#content-aside" data-modal class="mr-1 d-md-none"><span class="btn btn-sm btn-icon primary"><i class="fa fa-th"></i> </span></a><span class="text-md text-ellipsis flex"><span v-text="receiver.name"></span> <span style="font-size: 12px;color:green;" v-text="status"></span></span>
                        
                    </div>
                    <div class="scrollable hover" id="chats">
                        <div class="p-3">
                            <div class="chat-list">
                                <div v-for="message in messages" class="chat-item" :data-class="getClass(message)">
                                    <a href="#" class="avatar w-40"><img :src="message.sender.profile_pic.encoded" alt="."></a>
                                    <div class="chat-body">
                                        <div class="chat-content rounded msg" v-text="message.message"></div>
                                        <div class="chat-date date" v-text="message.created_at"></div>
                                    </div>
                                </div>
                               
                               
                            </div>
                            
                        </div>
                    </div>
                    <div class="p-3 white lt b-t mt-auto" id="chat-form">
                        <div class="input-group">
                            <input type="text" class="form-control" v-model="newMessage"  @keyup.enter="sendMessage();" placeholder="Say something" id="newField"> <span class="input-group-btn"><button @click="toggleKeyboard();" class="btn white b-a no-shadow" type="button" id="newBtn"><i class="fa fa-keyboard-o text-success"></i></button></span>
                            <span class="input-group-btn"><button @click="sendMessage();" class="btn white b-a no-shadow" type="button" id="newBtn"><i class="fa fa-send text-success"></i></button></span></div>


                         <div id="keyboard" class="mt-2">
                             <div class="btn-group">
                              <button type="button" class="btn btn-default">&alpha;</button>
                              <button type="button" class="btn btn-default">&beta;</button>
                              <button type="button" class="btn btn-default">&gamma;</button>
                              <button type="button" class="btn btn-default">&delta;</button>
                            </div>
                         </div>   
                    </div>
                   
                </div>
            </div>
        </div>
</template>

<script>
    export default {

        props: ['user', 'chats', 'people', 'currentuser'],

        data() {
            return {
                chatName: this.people[0].name,
                status: 'offline',
                 globalStatus: 'offline',
                receiver: this.currentuser,
                newMessage: '',
                messages: this.chats
            }
        },

        mounted() {
            console.log('Component mounted.')
        },

        created() {
             
             this.joinChats();   

             this.joinRoom(this.getRoomId());
        },

        methods: {
            openChats(user) {
                Echo.leave('chat.'+this.getRoomId());
                Echo.leave('chats');
                this.receiver = user;
                 this.joinRoom(this.getRoomId());
                 var self = this;
                  axios.get('/chats/get', {'friend_id': self.receiver.id })
                     .then(function(response){
                        
                        self.messages = response.data.messages;
                        
                       
                        $('#chats').animate({scrollTop: $('#chats').prop("scrollHeight")}, 500);

                            

                     });

            },

            getClass: function(message){
                if(message.sender.id == this.user.id)
                {
                    return 'alt';
                } else {
                    return 'null';
                }
            },


            sendMessage(){
                var self = this;
                axios.post('/chats', {'message': self.newMessage, 'to_id': self.receiver.id })
                     .then(function(response){
                        var message = response.data.message;
                        
                        self.messages.push(message);   

                        self.newMessage = '';

                        $('#chats').animate({scrollTop: $('#chats').prop("scrollHeight")}, 500);

                            

                     });
            },

            getRoomId() {
               
               

                return "" + Math.max(this.user.id, this.receiver.id) + Math.min(this.user.id, this.receiver.id);;

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
                Echo.join('chat.'+roomId)
                    .here((users) => {
                        if(self.contains(users, self.receiver))
                        {

                        self.status = 'active';
                        } else {
                            self.status = self.globalStatus;
                        }
                    
                    })
                    .joining((user) => {
                       
                            if(self.receiver.id == self.user.id)
                            {
                             self.status = 'active';
                            } 
                        
                    })
                    .leaving((user) => {
                         if(self.receiver.id == self.user.id)
                            {
                             self.status = self.globalStatus;
                            } 
                    }).listen('NewMessage', function(e){

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
                        if(self.contains(users, self.receiver))
                        {

                        self.globalStatus = 'online';
                        } else {
                            self.globalStatus = 'offline'
                        }
                    
                    })
                    .joining((user) => {
                       if(user.id == self.receiver.id)
                        {
                            self.globalStatus = 'online';
                        }
                            
                        
                    })
                    .leaving((user) => {
                        if(user.id == self.receiver.id)
                        {
                            self.globalStatus = 'offline';
                        }
                    });
            }
        }
    }
</script>


