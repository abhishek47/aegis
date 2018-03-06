toggleEditor = function() {
  		$('#editor--container').toggleClass('hidden');
  		$('#main--output').toggleClass('hidden');
  	}


 function editSection(id)
        {
            var wid = $('#wid').text();

            var startText = $('#section-'+id).text();
            nid = id+1;
            var endText = $('#section-'+nid).text();

            var divHtml = $("#section-" + id + "-body").html();

            // create a dynamic textarea
            var editor = $('<form />');
            editor.attr('id', "section-" + id + "-body");
            editor.attr('action', '/wiki/section/' + id);
            editor.attr('method', 'POST');

            var editableText = $("<textarea />");
            editableText.attr('class', 'form-control');
            editableText.attr('rows', '15');

             $.get('/wiki/' + wid + '/section/'+id).then(function(res, status)
                {

                    editableText.val(res.data);

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
                        viewableText.html(divHtml);
                        // replace out the textarea
                        editor.replaceWith(viewableText);
                    });

                });


             closeEditing = function(id)
            {
                 // Preserve the value of textarea
                    // create a dynamic div
                    var viewableText = $("<div>");
                    viewableText.attr('id', "section-" + id + "-body");
                    // set it's html 
                    viewableText.html(divHtml);
                    // replace out the textarea
                    editor.replaceWith(viewableText);
            }         

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


function addLine(height)
{
    insertAtCaret('<hr-'+height+'>')
        
}

