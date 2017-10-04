<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
    	$courses = Course::latest()->get();
    	return view('courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
    	return view('courses.show', compact('course'));
    }

     public function enroll(Course $course)
    {
    	\Auth::user()->enrollments()->attach($course);
    	
    	return back();
    }
}
