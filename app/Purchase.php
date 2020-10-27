<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public $guarded = [];

    public function app()
    {
        return $this->belongsTo("App\Application","application_id");
    }
}
