<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
    	$onlineCourses = Course::where('type', 1)->latest()->get();
        $offlineCourses = Course::where('type', 0)->latest()->get();

    	return view('courses.index', compact('onlineCourses', 'offlineCourses'));
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
