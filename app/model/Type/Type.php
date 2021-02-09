<?php

namespace App\model\Type;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['type_name'];
    // Database relationship------
    public function product()
    {
        return $this->hasMany('App\model\product\Product');
    }
    // for save type-----------
    public static function savetypeinfo($request)
    {
        $type = new Type();
        $type->type_name = $request->type_name;
        $type->save();
    }

    // for update type----------
    public static function update_typeinfo($request)
    {
        $type = Type::find($request->id);
        $type->type_name = $request->type_name;
        $type->save();
    }
}
