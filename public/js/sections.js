toggleEditor = function() {
  		$('#editor--container').toggleClass('hidden');
  		$('#main--output').toggleClass('hidden');
  	}


 function editSection(id)
        {
            
            var divHtml = $("#section-" + id + "-body").html();

            // create a dynamic textarea
            var editor = $('<form />');
            editor.attr('id', "section-" + id + "-body");
            editor.attr('action', '/wiki/section/' + id);
            editor.attr('method', 'POST');

            var editableText = $("<textarea />");
            editableText.attr('class', 'form-control');
            editableText.attr('rows', '15');
            editableText.val(divHtml);

            editor.append(editableText);

            editor.append('<br><button class="btn btn-flat btn-primary" type="submit">Publish</button>');

            editor.append('<button onclick="closeEditing(' + id + ')" class="btn btn-flat btn-success" style="margin-left: 10px;" >Cancel</button>');
            // replace the div with the textarea
            $("#section-" + id + "-body").replaceWith(editor);

            $(editableText).blur(function() {
                // Preserve the value of textarea
                var html = $(this).val();
                // create a dynamic div
                var viewableText = $("<div>");
                viewableText.attr('id', "section-" + id + "-body");
                // set it's html 
                viewableText.html(html);
                // replace out the textarea
                editor.replaceWith(viewableText);
            });
        }  



function closeEditing(id)
{
     // Preserve the value of textarea
        var editor = $("#section-" + id + "-body");
        var html = $("#section-" + id + "-body textarea").val();
        // create a dynamic div
        var viewableText = $("<div>");
        viewableText.attr('id', "section-" + id + "-body");
        // set it's html 
        viewableText.html(html);
        // replace out the textarea
        editor.replaceWith(viewableText);
}         



function addHeader()
{
	insertAtCaret('# Your Header');
}


function addLink()
{
	insertAtCaret("[Name your link](https://www.link.com)");
}

function addImage()
{
	insertAtCaret('![alt text](https://imagelink.com/icon48.png "Image Title")');
}

function addTable()
{
	insertAtCaret("| First Header  | Second Header |\n| ------------- | ------------- |\n| Content Cell  | Content Cell  |\n| Content Cell  | Content Cell  |\n ");
}

function addExample()
{
	insertAtCaret("<startexample>\r\n\r\n<endexample>");
		
}

function addBox()
{
    insertAtCaret("<startbox>\r\n\r\n<endbox>");
        
}

function addSoln()
{
	insertAtCaret("<startsolution>\r\n\r\n<endsolution>");
		
}

function addDef()
{
	insertAtCaret("<startdefinition>\r\n\r\n<enddefinition>");
		
}


function addTheorem()
{
	insertAtCaret("<starttheorem>\r\n\r\n<endtheorem>");
}


function addProof()
{
	insertAtCaret("<startproof>\r\n\r\n<endproof>");	
}


function addToc()
{
	insertAtCaret("[[toc]]");
		
}

function addList()
{
	insertAtCaret("* Item 1\r\n* Item 2");
}	

function addNList()
{
    insertAtCaret("1. Item 1\r\n2. Item 2");
}   

function addCenterAlign()
{
	insertAtCaret("<startcenter>\r\n\r\n<endcenter>");
}	

function addQuestion(id)
{
	insertAtCaret('<startquestion-'+id+'></endquestion>');
}	


function addLine(height, eid)
{
    insertAtCaret('<hr-'+height+'>')
        
}

function toggleFullscreen(eid)
{
    $('body').css('padding-top', '0');
    $('.navbar').toggleClass('hidden');
    $('#btn-fullscreen1').toggleClass('active');
    $('#editor-'+eid).toggleClass('fullscreen');
    $('#main--output-'+eid).toggleClass('fullscreen');
    $('#editor--buttons-'+eid).toggleClass('fullscreen');
}



function insertAtCaret(text, eid) {
	    
	    var areaId = 'marked-mathjax-input-' + eid;
		var txtarea = document.getElementById(areaId);
		if (!txtarea) { return; }

		var scrollPos = txtarea.scrollTop;
		var strPos = 0;
		var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ?
			"ff" : (document.selection ? "ie" : false ) );
		if (br == "ie") {
			txtarea.focus();
			var range = document.selection.createRange();
			range.moveStart ('character', -txtarea.value.length);
			strPos = range.text.length;
		} else if (br == "ff") {
			strPos = txtarea.selectionStart;
		}

		var front = (txtarea.value).substring(0, strPos);
		var back = (txtarea.value).substring(strPos, txtarea.value.length);
		txtarea.value = front + text + back;
		strPos = strPos + text.length;
		if (br == "ie") {
			txtarea.focus();
			var ieRange = document.selection.createRange();
			ieRange.moveStart ('character', -txtarea.value.length);
			ieRange.moveStart ('character', strPos);
			ieRange.moveEnd ('character', 0);
			ieRange.select();
		} else if (br == "ff") {
			txtarea.selectionStart = strPos;
			txtarea.selectionEnd = strPos;
			txtarea.focus();
		}

		txtarea.scrollTop = scrollPos;
} 	





