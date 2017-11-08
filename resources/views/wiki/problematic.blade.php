@extends('layouts.master2')


@section('content')
    
   

    
    <section class="heading">
     <div class="container pb-0">
          <h2 style="font-weight: bold;" >Problematic Wikipages</h2>
          <hr>
          <div class="card card-body">
            
            <!-- Button trigger modal -->
            <a  data-toggle="modal" href="#exampleModalLong">
              Read about Problematic Wikipages
            </a>       

          </div>
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



<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title" id="exampleModalLongTitle">Problematic Wikipages</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body intro" style="max-height: 600px;overflow: scroll;">
        <p>Solving mathematical problems is an art and so is designing good mathe- matical problems. In fact, the latter is often harder. Like other art forms, it is impossible to lay down unanimous standards of quality here. But generally, a good problem should have a certain succinctness of form. Its statement should be easily accessible to those who have completed, say, the higher sec- ondary school (HSC). If at all it introduces some new definition or notation, they should be illustrated to make the statement crystal clear. This applies to its diction too. It should be precise but not clumsy. (It should not use ‘the house of which I am an owner’ instead of ‘my house’!) The solution should not follow as an obvious consequence of some standard result or trick.</p><p>
        A good problem should also be specific, and not open ended such as one asking for an investigation or exploration or a characterisation. Occasionally, a problem can ask if some statement is true or false. But that is more suitable for research. Also a good problem should refrain from generalisation. Often a generalisation is likely to detract its (possibly deceptive) simplicity and its appeal. Let the proud solver have the pleasure of saying ‘More generally, our solution shows that ....’. Again this is because a problem is different from a result in a research article.</p><p>
        A good problem often carries a built in hint. But again the degree of such a hint crucially affects its quality. Too faint a hint makes the problem dicey while too loud a hint reduces it to a drill. Sometimes asking a stronger assertion gives an unwarranted hint. An example is the problem to show that if 101 integers are picked from the integers 1 to 200, then among the selected integers there are two distinct ones such that the smaller divides the larger. One can, in fact, show that the ratio of these two integers is some power of 2. But that would spoil the problem.</p><p>
        Comparatively, there are less controversies about solutions. The sine qua non of a solution, is, of course, that it should solve the problem! And there are people who think that is all there is to it. To some extent this view is justified, if solving problems is considered as a sport, especially a competitive sport such as the various mathematics Olympiads. Even when viewed as an art, an artist is not supposed to say much about his/her own work. His/her statement ought to end with the work itself. The solver rarely 1 reveals his/her thought process or the attempts that were tried, especially the ones that failed. It is only the final success that gets recorded.</p><p>
        That’s where a commentator or a critique comes in. His job is not to produce artists or sportsmen. Proverbially, they are born. But a good com- mentator can abridge the gap between these gifted persons and the laymen and thereby enhance the appreciation of the former’s achievements by the latter. This is especially true for mathematics where the building blocks of the art forms are pieces of deductive reasoning.</p><p>
        But while this may be all right in sports, a lot is missed. To really ap- preciate the subtleties of a solution, the reader must be sufficiently mature. When this is not the case, somebody has to train the reader, by pointing out some tempting attempts that are destined to fail. Very frequently, the same problem has several solutions, varying widely in terms of their approach, ranging from very sophisticated to very elementary but tricky. Some of the solutions are applicable to other similar problems. A comparative study of their merits and demerits builds up the mathematical maturity of the reader and often inspires him/her to try his/her hand on some other problems, and sometimes, even to pose good problems to others.
        The present wikipages are a humble attempt to create such a mathemat- ical culture by writing commentaries on selected problems. They are an outgrowth of the author’s annual educative commentaries on the mathemat- ics sections of the JEE (Joint Entrance Examination) from 2003 onwards and the commentaries on the entrance tests of the ISI (Indian Statistical Institute) for their B.Sc. programmes in Mathematics/Statistics from 2014 onwards. Although the problems are of the HSC level and of direct relevance only to the aspirants of these and similar tests, many persons who are well past that stage have reported that they enjoy reading these commentaries. Some of them have attributed their revival of interest in mathematics to these commentaries even though they do not need this mathematics in their professions.</p><p>
        Some of the problems chosen in these wikipages are at a slightly higher level. Still, they should be accessible to a genuinely interested reader. Nor- mally, each wikipage will cater to a single problem or to a bunch of several related problems. Readers’ comments are invired and may be sent to the au- thor by e-mail at kdjoshi314@gmail.com or by a WhatsApp message to the mobile number 9819961036. They may also suggest problems for inclusion.
        Unless otherwise stated, all the references are to the author’s Educative JEE Mathematics, published by the Universities Press, Hyderabad.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
	            

   

     



@endsection


@section('jquery')

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>


@endsection