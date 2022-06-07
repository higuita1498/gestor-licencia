<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
       'name', 'code',
    ];

    public function departments()
    {
        return $this->hasMany('App\Models\Department');
    }

    public function cities()
    {
        return $this->departments->cities;
    }
}
