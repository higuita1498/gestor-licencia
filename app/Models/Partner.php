<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'PartnerName',
        'PartnerEmail',
        'Photo',
        'PartnerStatus',
        'PartnerContactName',
        'PartnerContactNumber',
        'PartnerID',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];


    public function partnerType()
    {
        return $this->belongsTo('App\Models\PartnerType');
    }
}
