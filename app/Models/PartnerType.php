<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerType extends Model
{
    protected $fillable = [
        'name', 'description', 'status',
    ];


    public function partners()
    {
        return $this->hasMany('App\Models\Partner');
    }
}
