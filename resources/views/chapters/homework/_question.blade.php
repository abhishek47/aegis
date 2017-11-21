<div class="panel panel-default question-panel" style="width: 100%;">
    <div class="panel-heading">
    	
    	Problem {{ $index+1 }} | 
	    @if(!$homework->isSolved())		
	    	Points : {{ $homework->points }} 
	    @else
	    	Score : {{ $homework->userSolution()->score }} / {{ $homework->points }} 
	    @endif
	    <span class="pull-right"> Due Date : {{ $homework->due_date->format('d/m/Y') }} </span>
	    
    	
    </div>
	<div class="panel-body" >
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
	<div class="panel-footer">
	   <div class="float-left" id="solution-{{ $homework->id }}">
	     @if($homework->overDueDate())

	     	<b>The deadline for submission has passed!</b>

	     @else

	      @if(!$homework->hasAttempts() && !$homework->isSolved())

	      	<b>You don't Have any attempts left!</b>

	      @else
		     @if($homework->isSolved())

		       <b>Problem Solved in {{  3 - $homework->userSolution()->attempts }} attempts! Your answer : {{  $homework->userSolution()->answer }}</b>

		     @else
				<input type="text" id="answer-{{ $homework->id }}" class="form-control" placeholder="Your Answer" style="width:60%;display: inline-block;height: 40px;">
				<button class="btn btn-dark btn-theme-colored btn-flat"  onclick="submitAnswer({{$homework->id}})">Submit Answer</button>
			 @endif	
		   @endif
		 @endif  	 
		</div>
	</div>
</div>