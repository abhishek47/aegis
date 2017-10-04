function aegismarked(text)
{
		
		//Example	
		text = text.replace(/&lt;startexample&gt;/g,'<div class="panel panel-default example"> \r\n \
			    <div class="panel-body" style="padding:0px;padding-top:15px;"><small style="padding-left:15px;" class="text-muted">EXAMPLE</small>\r\n<div style="padding-left:15px;">').replace(/&lt;endexample&gt;/g, '</div></div>\r\n</div>');
         
        //Solution	
		text = text.replace(/&lt;startsolution&gt;/g,'</div><div class="panel panel-default solution" style="margin-bottom: 0px;"> \r\n \
			    <div class="panel-body"><small class="text-muted">SOLUTION</small>\r\n<div>').replace(/&lt;endsolution&gt;/g, '</div></div>\r\n</div>');
         


		// Defintion
        text = text.replace(/&lt;startdefinition&gt;/g,'<div class="panel panel-default definition"> \r\n \
			    <div class="panel-body"><small class="text-muted">DEFINITION</small>\r\n<div>').replace(/&lt;enddefinition&gt;/g, '</div></div>\r\n</div>');



        // Proof
        text = text.replace(/&lt;startproof&gt;/g,'</div><div class="panel panel-default proof" style="margin-bottom: 0px;"> \r\n \
			    <div class="panel-body"><small class="text-muted">PROOF</small>\r\n<div>').replace(/&lt;endproof&gt;/g, '</div></div>\r\n</div>');
        


         // Question
        text = text.replace(/&lt;startquestion-(\d+)&gt;/g,'<div class="slickQuiz" id="slickQuiz-$1" data-id="$1">\r\n \
					    <h1 class="quizName"></h1>\r\n \
					    <div class="quizArea">\r\n \
					        <div class="quizHeader"> \
					            <a class="startQuiz" href="">Get Started!</a> \
					        </div> \
					    </div> \
					    <div class="quizResults"> \
					        <h3 class="quizScore">You Scored: <span></span></h3> \
					        <h3 class="quizLevel"><strong>Ranking:</strong> <span></span></h3> \
					        <div class="quizResultsCopy"></div> \
					    </div>').replace(/&lt;\/endquestion&gt;/g, '</div>');
       


        // Theory
        text = text.replace(/&lt;starttheorem&gt;/g,'<div class="panel panel-default theorem"> \r\n \
			    <div class="panel-body" style="padding:0px;padding-top:15px;"><small class="text-muted" style="padding-left:15px;">THEOREM</small>\r\n<div style="padding-left:15px;">').replace(/&lt;endtheorem&gt;/g, '</div></div>\r\n</div>');

         // Theory
        text = text.replace(/&lt;startbox&gt;/g,'<div class="panel panel-default box"> \r\n \
			    <div class="panel-body">\r\n<div>').replace(/&lt;endbox&gt;/g, '</div></div>\r\n</div>');

        text = text.replace(/&lt;startcenter&gt;/g,'<p class="text-center">').replace(/&lt;endcenter&gt;/g, '</p>');

        text = text.replace(/&lt;hr-(\d+)&gt;/g, "<hr style=\"height:$1px;\"");
        
        text = text.replace(/&lt;/g, '<').replace(/&gt;/g, '>');

       
         return text;
         
}