
<section class="inner-header divider " style="background-color: #24324a !important" >
      <div class="container pt-30 pb-30">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-light font-36">{{ $chapter->title }}</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="#">Home</a></li>
                <li><a href="#">Chapters</a></li>
                 <li><a href="#">{{ $chapter->title }}</a></li>
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
                          <h3 class="mt-0 mb-5"><b>Chapter Summary</b></h3>
                        </div>

                       
                        
                        <div class="clearfix"></div>
                        <p class="course-description mt-10" style="font-size: 17px;">
                          {{ $chapter->description }}
                        </p>

                      </div>


        </div>

        <div class="page-header">
          <h3>Transcript</h3>
        </div>

         <div class="course-single-item bg-white border-1px clearfix mb-30">
          
        <div class="course-details clearfix">

                        <p class="course-description" style="font-size: 17px;">
                            
                              <ul id="transcriptMessages"  style="" ></ul>

                              

                        </p>

                      </div>


        </div>  



  </div>


