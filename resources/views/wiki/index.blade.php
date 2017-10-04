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
      <div class="container pt-70 pb-40">
        <div class="section-content">
         <?php $wikiChunks = $wikis->chunk(3); ?>

		  @foreach($wikiChunks as $wikiG)
		


          <div class="row multi-row-clearfix">



			@foreach($wikiG as $index => $wiki)


	            <div class="col-sm-6 col-md-4">
	              <article class="post clearfix mb-30 bg-lighter">
	                <div class="entry-header">
	                                  
	                  <div class="entry-date media-left text-center flip bg-theme-colored border-top-theme-colored2-3px pt-5 pr-15 pb-5 pl-15">
	                    <ul>
	                      <li class="font-16 text-white font-weight-600">28</li>
	                      <li class="font-12 text-white text-uppercase">Feb</li>
	                    </ul>
	                  </div>
	                </div>
	                <div class="entry-content p-15">
	                  <div class="entry-meta media no-bg no-border mt-0 mb-10">
	                    <div class="media-body pl-0">
	                      <div class="event-content pull-left flip">
	                        <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="/wiki/{{$wiki->id}}">{{ $wiki->title }}</a></h4>
	                        
	                      </div>
	                    </div>
	                  </div>
	                  <a class="btn btn-colored btn-theme-colored2 btn-flat font-12 mt-10 ml-5" href="/wiki/{{$wiki->id}}"> Read This</a>
	                </div>
	              </article>
	            </div>
	            
	            @endforeach

		      </div>

	      @endforeach

        </div>
      </div>
    </section>


   

     



@endsection