function toggleFullscreen()
{
    $('body').css('padding-top', '0');
    $('.navbar').toggleClass('hidden');
    $('#btn-fullscreen1').toggleClass('active');
    $('#editor').toggleClass('fullscreen');
    $('#main--output').toggleClass('fullscreen');
    $('#editor--buttons').toggleClass('fullscreen');
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










// Questions PArt


/*!
 * SlickQuiz jQuery Plugin
 * https://github.com/jewlofthelotus/SlickQuiz
 *
 * @updated October 25, 2014
 * @version 1.5.20
 *
 * @author Julie Cameron - http://www.juliecameron.com
 * @copyright (c) 2013 Quicken Loans - http://www.quickenloans.com
 * @license MIT
 */

(function($){
    $.slickQuiz = function(element, options) {
        var plugin   = this,
            $element = $(element),
            _element = '#' + $element.attr('id'),

            defaults = {
                checkAnswerText:  'Submit Answer!',
                nextQuestionText: 'Next &raquo;',
                backButtonText: '',
                completeQuizText: '',
                tryAgainText: 'Try Again',
                questionCountText: 'Question %current of %total %level',
                preventUnansweredText: 'You must select at least one answer.',
                questionTemplateText:  '%count. %text',
                scoreTemplateText: '%score / %total',
                nameTemplateText:  '<span>Quiz: </span>%name',
                skipStartButton: true,
                numberOfQuestions: null,
                randomSortQuestions: false,
                randomSortAnswers: false,
                preventUnanswered: false,
                disableScore: false,
                disableRanking: true,
                scoreAsPercentage: false,
                perQuestionResponseMessaging: true,
                perQuestionResponseAnswers: true,
                completionResponseMessaging: false,
                displayQuestionCount: true,   // Deprecate?
                displayQuestionNumber: true,  // Deprecate?
                animationCallbacks: { // only for the methods that have jQuery animations offering callback
                    setupQuiz: function () {},
                    startQuiz: function () {},
                    resetQuiz: function () {},
                    checkAnswer: function () {},
                    nextQuestion: function () {},
                    backToQuestion: function () {},
                    completeQuiz: function () {}
                },
                events: {
                    onStartQuiz: function (options) {},
                    onCompleteQuiz: function (options) {}  // reserved: options.questionCount, options.score
                }
            },

            // Class Name Strings (Used for building quiz and for selectors)
            questionCountClass     = 'questionCount',
            questionGroupClass     = 'questions',
            questionClass          = 'question',
            answersClass           = 'answers',
            responsesClass         = 'responses',
            completeClass          = 'complete',
            correctClass           = 'correctResponse',
            incorrectClass         = 'incorrectResponse',
            correctResponseClass   = 'correct',
            incorrectResponseClass = 'incorrect',
            checkAnswerClass       = 'checkAnswer',
            nextQuestionClass      = 'nextQuestion',
            lastQuestionClass      = 'lastQuestion',
            backToQuestionClass    = 'backToQuestion',
            tryAgainClass          = 'tryAgain',

            // Sub-Quiz / Sub-Question Class Selectors
            _questionCount         = '.' + questionCountClass,
            _questions             = '.' + questionGroupClass,
            _question              = '.' + questionClass,
            _answers               = '.' + answersClass,
            _answer                = '.' + answersClass + ' li',
            _responses             = '.' + responsesClass,
            _response              = '.' + responsesClass + ' li',
            _correct               = '.' + correctClass,
            _correctResponse       = '.' + correctResponseClass,
            _incorrectResponse     = '.' + incorrectResponseClass,
            _checkAnswerBtn        = '.' + checkAnswerClass,
            _nextQuestionBtn       = '.' + nextQuestionClass,
            _prevQuestionBtn       = '.' + backToQuestionClass,
            _tryAgainBtn           = '.' + tryAgainClass,

            // Top Level Quiz Element Class Selectors
            _quizStarter           = _element + ' .startQuiz',
            _quizName              = _element + ' .quizName',
            _quizArea              = _element + ' .quizArea',
            _quizResults           = _element + ' .quizResults',
            _quizResultsCopy       = _element + ' .quizResultsCopy',
            _quizHeader            = _element + ' .quizHeader',
            _quizScore             = _element + ' .quizScore',
            _quizLevel             = _element + ' .quizLevel',
            _changeLevel           = _element + ' .change-level',

            // Top Level Quiz Element Objects
            $quizStarter           = $(_quizStarter),
            $quizName              = $(_quizName),
            $quizArea              = $(_quizArea),
            $quizResults           = $(_quizResults),
            $quizResultsCopy       = $(_quizResultsCopy),
            $quizHeader            = $(_quizHeader),
            $quizScore             = $(_quizScore),
            $quizLevel             = $(_quizLevel),
            $changeLevel           = $(_changeLevel)
        ;


        // Reassign user-submitted deprecated options
        var depMsg = '';

        if (options && typeof options.disableNext != 'undefined') {
            if (typeof options.preventUnanswered == 'undefined') {
                options.preventUnanswered = options.disableNext;
            }
            depMsg += 'The \'disableNext\' option has been deprecated, please use \'preventUnanswered\' in it\'s place.\n\n';
        }

        if (options && typeof options.disableResponseMessaging != 'undefined') {
            if (typeof options.preventUnanswered == 'undefined') {
                options.perQuestionResponseMessaging = options.disableResponseMessaging;
            }
            depMsg += 'The \'disableResponseMessaging\' option has been deprecated, please use' +
                      ' \'perQuestionResponseMessaging\' and \'completionResponseMessaging\' in it\'s place.\n\n';
        }

        if (options && typeof options.randomSort != 'undefined') {
            if (typeof options.randomSortQuestions == 'undefined') {
                options.randomSortQuestions = options.randomSort;
            }
            if (typeof options.randomSortAnswers == 'undefined') {
                options.randomSortAnswers = options.randomSort;
            }
            depMsg += 'The \'randomSort\' option has been deprecated, please use' +
                      ' \'randomSortQuestions\' and \'randomSortAnswers\' in it\'s place.\n\n';
        }

        if (depMsg !== '') {
            if (typeof console != 'undefined') {
                console.warn(depMsg);
            } else {
                alert(depMsg);
            }
        }
        // End of deprecation reassignment


        plugin.config = $.extend(defaults, options);

        // Set via json option or quizJSON variable (see slickQuiz-config.js)
        var quizValues = (plugin.config.json ? plugin.config.json : typeof quizJSON != 'undefined' ? quizJSON : null);

        // Get questions, possibly sorted randomly
       
        var questions = plugin.config.randomSortQuestions ?
                        quizValues.questions.sort(function() { return (Math.round(Math.random())-0.5); }) :
                        quizValues.questions;

        // Count the number of questions
        var questionCount = questions.length;

        var levels = quizValues.levels;

        // Select X number of questions to load if options is set
        if (plugin.config.numberOfQuestions && questionCount >= plugin.config.numberOfQuestions) {
            questions = questions.slice(0, plugin.config.numberOfQuestions);
            questionCount = questions.length;
        }


        // some special private/internal methods
        var internal = {method: {
            // get a key whose notches are "resolved jQ deferred" objects; one per notch on the key
            // think of the key as a house key with notches on it
            getKey: function (notches) { // returns [], notches >= 1
                var key = [];
                for (i=0; i<notches; i++) key[i] = $.Deferred ();
                return key;
            },

            // put the key in the door, if all the notches pass then you can turn the key and "go"
            turnKeyAndGo: function (key, go) { // key = [], go = function ()
                // when all the notches of the key are accepted (resolved) then the key turns and the engine (callback/go) starts
                $.when.apply (null, key). then (function () {
                    go ();
                });
            },

            // get one jQ
            getKeyNotch: function (key, notch) { // notch >= 1, key = []
                // key has several notches, numbered as 1, 2, 3, ... (no zero notch)
                // we resolve and return the "jQ deferred" object at specified notch
                return function () {
                    key[notch-1].resolve (); // it is ASSUMED that you initiated the key with enough notches
                };
            }
        }};

        plugin.method = {
            // Sets up the questions and answers based on above array
            setupQuiz: function(options) { // use 'options' object to pass args

                if(options.qv != null)
                {
                    quizValues = options.qv;
                }    

                var quizID = quizValues.info.id;
                var key, keyNotch, kN;
                key = internal.method.getKey (3); // how many notches == how many jQ animations you will run
                keyNotch = internal.method.getKeyNotch; // a function that returns a jQ animation callback function
                kN = keyNotch; // you specify the notch, you get a callback function for your animation


                $quizName.html(plugin.config.nameTemplateText
                    .replace('%name', quizValues.info.main) );


                
                if(levels > 1)
                {
                    var levelsHtml = $('<ol class="quiz-levels"></ol>');
            

                    for(i = 1; i<=levels; i++)
                    {
                        levelsHtml.append($('<li><a class="change-level" href="#" data-id="' + quizID + '" data-level="' + i + '">Level ' + i + '</a></li>')).fadeIn(1000, kN(key,2));
                    }

                    $quizHeader.hide().append(levelsHtml).fadeIn(1000, kN(key,2));
                }
                

               
                  var skipToQ = $('<ol class="quiz-question-links"></ol>');    

                $quizResultsCopy.append(quizValues.info.results);

                // add retry button to results view, if enabled
                if (plugin.config.tryAgainText && plugin.config.tryAgainText !== '') {
                    $quizResultsCopy.append('<p><a class="button ' + tryAgainClass + '" href="#">' + plugin.config.tryAgainText + '</a></p>');
                }

                // Setup questions
                var quiz  = $('<ol class="' + questionGroupClass + '"></ol>'),
                    count = 1;

                // Loop through questions object
                for (i in questions) {



                    if (questions.hasOwnProperty(i)) {
                        var question = questions[i];


                        var questionHTML = $('<li class="' + questionClass +'" id="question' + (count - 1) + '"></li>');

                        skipToQ.append($('<li><a class="change-question" id="ctoq' + (count - 1) + '" href="#" data-id="question' + (count - 1) + '">' + (count) + '</a></li>')).fadeIn(1000, kN(key,2));


                        if (plugin.config.displayQuestionCount) {
                           if(levels > 1)
                           {
                                questionHTML.append('<div class="' + questionCountClass + '">' +
                                plugin.config.questionCountText
                                    .replace('%current', '<span class="current">' + count + '</span>')
                                    .replace('%total', '<span class="total">' +
                                        questionCount + '</span>').replace('%level',' | LEVEL <b>' + question.level + '</b>') + '</div>');
                           }  else {
                                 questionHTML.append('<div class="' + questionCountClass + '">' +
                                plugin.config.questionCountText
                                    .replace('%current', '<span class="current">' + count + '</span>')
                                    .replace('%total', '<span class="total">' +
                                        questionCount + '</span>').replace('%level','') + '</div>');
                           }
                            
                        }

                        var formatQuestion = '';
                        if (plugin.config.displayQuestionNumber) {
                            formatQuestion = plugin.config.questionTemplateText
                                .replace('%count', count).replace('%text', question.q);
                        } else {
                            formatQuestion = question.q;
                        }
                        questionHTML.append('<h3>' + formatQuestion + '</h3>');

                        questionHTML.append('<p><i>Source : ' + question.source + '</i></p>');

                        // Count the number of true values
                        var truths = 0;
                        for (i in question.a) {
                            if (question.a.hasOwnProperty(i)) {
                                answer = question.a[i];
                                if (answer.correct) {
                                    truths++;
                                }
                            }
                        }

                        // Now let's append the answers with checkboxes or radios depending on truth count
                        var answerHTML = $('<ul class="' + answersClass + '"></ul>');

                        // Get the answers
                        var qanswers = JSON.parse(question.a);
                      
                        var answers = plugin.config.randomSortAnswers ?
                            qanswers.sort(function() { return (Math.round(Math.random())-0.5); }) :
                            qanswers;

                        if(answers.length == 1) 
                        {
                          

                            inputName     = $element.attr('id') + '_question' + (count - 1),

                            optionId = inputName + '_' + 0;

                            var optionInput = '<input style="border: 1px solid #2f2f2f;" class="form-control" placeholder="Enter your answer" type="text"  id="' + optionId + '" name="' + inputName +
                                            '" />';

                                var answerContent = $('<li></li>')
                                    .append(optionInput);

                                    answerHTML.append(answerContent);
                        }  
                        else { 

                        // prepare a name for the answer inputs based on the question
                        var selectAny     = question.select_any ? question.select_any : false,
                            forceCheckbox = question.force_checkbox ? question.force_checkbox : false,
                            checkbox      = (truths > 1 && !selectAny) || forceCheckbox,
                            inputName     = $element.attr('id') + '_question' + (count - 1),
                            inputType     = checkbox ? 'checkbox' : 'radio';

                        if( count == quizValues.questions.length ) {
                            nextQuestionClass = nextQuestionClass + ' ' + lastQuestionClass;
                        }

                        for (i in answers) {
                            if (answers.hasOwnProperty(i)) {
                                answer   = answers[i],
                                optionId = inputName + '_' + i.toString();
                                
                                // If question has >1 true answers and is not a select any, use checkboxes; otherwise, radios
                                var input = '<input id="' + optionId + '" name="' + inputName +
                                            '" type="' + inputType + '" /> ';
                                
                                if(i == 0)
                                {
                                    posLabel = 'A';
                                } else if(i == 1)
                                {
                                    posLabel = 'B';
                                } else if(i == 2)
                                {
                                    posLabel = 'C';
                                } else if(i == 3)
                                {
                                    posLabel = 'D';
                                }else if(i == 4)
                                {
                                    posLabel = 'E';
                                }

                                       
                                var optionLabel = '<label for="' + optionId + '">' + posLabel + '. '+ answer.option + '</label>';

                                var answerContent = $('<li></li>')
                                    .append(input)
                                    .append(optionLabel);
                                answerHTML.append(answerContent);
                            }
                        }


                        }

                        // Append answers to question
                        questionHTML.append(answerHTML);

                        // If response messaging is NOT disabled, add it
                        if (plugin.config.perQuestionResponseMessaging || plugin.config.completionResponseMessaging) {
                            // Now let's append the correct / incorrect response messages
                            var responseHTML = $('<ul class="' + responsesClass + '"></ul>');
                            responseHTML.append('<li class="' + correctResponseClass + '">' + question.correct + '</li>');
                            responseHTML.append('<li class="' + incorrectResponseClass + '">' + question.incorrect + '</li>');

                            // Append responses to question
                            questionHTML.append(responseHTML);
                        }

                        // Appends check answer / back / next question buttons
                        if (plugin.config.backButtonText && plugin.config.backButtonText !== '') {
                            questionHTML.append('<a href="#" class="button ' + backToQuestionClass + '">' + plugin.config.backButtonText + '</a>');
                        }

                        var nextText = plugin.config.nextQuestionText;
                        if (plugin.config.completeQuizText && count == questionCount) {
                            nextText = plugin.config.completeQuizText;
                        }

                        // If we're not showing responses per question, show next question button and make it check the answer too
                        if (!plugin.config.perQuestionResponseMessaging) {
                            questionHTML.append('<a href="#" class="button ' + nextQuestionClass + ' ' + checkAnswerClass + '">' + nextText + '</a>');

                        } else {
                            questionHTML.append('<a href="#" class="button ' + nextQuestionClass + '">' + nextText + '</a>');
                            questionHTML.append('<a href="#" class="button ' + checkAnswerClass + '">' + plugin.config.checkAnswerText + '</a>');
                            questionHTML.append('<a target="_blank" href="/quiz/' + quizID + '/question:' + question.id + '/discuss" class="button">Discuss Solution</a>');
                        }

                        // Append question & answers to quiz

                        quiz.append(questionHTML);

                        count++;
                    }
                }

                // Add the quiz content to the page

                $quizName.append(skipToQ).fadeIn(500, kN(key,2));

                $quizArea.append(quiz).fadeIn(500, kN(key,2));


                // Toggle the start button OR start the quiz if start button is disabled
                if (plugin.config.skipStartButton || $quizStarter.length == 0) {
                    $quizStarter.hide();
                    plugin.method.startQuiz.apply (this, [{callback: plugin.config.animationCallbacks.startQuiz}]); // TODO: determine why 'this' is being passed as arg to startQuiz method
                    kN(key,3).apply (null, []);
                } else {

                    $quizStarter.fadeIn(500, kN(key,3)); // 3d notch on key must be on both sides of if/else, otherwise key won't turn
                }

                internal.method.turnKeyAndGo (key, options && options.callback ? options.callback : function () {});
            },

            // Starts the quiz (hides start button and displays first question)
            startQuiz: function(options) {
                var key, keyNotch, kN;
                key = internal.method.getKey (1); // how many notches == how many jQ animations you will run
                keyNotch = internal.method.getKeyNotch; // a function that returns a jQ animation callback function
                kN = keyNotch; // you specify the notch, you get a callback function for your animation

                function start(options) {

                    var firstQuestion = $(_element + ' ' + _questions + ' li').first();
                    if (firstQuestion.length) {
                        firstQuestion.fadeIn(500, function () {
                            if (options && options.callback) options.callback ();
                        });
                        
                    }
                }

                if (plugin.config.skipStartButton || $quizStarter.length == 0) {
                    start({callback: kN(key,1)});
                } else {
                    $quizStarter.fadeOut(300, function(){
                        start({callback: kN(key,1)}); // 1st notch on key must be on both sides of if/else, otherwise key won't turn
                    });
                }

                internal.method.turnKeyAndGo (key, options && options.callback ? options.callback : function () {});

                if (plugin.config.events &&
                        plugin.config.events.onStartQuiz) {
                    plugin.config.events.onStartQuiz.apply (null, []);
                }
            },

            // Resets (restarts) the quiz (hides results, resets inputs, and displays first question)
            resetQuiz: function(startButton, options) {
                var key, keyNotch, kN;
                key = internal.method.getKey (1); // how many notches == how many jQ animations you will run
                keyNotch = internal.method.getKeyNotch; // a function that returns a jQ animation callback function
                kN = keyNotch; // you specify the notch, you get a callback function for your animation

                $quizResults.fadeOut(300, function() {
                    $(_element + ' input').prop('checked', false).prop('disabled', false);

                    $quizLevel.attr('class', 'quizLevel');
                    $(_element + ' ' + _question).removeClass(correctClass).removeClass(incorrectClass).remove(completeClass);
                    $(_element + ' ' + _answer).removeClass(correctResponseClass).removeClass(incorrectResponseClass);

                    $(_element + ' ' + _question          + ',' +
                      _element + ' ' + _responses         + ',' +
                      _element + ' ' + _response          + ',' +
                      _element + ' ' + _nextQuestionBtn   + ',' +
                      _element + ' ' + _prevQuestionBtn
                    ).hide();

                    $(_element + ' ' + _questionCount + ',' +
                      _element + ' ' + _answers + ',' +
                      _element + ' ' + _checkAnswerBtn
                    ).show();

                    $quizArea.append($(_element + ' ' + _questions)).show();

                    $('.sb-resp').remove();

                    kN(key,1).apply (null, []);

                    plugin.method.startQuiz({callback: plugin.config.animationCallbacks.startQuiz},$quizResults); // TODO: determine why $quizResults is being passed
                });

                internal.method.turnKeyAndGo (key, options && options.callback ? options.callback : function () {});
            },

            // Validates the response selection(s), displays explanations & next question button
            checkAnswer: function(checkButton, options) {
                var key, keyNotch, kN;
                key = internal.method.getKey (2); // how many notches == how many jQ animations you will run
                keyNotch = internal.method.getKeyNotch; // a function that returns a jQ animation callback function
                kN = keyNotch; // you specify the notch, you get a callback function for your animation

                var questionLI    = $($(checkButton).parents(_question)[0]),
                    answerLIs     = questionLI.find(_answers + ' li'),
                    answerSelects = answerLIs.find('input:checked'),
                    questionIndex = parseInt(questionLI.attr('id').replace(/(question)/, ''), 10),
                    answers       = JSON.parse(questions[questionIndex].a),
                    selectAny     = questions[questionIndex].select_any ? questions[questionIndex].select_any : false;

                answerLIs.addClass(incorrectResponseClass); 

                if(answers.length == 1)
                {
                    var correctResponse = answers[0].option == answerLIs.first().find('input:first-child').val();
                    if(correctResponse)
                    {

                    answerLIs.first().removeClass(incorrectResponseClass).addClass(correctResponseClass);
                    } else {
                         answerLIs.append('<li class="sb-resp" style="margin-top: 8px;"><b>Answer : </b>' + answers[0].option).fadeIn(200);
                    }
                   

                } else {
                     // Collect the true answers needed for a correct response
                        var trueAnswers = [];
                        for (i in answers) {
                            if (answers.hasOwnProperty(i)) {
                                var answer = answers[i],
                                    index  = parseInt(i, 10);

 
                                if (answer.correct) {
                                    trueAnswers.push(index);
                                    answerLIs.eq(index).removeClass(incorrectResponseClass).addClass(correctResponseClass);
                                }
                            }
                        }

                        // TODO: Now that we're marking answer LIs as correct / incorrect, we might be able
                        // to do all our answer checking at the same time

                        // NOTE: Collecting answer index for comparison aims to ensure that HTML entities
                        // and HTML elements that may be modified by the browser / other scrips match up

                        // Collect the answers submitted
                        var selectedAnswers = [];
                        answerSelects.each( function() {
                            var id = $(this).attr('id');
                            selectedAnswers.push(parseInt(id.replace(/(.*\_question\d{1,}_)/, ''), 10));
                        });

                        if (plugin.config.preventUnanswered && selectedAnswers.length === 0) {
                            alert(plugin.config.preventUnansweredText);
                            return false;
                        }

                        // Verify all/any true answers (and no false ones) were submitted
                        var correctResponse = plugin.method.compareAnswers(trueAnswers, selectedAnswers, selectAny);

                        
                }

                if (correctResponse) {
                            questionLI.addClass(correctClass);
                        } else {
                            questionLI.addClass(incorrectClass);
                        }

               

                // Toggle appropriate response (either for display now and / or on completion)
                questionLI.find(correctResponse ? _correctResponse : _incorrectResponse).show();

                // If perQuestionResponseMessaging is enabled, toggle response and navigation now
                if (plugin.config.perQuestionResponseMessaging) {
                    $(checkButton).hide();
                    if (!plugin.config.perQuestionResponseAnswers) {
                        // Make sure answers don't highlight for a split second before they hide
                        questionLI.find(_answers).hide({
                            duration: 0,
                            complete: function() {
                                questionLI.addClass(completeClass);
                            }
                        });
                    } else {
                        questionLI.addClass(completeClass);
                    }
                    questionLI.find('input').prop('disabled', true);
                    questionLI.find(_responses).show();
                    questionLI.find(_nextQuestionBtn).fadeIn(300, kN(key,1));
                    questionLI.find(_prevQuestionBtn).fadeIn(300, kN(key,2));
                    if (!questionLI.find(_prevQuestionBtn).length) kN(key,2).apply (null, []); // 2nd notch on key must be passed even if there's no "back" button
                } else {
                    kN(key,1).apply (null, []); // 1st notch on key must be on both sides of if/else, otherwise key won't turn
                    kN(key,2).apply (null, []); // 2nd notch on key must be on both sides of if/else, otherwise key won't turn
                }

                internal.method.turnKeyAndGo (key, options && options.callback ? options.callback : function () {});
            },

            // Moves to the next question OR completes the quiz if on last question
            nextQuestion: function(nextButton, options) {
                var key, keyNotch, kN;
                key = internal.method.getKey (1); // how many notches == how many jQ animations you will run
                keyNotch = internal.method.getKeyNotch; // a function that returns a jQ animation callback function
                kN = keyNotch; // you specify the notch, you get a callback function for your animation

                var currentQuestion = $($(nextButton).parents(_question)[0]),
                    nextQuestion    = currentQuestion.next(_question),
                    answerInputs    = currentQuestion.find('input:checked');

                // If response messaging has been disabled or moved to completion,
                // make sure we have an answer if we require it, let checkAnswer handle the alert messaging
                if (plugin.config.preventUnanswered && answerInputs.length === 0) {
                    return false;
                }

                if (nextQuestion.length) {
                    currentQuestion.fadeOut(300, function(){
                        nextQuestion.find(_prevQuestionBtn).show().end().fadeIn(500, kN(key,1));
                        if (!nextQuestion.find(_prevQuestionBtn).show().end().length) kN(key,1).apply (null, []); // 1st notch on key must be passed even if there's no "back" button
                    });
                } else {
                    kN(key,1).apply (null, []); // 1st notch on key must be on both sides of if/else, otherwise key won't turn
                    plugin.method.completeQuiz({callback: plugin.config.animationCallbacks.completeQuiz});
                }

                internal.method.turnKeyAndGo (key, options && options.callback ? options.callback : function () {});
            },

            // Go back to the last question
            backToQuestion: function(backButton, options) {
                var key, keyNotch, kN;
                key = internal.method.getKey (2); // how many notches == how many jQ animations you will run
                keyNotch = internal.method.getKeyNotch; // a function that returns a jQ animation callback function
                kN = keyNotch; // you specify the notch, you get a callback function for your animation

                var questionLI = $($(backButton).parents(_question)[0]),
                    responses  = questionLI.find(_responses);

                // Back to question from responses
                if (responses.css('display') === 'block' ) {
                    questionLI.find(_responses).fadeOut(300, function(){
                        questionLI.removeClass(correctClass).removeClass(incorrectClass).removeClass(completeClass);
                        questionLI.find(_responses + ', ' + _response).hide();
                        questionLI.find(_answers).show();
                        questionLI.find(_answer).removeClass(correctResponseClass).removeClass(incorrectResponseClass);
                        questionLI.find('input').prop('disabled', false);
                        questionLI.find(_answers).fadeIn(500, kN(key,1)); // 1st notch on key must be on both sides of if/else, otherwise key won't turn
                        questionLI.find(_checkAnswerBtn).fadeIn(500, kN(key,2));
                        questionLI.find(_nextQuestionBtn).hide();

                        // if question is first, don't show back button on question
                        if (questionLI.attr('id') != 'question0') {
                            questionLI.find(_prevQuestionBtn).show();
                        } else {
                            questionLI.find(_prevQuestionBtn).hide();
                        }
                    });

                // Back to previous question
                } else {
                    var prevQuestion = questionLI.prev(_question);

                    questionLI.fadeOut(300, function() {
                        prevQuestion.removeClass(correctClass).removeClass(incorrectClass).removeClass(completeClass);
                        prevQuestion.find(_responses + ', ' + _response).hide();
                        prevQuestion.find(_answers).show();
                        prevQuestion.find(_answer).removeClass(correctResponseClass).removeClass(incorrectResponseClass);
                        prevQuestion.find('input').prop('disabled', false);
                        prevQuestion.find(_nextQuestionBtn).hide();
                        prevQuestion.find(_checkAnswerBtn).show();

                        if (prevQuestion.attr('id') != 'question0') {
                            prevQuestion.find(_prevQuestionBtn).show();
                        } else {
                            prevQuestion.find(_prevQuestionBtn).hide();
                        }

                        prevQuestion.fadeIn(500, kN(key,1));
                        kN(key,2).apply (null, []); // 2nd notch on key must be on both sides of if/else, otherwise key won't turn
                    });
                }

                internal.method.turnKeyAndGo (key, options && options.callback ? options.callback : function () {});
            },

            // Hides all questions, displays the final score and some conclusive information
            completeQuiz: function(options) {
                var key, keyNotch, kN;
                key = internal.method.getKey (1); // how many notches == how many jQ animations you will run
                keyNotch = internal.method.getKeyNotch; // a function that returns a jQ animation callback function
                kN = keyNotch; // you specify the notch, you get a callback function for your animation

                var score        = $(_element + ' ' + _correct).length,
                    displayScore = score;
                if (plugin.config.scoreAsPercentage) {
                    displayScore = (score / questionCount).toFixed(2)*100 + "%";
                }

                if (plugin.config.disableScore) {
                    $(_quizScore).remove()
                } else {
                    $(_quizScore + ' span').html(plugin.config.scoreTemplateText
                        .replace('%score', displayScore).replace('%total', questionCount));
                }

                if (plugin.config.disableRanking) {
                    $(_quizLevel).remove()
                } else {
                    var levels    = [
                                        quizValues.info.level1, // 80-100%
                                        quizValues.info.level2, // 60-79%
                                        quizValues.info.level3, // 40-59%
                                        quizValues.info.level4, // 20-39%
                                        quizValues.info.level5  // 0-19%
                                    ],
                        levelRank = plugin.method.calculateLevel(score),
                        levelText = $.isNumeric(levelRank) ? levels[levelRank] : '';

                    $(_quizLevel + ' span').html(levelText);
                    $(_quizLevel).addClass('level' + levelRank);
                }

                $quizArea.fadeOut(300, function() {
                    // If response messaging is set to show upon quiz completion, show it now
                    if (plugin.config.completionResponseMessaging) {
                        $(_element + ' .button:not(' + _tryAgainBtn + '), ' + _element + ' ' + _questionCount).hide();
                        $(_element + ' ' + _question + ', ' + _element + ' ' + _answers + ', ' + _element + ' ' + _responses).show();
                        $quizResults.append($(_element + ' ' + _questions)).fadeIn(500, kN(key,1));
                    } else {
                        $quizResults.fadeIn(500, kN(key,1)); // 1st notch on key must be on both sides of if/else, otherwise key won't turn
                    }
                });

                internal.method.turnKeyAndGo (key, options && options.callback ? options.callback : function () {});

                if (plugin.config.events &&
                        plugin.config.events.onCompleteQuiz) {
                    plugin.config.events.onCompleteQuiz.apply (null, [{
                        questionCount: questionCount,
                        score: score
                    }]);
                }
            },

            // Compares selected responses with true answers, returns true if they match exactly
            compareAnswers: function(trueAnswers, selectedAnswers, selectAny) {
                if ( selectAny ) {
                    return $.inArray(selectedAnswers[0], trueAnswers) > -1;
                } else {
                    // crafty array comparison (http://stackoverflow.com/a/7726509)
                    return ($(trueAnswers).not(selectedAnswers).length === 0 && $(selectedAnswers).not(trueAnswers).length === 0);
                }
            },

            // Calculates knowledge level based on number of correct answers
            calculateLevel: function(correctAnswers) {
                var percent = (correctAnswers / questionCount).toFixed(2),
                    level   = null;

                if (plugin.method.inRange(0, 0.20, percent)) {
                    level = 4;
                } else if (plugin.method.inRange(0.21, 0.40, percent)) {
                    level = 3;
                } else if (plugin.method.inRange(0.41, 0.60, percent)) {
                    level = 2;
                } else if (plugin.method.inRange(0.61, 0.80, percent)) {
                    level = 1;
                } else if (plugin.method.inRange(0.81, 1.00, percent)) {
                    level = 0;
                }

                return level;
            },

            // Determines if percentage of correct values is within a level range
            inRange: function(start, end, value) {
                return (value >= start && value <= end);
            }
        };

        plugin.init = function() {
            // Setup quiz
            plugin.method.setupQuiz.apply (null, [{callback: plugin.config.animationCallbacks.setupQuiz}]);

            // Bind "start" button
            $quizStarter.on('click', function(e) {
                e.preventDefault();

                if (!this.disabled && !$(this).hasClass('disabled')) {
                    plugin.method.startQuiz.apply (null, [{callback: plugin.config.animationCallbacks.startQuiz}]);
                }
            });

            $('.change-level').on('click', function (e) {
                    e.preventDefault();

                    
                    
                    var qid = $(this).data('id');
                    var level = $(this).data('level')

                    axios.get('/quiz/'+qid+'/'+level).then(function(response) {
                    

                     
                      


                    // Set via json option or quizJSON variable (see slickQuiz-config.js)
                    quizValues = response.data;

                    // Get questions, possibly sorted randomly
                   
                     questions = plugin.config.randomSortQuestions ?
                                    quizValues.questions.sort(function() { return (Math.round(Math.random())-0.5); }) :
                                    quizValues.questions;

                    // Count the number of questions
                     questionCount = questions.length;

                     levels = quizValues.levels;

                    // Select X number of questions to load if options is set
                    if (plugin.config.numberOfQuestions && questionCount >= plugin.config.numberOfQuestions) {
                        questions = questions.slice(0, plugin.config.numberOfQuestions);
                        questionCount = questions.length;
                    }



                $(_element + ' ' + '.quizDescription').remove();
                $(_element + ' ' + '.quiz-levels').remove();
                $(_element + ' ' + '.questions').remove();
                $(_element + ' ' + '.tryAgain').remove();   

                      plugin.config.skipStartButton = true;
                      plugin.init();

                        MathJax.Hub.Queue(
                          ["Typeset",MathJax.Hub,document.getElementById('slickQuiz-'+qid)],
                          function() {
                            
                          }
                        );

                    });

                });

            $('.change-question').on('click', function (e) {
                    e.preventDefault();

                    var key, keyNotch, kN;
                    key = internal.method.getKey (2); // how many notches == how many jQ animations you will run
                    keyNotch = internal.method.getKeyNotch; // a function that returns a jQ animation callback function
                    kN = keyNotch; // you specify the notch, you get a callback function for your animation

                    var qid = $(this).data('id');

                
                    $(_element + ' .questions li[style*="display: list-item;"]').fadeOut(100, function(){
                         $(_element + ' #'+qid).fadeIn(300, kN(key,1));
                    });

                   

           });


            // Bind "try again" button
            $(_element + ' ' + _tryAgainBtn).on('click', function(e) {
                e.preventDefault();
                plugin.method.resetQuiz(this, {callback: plugin.config.animationCallbacks.resetQuiz});
            });

            // Bind "check answer" buttons
            $(_element + ' ' + _checkAnswerBtn).on('click', function(e) {
                e.preventDefault();
                plugin.method.checkAnswer(this, {callback: plugin.config.animationCallbacks.checkAnswer});
            });

            // Bind "back" buttons
            $(_element + ' ' + _prevQuestionBtn).on('click', function(e) {
                e.preventDefault();
                plugin.method.backToQuestion(this, {callback: plugin.config.animationCallbacks.backToQuestion});
            });

            // Bind "next" buttons
            $(_element + ' ' + _nextQuestionBtn).on('click', function(e) {
                e.preventDefault();
                plugin.method.nextQuestion(this, {callback: plugin.config.animationCallbacks.nextQuestion});
            });

            // Accessibility (WAI-ARIA).
            var _qnid = $element.attr('id') + '-name';
            $quizName.attr('id', _qnid);
            $element.attr({
              'aria-labelledby': _qnid,
              'aria-live': 'polite',
              'aria-relevant': 'additions',
              'role': 'form'
            });
            $(_quizStarter + ', [href = "#"]').attr('role', 'button');
        };

        plugin.init();
    };

    $.fn.slickQuiz = function(options) {
        return this.each(function() {
            if (undefined === $(this).data('slickQuiz')) {
                var plugin = new $.slickQuiz(this, options);
                $(this).data('slickQuiz', plugin);
            }
        });
    };
})(jQuery);


// Setup your quiz text and questions here

// NOTE: pay attention to commas, IE struggles with those bad boys

var quizJSON = {
    "info": {
        "name":    "Basic Mathematical Problems!!",
        "main":    "<p>Solve General Maths Questions</p>",
        "results": "<h5>Learn More</h5><p>Read our wiki pages daily to learn more Mathematical skills</p>",
        
    },
    "questions": [
        { // Question 1 - Multiple Choice, Single True Answer
            "q": "The sum of two positive irrational numbers must be irrational.",
            "a": [
                {"option": "True"},
                {"option": "False",     "correct": true} // no comma here
            ],
            "correct": "<p><span>That's right!</span> The sum of two positive irrational numbers may not be irrational</p>",
            "incorrect": "<p><span>Incorrect!</span>" // no comma here
        },
        { // Question 2 - Multiple Choice, Multiple True Answers, Select Any
            "q": "A long rope has to be cut to make 23 small pieces. If it is double folded to start with how many times does it need to be cut?",
            "a": [
                {"option": "9",    "correct": false},
                {"option": "23",   "correct": false},
                {"option": "11",    "correct": true},
                {"option": "12", "correct": false} // no comma here
            ],
            "correct": "<p><span>Correct!</span></p>",
            "incorrect": "<p><span>Incorrect!</span>Answer is 11</p>" // no comma here
        },
        { // Question 3 - Multiple Choice, Multiple True Answers, Select All
            "q": "Where are you right now? Select ALL that apply.",
            "a": [
                {"option": "Planet Earth",           "correct": true},
                {"option": "Pluto",                  "correct": false},
                {"option": "At a computing device",  "correct": true},
                {"option": "The Milky Way",          "correct": true} // no comma here
            ],
            "correct": "<p><span>Brilliant!</span> You're seriously a genius, (wo)man.</p>",
            "incorrect": "<p><span>Not Quite.</span> You're actually on Planet Earth, in The Milky Way, At a computer. But nice try.</p>" // no comma here
        },
        { // Question 4
            "q": "How many inches of rain does \[v(r) = \sqrt{\frac{GM}{r}}.\] get on average per year?",
            "a": [
                {"option": "149",    "correct": false},
                {"option": "32",     "correct": true},
                {"option": "3",      "correct": false},
                {"option": "1291",   "correct": false} // no comma here
            ],
            "correct": "<p><span>Holy bananas!</span> I didn't actually expect you to know that! Correct!</p>",
            "incorrect": "<p><span>Fail.</span> Sorry. You lose. It actually rains approximately 32 inches a year in Michigan.</p>" // no comma here
        },
        { // Question 5
            "q": "Is Earth bigger than a basketball?",
            "a": [
                {"option": "Yes",    "correct": true},
                {"option": "No",     "correct": false} // no comma here
            ],
            "correct": "<p><span>Good Job!</span> You must be very observant!</p>",
            "incorrect": "<p><span>ERRRR!</span> What planet Earth are <em>you</em> living on?!?</p>" // no comma here
        } // no comma here
    ]
};
