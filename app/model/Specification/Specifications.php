<?php

namespace App\model\Specification;

use Illuminate\Database\Eloquent\Model;
use Image;

class Specifications extends Model
{
    protected $guarded = [];
    protected $table = 'specifications';
    public $timestamps = false;
    
   public function heading(){
       
        return  $this->belongsTo('App\Model\Heading\Heading','heading');
    }
}