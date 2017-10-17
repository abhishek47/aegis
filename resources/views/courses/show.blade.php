@extends('layouts.master')

@section('title')
  
  {{ $course->name }} | Aegis Academy

@endsection


@section('content')

	

    <section class="bg-silver-deep">
        
        <div class="container">
          <h2 class="text-uppercasetext-theme-colored mt-0 mt-sm-30">{{ $course->name }} | {{ $course->type == 0 ? 'Offline' : 'Online' }}</h2>
              <div class="double-line-bottom-theme-colored-2"></div>



              <div class="c-description mt-20" style="color: #000;font-size: 20px;">
                {!! $course->body !!}
              </div>

              @auth
              @if(auth()->user()->enrollments->contains($course))
                <a href="#" class="btn btn-colored btn-theme-colored2 btn-flat btn-lg" style="font-size: 18px;font-weight: bold;">You will be Notified when the Course begins!</a> 
              @else
               <a href="/enroll/{{$course->id}}" class="btn btn-colored btn-theme-colored2 btn-flat btn-lg" style="font-size: 18px;font-weight: bold;">Notify Me</a> 
              @endif
              @endauth

        </div>

    </section>

    @endsection

   