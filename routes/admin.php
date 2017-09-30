<?php

CRUD::resource('quiz', 'QuizCrudController');
CRUD::resource('questions', 'QuestionCrudController');

Route::auth();