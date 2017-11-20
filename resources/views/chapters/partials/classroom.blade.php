  <div class="chat-left {{ $chapter->view_members && !auth()->user()->hasRole('administrator') ? '' : 'hidden' }}" >

          <div class="users-heading">
           <h3>Users Enrolled</h3>

         
          </div>
          
          <ul id="members">
            
          </ul> 

          


        </div>


          

        <div class="chat-right" style="width: {{ $chapter->view_members  && !auth()->user()->hasRole('administrator') ? '85%' : '100%' }}">

          <section class="chat-heading">

            <h2>{{ $chapter->title }} <!-- <span><i class="fa fa-circle"></i> Session Live</span> --></h2>

            
            <a href="/classrooms/{{ $chapter->classroom->id }}" class="icon-close"><i class="fa fa-close"></i></a>

            
          </section>
         




        <div class="pt-4" id="class-messages" style="overflow: hidden;background: #fafafa;">

        	<div class="row" style="">

        		

        		@if($chapter->status == 0)

        			@include('chapters.status')

        	  @endif

              @include('chapters.transcript')
        		
        	</div>

        </div>

        
        <div class="panel-footer fixed-bottom {{ !auth()->user()->hasRole('administrator') && $chapter->status == 1 ? '' : 'hidden' }}">
            <form id="userMessageForm">
                <textarea id="user-message" name="message" class="form-control input-sm " rows="3" style="font-size: 17px;" placeholder="Your Message here..." ></textarea>
               
              </form>
        </div>
          