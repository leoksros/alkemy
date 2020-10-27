<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $guarded = [];

    public function apps()
    {
        return $this->hasMany("App\Application","category_id");
    }
}
