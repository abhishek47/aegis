@extends('layouts.master')


@section('content')
    
   

    
    <section class="heading">
     <div class="container pb-0 pt-5">
          <h2 style="font-weight: bold;">Topical Wiki Pages</h2>
          <hr>
	     </div>        
    </section>   
     
		




			@foreach($wikis as $index => $wiki)

              <div class="container">
                <div>
                  <div class="card bg-light" style="width: 100%;cursor: pointer;" @click="openWiki({{ $wiki->id }})">
                    <div class="card-body">
                      <h4 class="card-title">{{ $wiki->title }}</h4>
                     
                    </div>
                  </div>
                </div>
              </div>
              
              <br>
            
           @endforeach
    


	        {{ $wikis->links() }}

	        <br><br>


     


	            

   

     



@endsection