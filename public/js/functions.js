toggleEditor = function() {
  		$('#editor--container').toggleClass('hidden');
  		$('#main--output').toggleClass('hidden');
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
	insertAtCaret("Title | Title | Title\r\n \
--- | --- | ---\r\n \
*Still* | `renders` | **nicely**\r\n \
1 | 2 | 3"
		);
}

function addExample()
{
	insertAtCaret("<startexample>\r\n\r\n<endexample>");
		
}

function addDef()
{
	insertAtCaret("<startdefinition>\r\n\r\n<enddefinition>");
		
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

function addCenterAlign()
{
	insertAtCaret("<!-- {p: .center} -->");
}	

function addQuestion(id)
{
	insertAtCaret('<startquestion></endquestion>');
}	

function insertAtCaret(text) {
	    
	    var areaId = 'marked-mathjax-input';
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