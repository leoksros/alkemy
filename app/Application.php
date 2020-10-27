<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AppPrice;

class Application extends Model
{
    public $guarded = [];

    public function price()
    {
        
        $price = AppPrice::where('application_id','=',$this->id)->orderBy('created_at', 'desc')->first();
        
        return $price->price;
    }
}
