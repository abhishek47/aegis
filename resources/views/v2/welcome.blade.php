@extends('v2.layouts.master')
@section('content')
<!-- ============================================================== -->
<!-- Slider  -->
<!-- ============================================================== -->
<div class="bg-light">
	<section id="slider-sec" class="slider2">
		<div id="slider2" class="carousel bs-slider slide  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="7000">
			<!-- Wrapper For Slides -->
			<div class="carousel-inner" role="listbox">
				<div class="carousel-item active" style="background: url('/images/bg/bg-pattern.png'); background-size: cover;height: 500px;">
				 <div class="overlay" style="height: 500px;background: rgba(0, 173, 10, 0.7);">
					<!-- Slide Background -->
					<!-- Slide Text Layer -->
					<div class="slide-text">
						<div class="col-sm-7">
							
							<h2  data-animation="animated zoomInRight" class="title text-white">IF YOU LOVE <span class="text-primary-gradiant">CHALLENGING</span> PROBLEMS YOU ARE AT THE RIGHT PLACE</h2> </div>


							
						
							</div>

							
								
								<img class="hero" src="/images/hero.png">
							
							


							
						</div>
						<!-- End of Slide -->
						
						<!-- End of Wrapper For Slides -->
						</div>
					</div>
				</div>
				<!-- End Slider -->
				
			</section>
		</div>
		<!-- ============================================================== -->
		<!-- End Slider 1  -->
		<!-- ============================================================== -->
		<div class="mini-spacer feature1" >
			<div class="container">
				
				<!-- Row  -->
				<div class="row">
					<!-- Column -->
					<div class="col-md-4 wrap-feature1-box wrap-feature-box-step">
						<div class="" data-aos="fade-right" data-aos-duration="1200">
							<div class="card-body text-center">
								<div class="icon-space"><img style="width: 80px;" src="/images/icons/online.png" alt="online" /></div>
								<h5 class="font-medium">Online Courses</h5>
								<p class="m-t-20  text-dark">Enroll into our curated courses and virtual classrooms and get yourself clear with your concepts.</p>
							</div>
						</div>
					</div>
					<!-- Column -->
					<div class="col-md-4 wrap-feature1-box wrap-feature-box-step">
						<div class="" data-aos="fade-up" data-aos-duration="1200">
							<div class="card-body text-center">
								<div class="icon-space"><img style="width: 80px;" src="/images/icons/book.png" alt="wiki" /></div>
								<h5 class="font-medium">Wiki Pages</h5>
								<p class="m-t-20  text-dark">Read our uniquely made wiki pages and sharpen your knowledge of your learnt topics.</p>
							</div>
						</div>
					</div>
					<!-- Column -->
					<div class="col-md-4 wrap-feature1-box">
						<div class="" data-aos="fade-left" data-aos-duration="1200">
							<div class="card-body text-center">
								<div class="icon-space"><img style="width: 80px;" src="/images/icons/graduate.png" alt="practice" /></div>
								<h5 class="font-medium">Practice Problems</h5>
								<p class="m-t-20  text-dark">Once you learn practice is must hence we provide an intensive set of practice problems to learn.</p>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<div class="mini-spacer feature19 p-b-0">
                    <div class="container">
                        <!-- row  -->
                        <div class="row">
                       	 <div class="col-lg-6 text-center">
                                <img src="images/about/1.png" alt="wrappixel" class="img-responsive" >
                            </div>

                            <div class="col-lg-6 align-self-center">
                                <h2 class="title">About <b>AEGIS</b></h2>
                                <h6 class="subtitle text-dark">Aegis Academy is started by young educators to provide high - quality education at affordable price. Almost every country conducts several exams to hunt extraordinary problem - solving skilled students.Olympiads are the most prestigious exam among them.</h6>

                                <h6 class="subtitle text-dark">Preparation for olympiads is exciting and challenging. Due to lack of resources and high - quality education, many students coudn't hone their problem-skills. We are here to fill this gap</h6>

                                <h6 class="subtitle text-dark">First, we are starting with the training for maths olympiads and other contests based on maths. Later, we shall add more subjects. We prepare the students for the following exams.</h6>
                                
                               
                            </div>
                            
                        </div>
                    </div>
                </div>

