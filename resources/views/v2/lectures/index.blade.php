@extends('v2.layouts.master')


@section('content')
    



<div class="bg-light mini-spacer" style="min-height: 1000px;">

      <div class="container pt-50">

      <h2 class="title font-bold m-b-40 m-t-0">Video Lectures</h2>

      @foreach($lectures as $index => $lecture)

        
             
               
           <div class="card card-shadow" style="width: 100%;cursor: pointer;" >
                 
                 <div class="card-body"> 
                 <h2  class="title font-medium m-t-0"><a class="text-dark" href="#"></a>{{ $lecture->name }}</h2> 
                  <div class="text-dark marked-input" >   
                     {!! $lecture->description !!}
                  </div>
                  @if($lecture->active)
                    <a target="_blank" href="{{ $lecture->link }}" class="btn btn-primary"><i class="fa fa-play-circle"></i> &nbsp; Watch Lecture</a>
                  @else
                     <p class="m-b-0 font-medium text-primary">Lecture on : {{ $lecture->date }}, {{ $lecture->start_time }}</p>
                  @endif
                  </div>

                  <div class="card-footer bg-danger" style="padding: 2px;"></div>
                </div>
              
           
              
           @endforeach
    


          {{ $lectures->links() }}

          <br><br>
          </div>
</div>
   


     



@endsection

@section('js')

<script type="text/javascript">
  var buffer = document.querySelector('.marked-input');
  
  MathJax.Hub.Queue(
      ["Typeset",MathJax.Hub,buffer],
      ["PreviewDone",function() {
        text = $('.marked-input').html();
  
        text = md.render(text) ;
        
        $('.marked-input').html(text);
      }]
    );

  
</script>

@endsection


