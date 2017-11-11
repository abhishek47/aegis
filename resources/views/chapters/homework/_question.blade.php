<div class="card" style="width: 100%;">
    <div class="card-header">
    	<h5 class="float-left mb-0">
    	Problem {{ $index+1 }} | 
	    @if(!$homework->isSolved())		
	    	Points : {{ $homework->points }}
	    @else
	    	Score : {{ $homework->userSolution()->score }} / {{ $homework->points }}
	    @endif	
	    </h5>
    	<p class="float-right mb-0">
    		Due Date : {{ $homework->due_date }}
    	</p>
    </div>
	<div class="card-body" >
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

		
			
		
		
	</div>
	<div class="card-footer">
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