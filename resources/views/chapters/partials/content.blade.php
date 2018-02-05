

    <div class="mini-spacer bg-light" style="min-height: 1000px;">

  <div class="container pt-50">

        <div class="card card-shadow">
        
        <div class="card-header bg-info"></div> 

        <div class="card-body">

                        <div class="course-top-part pull-left mr-40">
                          <h3 class="mt-0 m-b-10"><b>Topic Description</b></h3>
                        </div>

                       
                        
                        <div class="clearfix"></div>
                        <p class="course-description mt-10" style="font-size: 17px;">
                          {{ $chapter->description }}
                        </p>

                      </div>


        </div>


        <ul id="myTab" class="nav nav-tabs">
           <li class="nav-item" style="width: 25%;"><a class="nav-link" href="#home" data-toggle="tab">Transcript</a></li>
           <li class="nav-item" style="width: 25%;"><a class="nav-link" href="#notes" data-toggle="tab">Summary</a></li>
           <li class="nav-item" style="width: 25%;"><a class="nav-link" href="#profile" data-toggle="tab">Homework</a></li>
           <li class="nav-item" style="width: 25%;"><a class="nav-link" href="#epp" data-toggle="tab">Extra Practice Problems</a></li>
        </ul>
        <div id="myTabContent" class="tab-content tabcontent-border">
          <div class="tab-pane fade in active" id="home">
             
              <div class="course-single-item bg-white border-1px clearfix">
                
              <div class="course-details clearfix">

                      
                        <ul id="transcriptMessages"  style="" ></ul>

                        

                  </p>

                </div>


              </div>  
          </div>
          <div class="tab-pane fade" id="profile">
             @include('chapters.homework.index')
          </div>
          <div class="tab-pane fade" id="notes">
            @include('chapters.notes.index')
          </div>
          <div class="tab-pane fade" id="epp">
            @include('chapters.extraproblems.index')
          </div>
        </div> 


       



  </div>


