<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peopls extends Model
{
    protected $guarded = [];

    public function Brands()
    {
        return $this->hasMany('App\Models\Brand');
    }
}
