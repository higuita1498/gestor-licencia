<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'ProductStatus', 'ProductName', 'NumberOfLicenses',
        'LicenseDuration', 'IdProduct'
    ];


    public function getStatusNameAttribute()
    {

        switch ((int) $this->ProductStatus) {
            case 0:
                return 'Desactivated';
                break;

            case 1:
                return 'Active';
                break;

            case null:
                return '';
                break;

            default:
                return $this->status;
                break;
        }
    }

    public function getFormatCreatedDateAttribute()
    {
        return $this->created_at ? $this->created_at->format('Y-m-d') : null; 
    }
}
