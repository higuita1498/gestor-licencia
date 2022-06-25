<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['ProductStatus', 'ProductName', 'NumberOfLicenses', 'LicenseDuration', 'IdProduct'];


    public function getStatus()
    {

        $status = '';

        switch ($this->ProductStatus) {

            case 0:
                $status .= 'Deactivated';
                break;

            case 1:
                $status .= 'Active';
                break;

            case 2:
                $status .= '';
                break;
        }

        return $status;
    }
}
