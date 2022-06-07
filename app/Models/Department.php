<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name', 'code', 'country_id',
    ];


    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }
}
