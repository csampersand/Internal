<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = ['name', 'type'];

    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }

    public function events()
    {
        return $this->hasManyThrough('App\Event', 'App\Lesson');
    }
}
