<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['sender_id', 'receiver_id', 'message', 'file_url', 'thread_id'];

    protected $with = ['sender', 'receiver', 'thread'];

    public function sender()
    {
    	return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
    	return $this->belongsTo(User::class, 'receiver_id');
    }

    public function thread()
    {
    	return $this->belongsTo(Thread::class);
    }

    protected $appends = ['profile_pic', 'sender_name'];

    public function getProfilePicAttribute()
    {
        return \Avatar::create($this->sender->name)->toBase64();
    }

    public function getSenderNameAttribute()
    {
        return $this->sender->name;
    }


}
