<div class="course-single-item bg-white border-1px clearfix mb-30" style="width: 100%;">
	<div class="course-details clearfix p-20 pt-15">

                  <div class="course-top-part pull-left mr-40">
                    <h5 class="mb-0">
					    	Problem {{ $index+1 }} | 
						    @if(!$homework->isSolved())		
						    	Points : {{ $homework->points }}
						    @else
						    	Score : {{ $homework->userSolution()->score }} / {{ $homework->points }}
						    @endif
						    Due Date : {{ $homework->due_date }}	
						    </h5>
					    	
                  </div>

                 
                  
                  <div class="clearfix"></div>
                  <b>Question : </b><br><br>
	    <div id="homework-{{ $homework->id }}">
			<div class="homework-question-{{ $homework->id }}">
			{{ $homework->q }}
			</div>
			@if($homework->isSolved() || $homework->overDueDate())
			<b>Solution : </b>
			<div class="panel panel-default solution">
			  <div class="panel-body" id="homework-solution-{{ $homework->id }}">{{ $homework->solution }}</div>
			 </div>
			@endif
		</div>	
		<p id="answer-response-{{ $homework->id }}"></p>

			<div class="float-left" id="solution-{{ $homework->id }}">
	     @if($homework->overDueDate())

	     	<p class="mb-0"><b>The deadline for submission has passed!</b></p>

	     @else

	      @if(!$homework->hasAttempts() && !$homework->isSolved())

	      	<p class="mb-0"><b>You don't Have any attempts left!</b></p>

	      @else
		     @if($homework->isSolved())

		       <p class="mb-0"><b>Problem Solved in {{  3 - $homework->userSolution()->attempts }} attempts! Your answer : {{  $homework->userSolution()->answer }}</b></p>

		     @else
				<input type="text" id="answer-{{ $homework->id }}" class="form-control" placeholder="Your Answer" style="width:60%;display: inline-block;height: 33px;">
				<button class="btn btn-sm btn-primary" onclick="submitAnswer({{$homework->id}})">Submit Answer</button>
			 @endif	
		   @endif
		 @endif  	 
		</div>
		

                </div>
    
	
</div>