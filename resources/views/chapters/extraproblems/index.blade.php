@if($chapter->extraproblems->count() == 0)
  
  <p><b>Extra Practice Questions will be added soon!</b></p> 

@else
  <div class="panel-group accordion-theme-colored2 accordion-icon-left" id="accordion8" role="tablist" aria-multiselectable="true">
             @foreach($chapter->extraproblems->groupBy('section') as $index => $problems)
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne8">
                  <h5 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion8" href="#collapseOne8" aria-expanded="true" aria-controls="collapseOne8">
                      EPP {{$index}} <i class="fa fa-chevron-down"></i>
                    </a>
                  </h5>
                </div>
                <div id="collapseOne8" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne8">
                  <div class="panel-body">
                      @foreach($problems as $index => $homework)
                          @include('chapters.extraproblems._question')
                      @endforeach    
                  </div>
                </div>
              </div>

              @endforeach

              
            </div>
   @endif









