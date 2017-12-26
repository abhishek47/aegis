<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['from_id', 'to_id', 'message'];

    protected $with = ['sender', 'receiver'];

    protected $appends = ['room_id'];

    public function getRoomIdAttribute()
    {
    	return max($this->sender->id, $this->receiver->id) . '' . min($this->sender->id, $this->receiver->id);
    }

    public function sender()
    {
    	return $this->belongsTo(User::class, 'from_id');
    }


    public function receiver()
    {
    	return $this->belongsTo(User::class, 'to_id');
    }
}
