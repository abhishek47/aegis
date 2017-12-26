<?php

namespace App\Http\Controllers;

use App\Chat;
use App\User;
use Illuminate\Http\Request;
use App\Events\NewMessage;

class ChatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentChat = Chat::latest()->first();

        if($currentChat != null)
        {
            if($currentChat->sender->id == auth()->id())
            {
                $currentUser = $currentChat->receiver; 
            } else {
                $currentUser = $currentChat->sender; 
            }

            

        } else {
            $currentUser = User::where('id', '!=', auth()->id())->first();
        }
        
            $chats = Chat::where('to_id', $currentUser->id)->where('from_id', auth()->id())->latest()->get();
            $chatsTo = Chat::where('to_id', $currentUser->id)->where('from_id', auth()->id())->latest()->get();

            $chats->merge($chatsTo);


            $people = User::where('id', '!=', auth()->id())->orderBy('name')->get();


        return view('chats.index', compact('currentUser', 'chats', 'people'));
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
    public function store(Request $request)
    {
        $message = Chat::create(['from_id' => auth()->id(), 'to_id' => request('to_id'), 'message' => request('message')]);

        $message->load(['sender', 'receiver']);

        broadcast(new NewMessage($message))->toOthers();

        return response(['message' => $message], 200);

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
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
