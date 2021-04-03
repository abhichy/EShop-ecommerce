<?php

namespace App\model\Heading;

use Illuminate\Database\Eloquent\Model;
use Image;

class Heading extends Model
{
    
    protected $table = 'heading';
    
    protected $guarded =[];
    
   
    
      public function specification()
    {   
         return $this->hasMany('App\Model\Specification\Specifications','id');
      
    }
    
    
    
}