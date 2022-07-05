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


    public function getFormatCreatedDateAttribute()
    {
        return $this->created_at ? $this->created_at->format('Y-m-d') : null;
    }


    public function users()
    {
        return $this->hasMany(User::class);
    }
}
