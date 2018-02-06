

    <div class="mini-spacer bg-light" style="min-height: 1000px;">

  <div class="container pt-50">

        <div class="card card-shadow">
        
        <div class="card-header bg-info"></div> 

        <div class="card-body">

                        <div class="course-top-part pull-left mr-40">
                          <h3 class="mt-0 m-b-10"><b>{{ $chapter->title }}</b></h3>
                        </div>

                       
                        
                        <div class="clearfix"></div>
                        <p class="course-description mt-10" style="font-size: 17px;">
                          {{ $chapter->description }}
                        </p>

                      </div>


        </div>


        <ul id="myTab" class="nav nav-tabs nav-fill">
           <a class="nav-item nav-link active" href="#home" data-toggle="tab">Transcript</a>
          <a class="nav-item nav-link" href="#notes" data-toggle="tab">Summary</a>
           <a class="nav-item nav-link" href="#profile" data-toggle="tab">Homework</a>
           <a class="nav-item nav-link" href="#epp" data-toggle="tab">Extra Practice Problems</a>
        </ul>
         <div class="card">
                
              <div class="card-body card-border">
        <div id="myTabContent" class="tab-content">
       
          <div class="tab-pane fade in active" id="home">
             
              

                      
                        <ul id="transcriptMessages"  style="" ></ul>

                        

                

                </div>

              


              
              <div class="tab-pane fade" id="profile">
                 @include('chapters.homework.index')
              </div>
              <div class="tab-pane fade text-dark" id="notes">
                @include('chapters.notes.index')
              </div>
              <div class="tab-pane fade" id="epp">
                @include('chapters.extraproblems.index')
              </div>

           </div> 

             
          </div>
          <div class="card-footer bg-warning"></div> 
        </div> 

        </div>
       



  </div>


