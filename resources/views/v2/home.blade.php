@extends('v2.layouts.master')

@section('css')

   <link rel="stylesheet" type="text/css" href="/css/problems.css">

   <style type="text/css">
     .lastQuestion {
      display: none !important;
     }
   </style>

@endsection

@section('content')

<div class="mini-spacer bg-light" style="min-height: 1000px;">

<div  class=" pt-3">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-12">
                      <div class="card card-shadow " id="">
                        <div class="card-header bg-info" style="padding: 3px;">
                               
                            </div>
                        <div class="card-body font-light">

                            
                               
                               <h4 class="font-bold float-left">Problems of the Week

                                </h4>

                                <form method="GET" class="float-right">
                               <select name="week" class="week-selector form-control" onchange="this.form.submit()">

                                  @foreach($weeks as $week)
                                   <option value="{{ $week }}" {{ request('week') != null ? (request('week') == $week ? 'selected' : '') : $problemOfWeek->start_date == $week  ? 'selected' : '' }}>
                                    Week of {{ \Carbon\Carbon::parse($week)->format('jS \o\f F, Y') }}</option>
                                  @endforeach
                                   
                               </select>
                           </form> 
                           
                           

                           

                           
                            
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
    
        
          <div class="container" id="contact">
    <div class="card card-shadow bg-dark m-t-40"  @click="openWiki({{$wiki->id}})">
                    <div class="card-body">
                        <div class="d-flex p-10 p-t-0">
                            <div class="display-7 align-self-center">
                                <h2 class=""><a class="text-white" href="/wiki/{{$wiki->id}}">{{ substr($wiki->title, 0, 220) }}</a></h2>
                                <p class="font-20">Read our Wiki of the Week</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
                </div>
    </div>
   





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

        

</div>

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
