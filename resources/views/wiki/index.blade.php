@extends('layouts.master')


@section('content')
    
   

    
    <section class="heading">
     <div class="container pb-0 pt-5">
          <h2 style="font-weight: bold;">Topical Wiki Pages</h2>
          <hr>
	     </div>        
    </section>   
     
		




			@foreach($wikis as $index => $wiki)

           <section class="pt-3">
              <div class="container">
                <div>
                  <div class="card bg-light" style="width: 100%;cursor: pointer;" @click="openWiki({{ $wiki->id }})">
                    <div class="card-body">
                      <h4 class="card-title">{{ $wiki->title }}</h4>
                      <p class="card-text">{{ $wiki->created_at->diffForHumans() }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            
           @endforeach
    


	        {{ $wikis->links() }}

	        <br><br>


     
    </section>


	            

   

     



@endsection