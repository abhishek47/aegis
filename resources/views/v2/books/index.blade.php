@extends('v2.layouts.master')
@section('content')

<div class="banner-innerpage" style="background: url('/images/bg/bg-pattern.png'); background-size: cover;height: 240px;padding: 0;">
               <div class="overlay" style="height: 300px;background: rgba(0, 173, 10, 0.7);">
                <div class="container">
                    <!-- Row  -->
                    <div class="row justify-content-center ">
                        <!-- Column -->
                        <div class="col-md-6 align-self-center text-center m-t-40 aos-init aos-animate" data-aos="fade-down" data-aos-duration="1200">
                            <h1 class="title p-t-30">Solved Books</h1> </div>
                        <!-- Column -->
                    </div>
                </div>
                </div>
            </div>
<div class="bg-white mini-spacer" style="min-height: 1000px;">

  <div class="container ">
   
    <?php $bookChunks = $books->chunk(3); ?>
    @foreach($bookChunks as $bookChunks)
    <div class="row mt-4">
   
      @foreach($bookChunks as $index => $book)
      
      <div class="col-md-6" id="classrooms">
        <div class="card card-shadow" style="cursor: pointer;" @click="openLink('/books/{{$book->id}}')">
         
            
          <div class="card-body">


            <div style="width: 45%;float: left;">
                  <img style="margin-top: -50px;box-shadow: 0px 0px 30px rgba(115, 128, 157, 0.4);" src="{{ isset($book->image) ? Storage::disk('s3')->url($book->image) : 'http://via.placeholder.com/350x150' }}" style="width: 80%;height: 240px;">
                </div>

             <div style="width: 50%;float: left;padding-left: 0px;">   
            <h4 class="card-title" style="font-size: 24px;">
            <a style="color: #000;" href="/books/{{$book->id}}">{{ $book->title }}</b></a> <br>
            <span style="font-size: 14px;color: #c3c3c3;">by {{ $book->authors }}</span>
            
            
            </h4>

            <p>{{ substr($book->short_description, 0, 100) }}...</p>
            </div>
            
            <div class="clearfix"></div>

            <div style="margin-top: 20px;">
              <a href="/books/{{$book->id}}" style="margin: 0 auto;display: block;background: transparent;border: 2px solid #316ce8;color: #316ce8" class="btn btn-primary btn-border">Read Book</a>
            </div>
            
            
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