@extends('layouts.master')

@section('css')

   <link rel="stylesheet" type="text/css" href="/css/problems.css">

@endsection

@section('content')

<section  class="pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       
                        
                    </div>
                    <div class="col-md-12">
                      <div class="course-single-item bg-white border-1px clearfix mb-30 week-box problem-week" id="">
              
            <div class="course-details clearfix p-20 pt-15">

                            <div class="course-top-part pull-left mr-40">
                               <h4 class="font-weight-bold mb-0 mt-1 pull-left"><span class="p-week-title"> Problems of the Week</span>

                               <form method="GET" class="pull-right">
                               <select name="week" class="week-selector form-control" onchange="this.form.submit()">

                                  @foreach($weeks as $week)
                                   <option value="{{ $week }}" {{ request('week') != null ? (request('week') == $week ? 'selected' : '') : $problemOfWeek->start_date == $week  ? 'selected' : '' }}>
                                    Week of {{ \Carbon\Carbon::parse($week)->format('jS \o\f F, Y') }}</option>
                                  @endforeach
                                   
                               </select>
                           </form>  </h4>
                           
                           

                            </div>

                           
                            
                            <div class="clearfix"></div>
                           <div class="slickQuiz" id="slickQuiz-{{$problemsId}}" data-id="{{$problemsId}}">
                                <h1 class="quizName"></h1>
                                <div class="quizArea">
                                    <div class="quizHeader"> 
                                        <a class="startQuiz" href="">Get Started!</a> 
                                    </div> 
                                </div> 
                                <div class="quizResults"> 
                                    <h3 class="quizScore">You Scored: <span></span></h3> 
                                    <h3 class="quizLevel"><strong>Ranking:</strong> <span></span></h3> 
                                    <div class="quizResultsCopy"></div> 
                                </div>
                          </div>
                          </div>


            </div>
                        
                
                
                </div>
            </div>
        </div>
    </div>
</section>
    
        
     
    <section class="mb-30 wikiOfDay" style="cursor: pointer;" @click="openWiki({{$wiki->id}})">
     <div class="container" style="padding-top: 0px;">
      <div class="call-to-action pt-40 pb-40 mb-20 bg-theme-colored">
        <div class="row">
          <div class="col-xs-12 col-sm-8 col-md-8">
            <div class="icon-box icon-rounded-bordered left media mb-0 ml-60 ml-sm-0"> 
            <a class="media-left pull-left flip hidden-xs" href="#"> <i class="pe-7s-notebook text-white border-1px p-20"></i></a>
              <div class="media-body">
                <h3 class="media-heading heading text-white font-12 wiki-label">Wiki of the Week</h3>
                <p class="text-white wiki-title">{{ $wiki->title }}</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4 text-center"> 
            <a href="/wiki/{{$wiki->id}}" class="btn btn-flat btn-default btn-xl mt-20">Read Wiki Page</a> 
          </div>
        </div>
       </div>
      </div>
    </section>





<!--

<section class="pt-5">
    <div class="container">
            <div style="width: 100%;margin-bottom: 20px;">
                <h3 class="font-weight-bold">Communities</h3>
                <hr>
            </div>
            <div class="card ">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Classrooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Wiki Pages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Problems</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-link">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a>
                    <a href="#" class="btn btn-link">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a>
                    <a href="#" class="btn btn-link">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a>
                    <a href="#" class="btn btn-link">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a>
                    <a href="#" class="btn btn-link">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a>
                    <a href="#" class="btn btn-link">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a>
                </div>
            </div>
        
    </div>
</section>
-->

         <section class="layer-overlay overlay-white-9" data-bg-img="images/bg/bg-pattern.png" style="background-image: url(&quot;images/bg/bg-pattern.png&quot;);">
      <div class="container pb-40">
         
        <div class="section-content">
          <div class="row">
            <div class="col-md-3">
              <div class="icon-box hover-effect border-1px border-radius-10px text-center bg-white p-15 pt-40 pb-30">
                <a href="/courses" class="icon icon-circled icon-lg" data-bg-color="#FC9928" style="background: rgb(252, 153, 40) !important;">
                  <i class="pe-7s-study text-white font-48"></i>
                </a>
                <h4 class="icon-box-title text-uppercase letter-space-1 font-20 mt-15"><a href="/courses">1. View Online Courses</a></h4>
                <p class="">Choose from our huge library of courses, enroll into them and get into an interactive live learning session, like a real classroom.</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="icon-box hover-effect border-1px border-radius-10px text-center bg-white p-15 pt-40 pb-30">
                <a href="/wiki" class="icon icon-circled icon-lg" data-bg-color="#43B14B" style="background: rgb(67, 177, 75) !important;">
                  <i class="pe-7s-notebook text-white font-48"></i>
                </a>
                <h4 class="icon-box-title text-uppercase letter-space-1 font-20 mt-15"><a href="/wiki">2. Read Our Wiki Pages</a></h4>
                <p class="">Once you learn about the course through our live sessions, move to our wiki pages to read and sharpen the learnt knowledge.</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="icon-box hover-effect border-1px border-radius-10px text-center bg-white p-15 pt-40 pb-30">
                <a href="/ajax/quiz-info.html" class="icon icon-circled icon-lg ajaxload-popup"  data-bg-color="#00C3CB" style="background: rgb(0, 195, 203) !important;">
                  <i class="pe-7s-diamond text-white font-48"></i>
                </a>
                <h4 class="icon-box-title text-uppercase letter-space-1 font-20 mt-15"><a href="/ajax/quiz-info.html" class="ajaxload-popup">3. Practice Questions</a></h4>
                <p class="">Practice makes man perfect, hence we have a set of practice questions in each wiki page to practice that set of course.</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="icon-box hover-effect border-1px border-radius-10px text-center bg-white p-15 pt-40 pb-30">
                <a href="/discuss" class="icon icon-circled icon-lg" data-bg-color="#EF5861" style="background: rgb(239, 88, 97) !important;">
                  <i class="pe-7s-medal text-white font-48"></i>
                </a>
                <h4 class="icon-box-title text-uppercase letter-space-1 font-20 mt-15"><a href="/discuss">4. Post Your Doubts</a></h4>
                <p class="">Afterall, if you still got doubts, visit our discuss section to post your queries and get it cleared from other experts around.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



@endsection

@section('js')

<script type="text/javascript">

        var qid = {{ $problemsId }};

        axios.get('/quiz/'+qid).then(function(response) {
          console.log(response.data);

          $('#slickQuiz-'+qid).slickQuiz({
            json: response.data
           });

            MathJax.Hub.Queue(
              ["Typeset",MathJax.Hub,document.getElementById('slickQuiz-'+qid)],
              function() {
                
                   
                  console.log('Done');
              }
            );
    });
  

</script>

<script type="text/javascript" src="/js/problems.js"></script>



@endsection
