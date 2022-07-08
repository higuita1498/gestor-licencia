<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Licence extends Model
{

    protected $fillable = [
        'LicenseKey', 'ProductID', 'product_id', 'Status', 'ExpirationDate',
        'PartnerID', 'partner_id', 'MasterCode', 'UserID', 'user_id'
    ];

    protected $dates = [ 'ExpirationDate'];


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


    public function getStatusNameAttribute()
    {
        switch ((int) $this->Status) {
            case 1:
                return 'Available';
                break;

            case 2:
                return 'Delivered';
                break;

            case 3:
                return 'Active';
                break;

            case 4:
                return 'Cancelled';
                break;

            default:
                return $this->status;
                break;
        }
    }

    public function getFormatExpirationDateAttribute()
    {
        return $this->ExpirationDate ? $this->ExpirationDate->format('Y-m-d') : null; 
    }

    public function automaticActivation($user = null){

        $product = $this->product;

        if($user){
            $this->user_id = $user->id;
            $this->UserID = $user->UserID;
        }

        
        if($product){
            if($product->LicenseDuration){
                $now = now();
                $this->ExpirationDate = ($now->addMonths($product->LicenseDuration));
                $this->Status = 3;
                $this->update();
            }
        }

    }
}
