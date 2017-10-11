@extends('layouts.master')


@section('content')
    
      <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="images/bg/bg1.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Wiki Pages</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="#">Home</a></li>
                <li class="active">Wiki</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

     <!-- Section: Events Grid -->
    <section>
    <section id="courses" class="bg-silver-deep">
         <div class="container pb-0">
          <h2 class="text-uppercasetext-theme-colored mt-0 mt-sm-30">Daily <span class="text-theme-colored2">Articles</span></h2>
	            <div class="double-line-bottom-theme-colored-2"></div>
        
         <?php $wikiChunks = $wikis->chunk(2); ?>

		  @foreach($wikiChunks as $wikiG)
		


          <div class="row multi-row-clearfix">



			@foreach($wikiG as $index => $wiki)

            <div class="item">
              <div class="course-single-item bg-white border-1px clearfix mb-30 col-md-12">
               
                <div class="course-details clearfix p-20 pt-15">
                  <div class="course-top-part pull-left mr-40">
                    <a href="/wiki/{{$wiki->id}}"><h3 class="mt-0 mb-5">{{ $wiki->title }}</h3></a>
                    <ul class="list-inline">
                      <li class="review-stars text-theme-colored2">
                        {{ $wiki->created_at->format('d, M Y') }}
                      </li>
                    </ul>
                  </div>
                  
                 
                </div>
              </div>
            </div>
            
           @endforeach
        </div>

        @endforeach

	        {{ $wikis->links() }}

	        <br><br>


      </div>
    </section>


	            

   

     



@endsection