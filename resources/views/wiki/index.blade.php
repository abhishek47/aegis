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


	            <div class="col-sm-6 col-md-6">
	             <article>
                  <div class="event-block">
                    <div class="event-date text-center">
                      <ul class="text-white font-18 font-weight-600">
                        <li class="border-bottom">{{ $wiki->created_at->format('d') }}</li>
                        <li class="">{{ $wiki->created_at->format('M') }}</li>
                      </ul>
                    </div>
                    <div class="event-meta border-1px pl-40">
                      <div class="event-content pull-left flip">
                        <h4 class="event-title media-heading font-roboto-slab font-weight-700"><a href="/wiki/{{ $wiki->id }}">{{ substr($wiki->title, 0, 70) }}...</a></h4>
                        <a class="btn btn-colored btn-theme-colored2 btn-flat font-12 mt-10 ml-5 pull-right" href="/wiki/{{$wiki->id}}"> Read This</a>
                      </div>
                    </div>
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