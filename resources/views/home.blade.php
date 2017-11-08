@extends('layouts.master2')

@section('css')

   <link rel="stylesheet" type="text/css" href="/css/problems.css">

@endsection

@section('content')

<section  class="pt-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       
                        
                    </div>
                    <div class="col-md-12">
                        <div class="card mb-3 problem-of-week">
                          <div class="card-header text-light bg-primary" >
                           <h4 class="font-weight-bold mb-0 mt-1 float-left"> Problems of the Week </h4>
                           
                           <form method="GET" class="float-right">
                               <select name="week" class="week-selector form-control" onchange="this.form.submit()">

                                   <option value="2017-11-1" {{ request('week') == '2017-11-1' ? 'selected' : '' }}>1st Week of November</option>
                                    <option value="2017-11-2" {{ request('week') == '2017-11-2' ? 'selected' : '' }}>4th Week of October</option>
                               </select>
                           </form> 
                           <!--
                           <div class="btn-group float-right" data-toggle="buttons">
                              <label class="btn btn-sm btn-outline-white text-light active mb-0">
                                <input type="radio" name="options" id="option1" autocomplete="off" checked> Routine
                              </label>
                              <label class="btn btn-sm btn-outline-white text-light  mb-0">
                                <input type="radio" name="options" id="option2" autocomplete="off"> Moderate
                              </label>
                              <label class="btn btn-sm btn-outline-white text-light  mb-0">
                                <input type="radio" name="options" id="option3" autocomplete="off"> Challenging
                              </label>
                            </div>
                           --> 
                          </div>
                          <div class="card-body">
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
    
        
        <section class="pt-3">
            <div class="container">
                <div>
                    <div class="card text-light" style="width: 100%;background: #22313F;cursor: pointer;" 
                     @click="openWiki({{ $wiki->id }})">
                        <div class="card-body">
                            <h4 class="card-title">{{ $wiki->title }}</h4>
                            <p class="card-text">wiki of the week</p>
                            <a href="/wiki/{{$wiki->id}}" class="btn btn-primary">Read Wiki</a>
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

        <section  class="pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div style="width: 100%;margin-bottom: 20px;">
                            <h3 class="font-weight-bold">Latest Courses</h3>
                            <hr>
                        </div>
                        
                    </div>
                    <div class="col-md-4" id="classrooms">
                        <div class="card text-light" style="background: #C0392B;">
                            <div class="card-body">
                                <h4 class="card-title">Course Name</h4>
                                <p class="card-text">The short course description</p>
                                <a href="classroom.html" class="btn btn-dark">Start Course</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" id="classrooms">
                        <div class="card text-light" style="background: #663399;">
                            <div class="card-body">
                                <h4 class="card-title">Course Name</h4>
                                <p class="card-text">The short course description</p>
                                <a href="classroom.html" class="btn btn-dark">Start Course</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" id="classrooms">
                        <div class="card text-light" style="background: #019875;">
                            <div class="card-body">
                                <h4 class="card-title">Course Name</h4>
                                <p class="card-text">The virtual classoom from AEGIS</p>
                                <a href="classroom.html" class="btn btn-dark">Join Course</a>
                            </div>
                        </div>
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
