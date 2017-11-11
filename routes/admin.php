<?php

CRUD::resource('quiz', 'QuizCrudController');
CRUD::resource('questions', 'QuestionCrudController');
CRUD::resource('courses', 'CourseCrudController');
CRUD::resource('classrooms', 'ClassroomCrudController');
CRUD::resource('chapters', 'ChapterCrudController');
CRUD::resource('chapter-messages', 'ChapterMessageCrudController');
CRUD::resource('chapter-homework', 'ChapterHomeworkCrudController');
CRUD::resource('chapter-notes', 'ChapterNoteCrudController');
CRUD::resource('wikis', 'WikiCrudController');
