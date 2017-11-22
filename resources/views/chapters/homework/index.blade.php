@if($chapter->homeworks->count() == 0)
  
  <p><b>Homework Questions will be added soon!</b></p> 

@else
  @foreach($chapter->homeworks as $index => $homework)

       @include('chapters.homework._question')

  @endforeach
@endif







