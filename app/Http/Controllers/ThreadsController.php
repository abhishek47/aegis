<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Message;
use App\Notifications\ThreadRequestAccepted;
use App\Notifications\ThreadRequestRejected;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 

        $threads = Thread::where('user_1', auth()->id())->orWhere('user_2', auth()->id())->latest()->get();
       
        if(count($threads) > 0)
        {
            $chats = $threads->first()->messages;
        } else {
            $chats = null;
        }
        


        return view('chats.index', compact('threads', 'chats'));

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
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function get(Thread $thread)
    {
            

            //$chats = $chats->sortBy('id');

         $thread->load(['acceptor', 'requestor', 'messages']);

            return response(['thread' => $thread], 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thread = Thread::create(['user_1' => auth()->id(), 'user_2' => request('to_id')]);

        $thread->load(['requestor', 'acceptor']);

        return response(['thread' => $thread], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function respond(Thread $thread)
    {
        $thread->accepted = request()->get('response');

        $thread->save();

        if(request()->get('response') == 1)
        {
            $thread->requestor->notify(new ThreadRequestAccepted($thread));
        } else {
            $thread->requestor->notify(new ThreadRequestRejected($thread));
        }

        return response(['success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        $thread->delete();

        return back();
    }
}