<div class="container">
		<div class="mini-spacer card card-shadow bg-dark m-t-40"  @click="openWiki({{$wikiOfDay->id}})">
                    <div class="card-body">
                        <div class="d-flex p-10 p-t-0">
                            <div class="display-7 align-self-center">
                                <h2 class=""><a class="text-white" href="/wiki/{{$wikiOfDay->id}}">{{ substr($wikiOfDay->title, 0, 220) }}</a></h2>
                                <h6 class="font-16 subtitle">Read our Wiki of the Week</h6>
                            </div>
                            <div class="ml-auto m-t-10 m-b-10"><a href="/wiki/{{$wikiOfDay->id}}" class="btn btn-info-gradiant btn-md btn-arrow"><span>Read Now <i class="fa fa-arrow-right"></i></span></a></div>
                        </div>
                    </div>
                </div>
                </div>



                <div class="bg-white feature5" style="background: url('/images/bg/bg-pattern.png');background-size: cover;margin-top: 120px;">
                 <div class="overlay mini-spacer">
    <div class="container">
        
        <!-- Row  -->
        <div class="row">
            <!-- Column -->
            <div class="col-md-4 wrap-feature5-box">
                <div class="card card-shadow" data-aos="fade-right" data-aos-duration="1200">
                    <div class="card-body d-flex">
                        <div class="icon-space"><i class="text-success-gradiant icon-Stopwatch"></i></div>
                        <div class="">
                            <h6 class="font-medium"><a href="javascript:void(0)" class="linking">Virtual Classrooms</a></h6>
                            <p class="m-t-20">You can relay on our amazing features list and also our customer services.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-4 wrap-feature5-box">
                <div class="card card-shadow" data-aos="fade-down" data-aos-duration="1200">
                    <div class="card-body d-flex">
                        <div class="icon-space"><i class="text-success-gradiant icon-Information"></i></div>
                        <div class="">
                            <h6 class="font-medium"><a href="javascript:void(0)" class="linking">Forums &amp; Communities </a></h6>
                            <p class="m-t-20">You can relay on our amazing features list and also our customer services.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-4 wrap-feature5-box">
                <div class="card card-shadow" data-aos="fade-left" data-aos-duration="1200">
                    <div class="card-body d-flex">
                        <div class="icon-space"><i class="text-success-gradiant icon-Leo-2"></i></div>
                        <div class="">
                            <h6 class="font-medium"><a href="javascript:void(0)" class="linking">Topical Wikis </a></h6>
                            <p class="m-t-20">You can relay on our amazing features list and also our customer services.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-4 wrap-feature5-box">
                <div class="card card-shadow" data-aos="fade-right" data-aos-duration="1200">
                    <div class="card-body d-flex">
                        <div class="icon-space"><i class="text-success-gradiant icon-Target-Market"></i></div>
                        <div class="">
                            <h6 class="font-medium"><a href="javascript:void(0)" class="linking">Problamatic Wikis</a></h6>
                            <p class="m-t-20">You can relay on our amazing features list and also our customer services.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-4 wrap-feature5-box">
                <div class="card card-shadow" data-aos="fade-up" data-aos-duration="1200">
                    <div class="card-body d-flex">
                        <div class="icon-space"><i class="text-success-gradiant icon-Sunglasses-Smiley"></i></div>
                        <div class="">
                            <h6 class="font-medium"><a href="javascript:void(0)" class="linking">Chat with Maths </a></h6>
                            <p class="m-t-20">You can relay on our amazing features list and also our customer services.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-4 wrap-feature5-box">
                <div class="card card-shadow" data-aos="fade-left" data-aos-duration="1200">
                    <div class="card-body d-flex">
                        <div class="icon-space"><i class="text-success-gradiant  icon-Laptop-Phone"></i></div>
                        <div class="">
                            <h6 class="font-medium"><a href="javascript:void(0)" class="linking">Fully Responsive</a></h6>
                            <p class="m-t-20">You can relay on our amazing features list and also our customer services.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            
        </div>
    </div>
    </div>
</div>
@endsection

@section('js')
	<script type="text/javascript">
		$('#slider2').bsTouchSlider();
	$(".carousel .carousel-inner").swipe({
	swipeLeft: function (event, direction, distance, duration, fingerCount) {
	this.parent().carousel('next');
	}
	, swipeRight: function () {
	this.parent().carousel('prev');
	}
	, threshold: 0
	});
	</script>
@endsection