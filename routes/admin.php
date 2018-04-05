<?php

CRUD::resource('quiz', 'QuizCrudController');

CRUD::resource('questions', 'QuestionCrudController')->with(function(){
    // add extra routes to this resource
    Route::get('questions/quiz:{quiz}', 'QuestionCrudController@get');
    
});

CRUD::resource('weekly-questions', 'WeeklyQuestionCrudController')->with(function(){
    // add extra routes to this resource
    Route::get('weekly-questions/problem:{problem}', 'WeeklyQuestionCrudController@get');
    
});

CRUD::resource('courses', 'CourseCrudController');
CRUD::resource('classrooms', 'ClassroomCrudController');

CRUD::resource('chapters', 'ChapterCrudController')->with(function(){
    // add extra routes to this resource
    Route::get('chapters/classroom:{classroom}', 'ChapterCrudController@getChapters');

});


CRUD::resource('chapter-messages', 'ChapterMessageCrudController')->with(function(){
    // add extra routes to this resource
    Route::get('chapter-messages/chapter:{chapter}', 'ChapterMessageCrudController@get');
});;

CRUD::resource('chapter-homework', 'ChapterHomeworkCrudController')->with(function(){
    // add extra routes to this resource
    Route::get('chapter-homework/chapter:{chapter}', 'ChapterHomeworkCrudController@get');
});;

CRUD::resource('extra-practice-problems', 'ChapterExtraProblemCrudController')->with(function(){
    // add extra routes to this resource
    Route::get('extra-practice-problems/chapter:{chapter}', 'ChapterExtraProblemCrudController@get');
});;

CRUD::resource('chapter-notes', 'ChapterNoteCrudController')->with(function(){
    // add extra routes to this resource
    Route::get('chapter-notes/chapter:{chapter}', 'ChapterNoteCrudController@get');
});;

CRUD::resource('wikis', 'WikiCrudController');
CRUD::resource('problems-of-week', 'ProblemWeekCrudController');

CRUD::resource('lectures', 'LectureCrudController');

CRUD::resource('books', 'BookCrudController');

CRUD::resource('bookchapters', 'BookChapterCrudController')->with(function(){
    // add extra routes to this resource
    Route::get('bookchapters/book:{book}', 'BookChapterCrudController@getChapters');

});

CRUD::resource('book-chapter-problems', 'BookChapterProblemCrudController')->with(function(){
    // add extra routes to this resource
    Route::get('book-chapter-problems/bookchapter:{bookchapter}', 'BookChapterProblemCrudController@get');
});

