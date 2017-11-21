<div class="panel panel-default question-panel" style="width: 100%;">
    <div class="panel-heading">
    	
    	Problem {{ $index+1 }} | 
	    @if(!$homework->isSolved())		
	    	Points : {{ $homework->points }} 
	    @else
	    	Score : {{ $homework->userSolution()->score }} / {{ $homework->points }} 
	    @endif
	   
	    
    	
    </div>
	<div class="panel-body" >
	    <b>Question : </b><br><br>
	    <div id="ex-homework-{{ $homework->id }}">
			<div class="ex-homework-question-{{ $homework->id }}">
			{{ $homework->q }}
			</div>
			@if($homework->isSolved())
			<b>Solution : </b>
			<div class="panel panel-default solution">
			  <div class="panel-body" id="ex-homework-solution-{{ $homework->id }}">{{ $homework->solution }}</div>
			 </div>
			@endif
		</div>	
		<p id="ex-answer-response-{{ $homework->id }}"></p>

		
			
		
		
	</div>
	<div class="panel-footer">
	   <div class="float-left" id="solution-{{ $homework->id }}">
	    

	      
		     @if($homework->isSolved())

		       <b>Problem Solved in {{  $homework->userSolution()->attempts }} attempts! Your answer : {{  $homework->userSolution()->answer }}</b>

		     @else
				<input type="text" id="ex-answer-{{ $homework->id }}" class="form-control" placeholder="Your Answer" style="width:60%;display: inline-block;height: 40px;">
				<button class="btn btn-dark btn-theme-colored btn-flat"  onclick="submitExtraProblemAnswer({{$homework->id}})">Submit Answer</button>
			 @endif	
		  
		 	 
		</div>
	</div>
</div>