@extends('layouts.master2')

@section('content')
<section  class="pt-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div style="width: 100%;margin-bottom: 20px;">
                            <h3 class="font-weight-bold">Practice Problems</h3>
                            <hr>
                        </div>
                        
                    </div>
                    <div class="col-md-12" id="classrooms">
                        <div class="card mb-3" style="">
                          <div class="card-header text-light bg-primary" >Problem Category</div>
                          <div class="card-body">
                            <h4 class="card-title">Primary Quesiton title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                            <a href="classrooms.html" class="btn btn-primary">Submit Solution</a>
                            <a href="classrooms.html" class="btn btn-dark">Discuss Solution</a>
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
