<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';

    protected $fillable = ['name', 'course_id'];

    protected function course()
    {
        return $this->belongsTo('App\Course');
    }

    protected function events()
    {
        return $this->hasMany('App\Event');
    }
}
