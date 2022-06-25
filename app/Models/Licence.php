<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Licence extends Model
{

    protected $fillable = [
        'LicenseKey', 'ProductID', 'product_id', 'Status', 'ExpirationDate',
        'PartnerID', 'partner_id', 'MasterCode', 'UserID', 'user_id'
    ];
    

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
