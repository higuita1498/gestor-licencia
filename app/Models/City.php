<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name', 'code', 'department_id', 'full_code'
    ];

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function country()
    {
        return $this->department->country;
    }
}
