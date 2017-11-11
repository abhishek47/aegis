<div class="pt-3 card"  style="width: 100%;" id="status">
		
	<div class="card-body text-center">
		
		<h2 style="font-weight: bold;">{{ $chapter->getStatusText() }}</h2>

		<h3>Scheduled on : {{ $chapter->date }} | {{ $chapter->begin_time }}</h3>	

		@if(auth()->user()->hasRole('administrator'))

			<button class="btn btn-primary" id="startSession">Start Session</button>

		@endif

	</div>	

</div>