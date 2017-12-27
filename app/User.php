<?php

namespace App;

use Backpack\CRUD\CrudTrait; // <------------------------------- this one
use Spatie\Permission\Traits\HasRoles;// <---------------------- and this one
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use CrudTrait; // <----- this
    use HasRoles; // <------ and this
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //protected $appends = ['profile_pic'];

    public function getProfilePicAttribute()
    {
        return \Avatar::create($this->name)->toBase64();
    }

    public function enrollments()
    {
         return $this->belongsToMany(Course::class, 'enrollments', 
            'user_id', 'course_id');
    }

    public function social()
    {
        return $this->hasMany(Social::class);
    }

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

    public function chapterSolvings()
    {
        return $this->hasMany(ChapterSolving::class);
    }
    public function extraProblemSolvings()
    {
        return $this->hasMany(ChapterExtraProblemSolving::class);
    }

    public function classroomLikes()
    {
        return $this->hasMany(ClassroomLike::class);
    }

    public function classroomEnrollments()
    {
        return $this->hasMany(ClassroomLike::class);
    }

}
