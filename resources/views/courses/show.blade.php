@extends('layouts.master')


@section('content')

	

    <section class="bg-silver-deep">
        
        <div class="container">
          <h2 class="text-uppercasetext-theme-colored mt-0 mt-sm-30">{{ $course->name }} | {{ $course->type == 0 ? 'Offline' : 'Online' }}</h2>
              <div class="double-line-bottom-theme-colored-2"></div>



              <div class="c-description mt-20" style="color: #000;font-size: 20px;">
                {!! $course->body !!}
              </div>

              @if(auth()->user()->enrollments->contains($course))
                <a href="#" class="btn btn-colored btn-theme-colored2 btn-flat btn-lg" style="font-size: 18px;font-weight: bold;">You Are Already Enrolled</a> 
              @else
               <a href="/enroll/{{$course->id}}" class="btn btn-colored btn-theme-colored2 btn-flat btn-lg" style="font-size: 18px;font-weight: bold;">Enroll Now</a> 
              @endif

        </div>

    </section>

    @endsection

   