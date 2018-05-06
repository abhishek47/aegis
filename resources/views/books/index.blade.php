@extends('layouts.master')



@section('content')



<section class="inner-header divider " style="background-color: #24324a !important" >
      <div class="container pt-30 pb-30">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-light font-36">Solved Books</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="/">Home</a></li>
                <li><a href="#">Solved Books</a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>




<div style="background-color: #fff;min-height: 900px;">

  <div class="container pt-50">

  <div class="course-single-item bg-white border-1px clearfix mb-30">
    <div class="course-thumb">
                  <div class="price-tag">Info</div>
                </div>
  <div class="course-details clearfix p-20 pt-15">

                  <div class="course-top-part pull-left mr-40">
                    <h3 class="mt-0 mb-5"><b>What are Solved Books?</b></h3>
                  </div>

                 
                  
                  <div class="clearfix"></div>
                  <p class="course-description mt-10" style="font-size: 17px;">
                      {!! \Config::get('settings.solved_book_desc') !!}
                  </p>

                </div>


  </div>




    <?php $bookChunks = $books->chunk(3); ?>

        @foreach($bookChunks as $bookChunk)
          <div class="row mt-4">

              @foreach($bookChunk as $index => $book)
              
                 <div class="col-md-4" id="classrooms">
                   <div class="course-single-item bg-white border-1px clearfix mb-30" style="cursor: pointer;" @click="openLink('/books/{{$book->id}}')">
                <div style="width: 100%;">
                  <img src="http://via.placeholder.com/350x150" style="width: 100%;height: 260px;">
                </div>

                <div class="course-details clearfix p-20 pt-15">
                  <div class="course-top-part pull-left mr-40">
                    <a href="/books/{{$book->id}}"><h4 class="mt-0 mb-2"><b>{{ $book->title }}</b></h4></a>
                  </div>
                  
                  <div class="clearfix"></div>
                  <p class="course-description mt-0" style="font-size: 17px;">{{ substr($book->description, 0, 100) }}...</p>
                  
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