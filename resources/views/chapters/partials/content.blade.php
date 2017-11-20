
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


        <ul id="myTab" class="nav nav-tabs boot-tabs">
           <li class="active"><a href="#home" data-toggle="tab">Transcript</a></li>
           <li><a href="#profile" data-toggle="tab">Homework</a></li>
           <li><a href="#notes" data-toggle="tab">Notes</a></li>
           <li><a href="#discuss" data-toggle="tab">Discuss</a></li>
        </ul>
        <div id="myTabContent" class="tab-content  mb-30">
          <div class="tab-pane fade in active" id="home">
             
              <div class="course-single-item bg-white border-1px clearfix">
                
              <div class="course-details clearfix">

                  <p class="course-description" style="font-size: 17px;">
                      
                        <ul id="transcriptMessages"  style="" ></ul>

                        

                  </p>

                </div>


              </div>  
          </div>
          <div class="tab-pane fade" id="profile">
             @include('chapters.homework.index')
          </div>
          <div class="tab-pane fade" id="notes">
            @include('chapters.notes.index')
          </div>
          <div class="tab-pane fade" id="discuss">
            <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
          </div>
        </div> 


       



  </div>


