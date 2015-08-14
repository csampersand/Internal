<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $table = 'entries';

    protected $fillable = ['event_id', 'agent_id'];

    protected $hidden = [];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function agent()
    {
        return $this->belongsTo('App\Agent');
    }

    public function scopePage($query, $page, $count)
    {
        return $query->orderBy('id', 'desc')->skip(($page - 1) * $count)->take($count);
    }
}
