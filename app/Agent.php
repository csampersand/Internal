<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;


class Agent extends Model
{
    protected $table = 'agents';

    protected $fillable = ['name', 'email', 'phone', 'active'];

    protected $hidden = [];

    public function events()
    {
        return $this->belongsToMany('App\Event')->withTimestamps();
    }

    public function setPhoneAttribute($phone)
    {
        $this->attributes['phone'] = ltrim(str_replace('.', '', str_replace('+', '', str_replace(' ', '', str_replace('-', '', str_replace('(', '', str_replace(')', '', $phone)))))), '1');
    }


    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
