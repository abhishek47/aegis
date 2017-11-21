@foreach($chapter->classroom->homeworks()->where('week', $chapter->week)->get() as $index => $homework)

     @include('chapters.homework._question')

@endforeach








