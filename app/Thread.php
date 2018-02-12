<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = ['user_1', 'user_2', 'accepted'];


    protected $appends = ['first_user', 'second_user'];

    protected $with = ['requestor', 'acceptor'];

     public function getFirstUserAttribute()
    {
    	if(auth()->id() == $this->user_1)
    	{
    		return $this->requestor;
    	} else {
    		return $this->acceptor;
    	}
    }

    public function getSecondUserAttribute()
    {
    	if(auth()->id() == $this->user_1)
    	{
    		return $this->acceptor;
    	} else {
    		return $this->requestor;
    	}
    }

    public function requestor()
    {
    	return $this->belongsTo(User::class, 'user_1');
    }

    public function acceptor()
    {
    	return $this->belongsTo(User::class, 'user_2');
    }

    public function messages()
    {
    	return $this->hasMany(Message::class);
    }


}
