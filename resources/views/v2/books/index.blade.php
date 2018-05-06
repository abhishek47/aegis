@extends('v2.layouts.master')
@section('content')
<div class="bg-light mini-spacer" style="min-height: 1000px;">
  <div class="container ">
    <div class="card card-shadow">
      <div class="card-header bg-info">
        
      </div>
      <div class="card-body  classroom-description">
        
          <h2 class="card-title"><a class="text-dark m-b-10" data-toggle="collapse" href="#desc"><b>What are Live Courses <i class="fa fa-chevron-down"></i></b></a></h2>
     
        
          <div class="collapse" id="desc">
           {!! \Config::get('settings.solved_books_desc') !!}
          </div>
       
      </div>
    </div>
    <?php $bookChunks = $books->chunk(3); ?>
    @foreach($bookChunks as $bookChunks)
    <div class="row mt-4">
   
      @foreach($bookChunks as $index => $book)
      
      <div class="col-md-4" id="classrooms">
        <div class="card card-shadow" style="cursor: pointer;" @click="openLink('/books/{{$book->id}}')">
          <div class="card-header bg-success text-white font-medium">
           
           <p class="m-b-0">{{$book->chapters()->count()}} Chapters</p>
          </div>
            <div style="width: 100%;">
                  <img src="{{ isset($book->image) ? Storage::disk('s3')->url($book->image) : 'http://via.placeholder.com/350x150' }}" style="width: 100%;height: 300px;">
                </div>
          <div class="card-body">

            <h4 class="card-title">
            <a href="/books/{{$book->id}}">{{ $book->title }}</b></a>
            
            
            </h4>
            
            <div class="clearfix"></div>
            <p class="course-description " style="font-size: 17px;">{{ substr($book->short_description, 0, 100) }}...</p>
            
          </div>

          
        </div>
      </div>
      
      @endforeach
      
    </div>
    @endforeach
    {{ $books->links() }}
    <br><br>
  </div>
  
</div>
@endsection
@section('js')
@endsection