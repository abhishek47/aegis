<?php

namespace App\Http\Controllers;

use App\ClassroomLike;
use Illuminate\Http\Request;

class ClassroomLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Classroom $classroom)
    {
        auth()->user()->classroomLikes()->create(new ClassroomLike(['classroom_id' => $classroom->id]));

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassroomLike  $classroomLike
     * @return \Illuminate\Http\Response
     */
    public function show(ClassroomLike $classroomLike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassroomLike  $classroomLike
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassroomLike $classroomLike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassroomLike  $classroomLike
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassroomLike $classroomLike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassroomLike  $classroomLike
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->likes()->where('user_id', auth()->id())->delete();

        return back();
    }
}
