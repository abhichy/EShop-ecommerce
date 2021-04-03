<?php

namespace App\model\Vendor;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    public function product()
    {
        return $this->hasmany('App\model\Vendor\VendorProduct','id');
    }

}
