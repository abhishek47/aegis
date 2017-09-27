function aegismarked(text)
{
		
		//Example	
		text = text.replace(/&lt;startexample&gt;/g,'<div class="panel panel-default example"> \r\n \
			    <div class="panel-body"><small class="text-muted">EXAMPLE</small>\r\n<div>').replace(/&lt;endexample&gt;/g, '</div></div>\r\n</div>');
         


		// Defintion
        text = text.replace(/&lt;startdefinition&gt;/g,'<div class="panel panel-default definition"> \r\n \
			    <div class="panel-body"><small class="text-muted">DEFINITION</small>\r\n<div>').replace(/&lt;enddefinition&gt;/g, '</div></div>\r\n</div>');



        // Proof
        text = text.replace(/&lt;startproof&gt;/g,'<div class="panel panel-default proof"> \r\n \
			    <div class="panel-body"><small class="text-muted">PROOF</small>\r\n<div>').replace(/&lt;endproof&gt;/g, '</div></div>\r\n</div>');
        


         // Question
        text = text.replace(/&lt;startquestion&gt;/g,'<div class="panel panel-success question" data-id="1"> \r\n \
			    <div class="panel-body"><small class="text-muted">Question</small>\r\n<div>').replace(/&lt;\/endquestion&gt;/g, '</div></div>\r\n</div>');
       


        // Theory
        text = text.replace(/&lt;starttheorem&gt;/g,'<div class="panel panel-default theorem"> \r\n \
			    <div class="panel-body"><small class="text-muted">THEOREM</small>\r\n<div>').replace(/&lt;endtheorem&gt;/g, '</div></div>\r\n</div>');
        
        

       
         return text;
         
}