<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = ['name', 'date', 'lesson_id'];

    protected $dates = ['date'];

    protected $dateFormat = 'Y-m-d';

    protected $hidden = [];

    public function agents()
    {
        return $this->belongsToMany('App\Agent')->withTimestamps();
    }

    public function lesson()
    {
        return $this->belongsTo('App\Lesson');
    }

    public function setDateAttribute($date)
    {
        $this->attributes['date'] = Carbon::parse($date);
    }

    public function getDateAttribute($date)
    {
        return (new Carbon($date));
    }
}
