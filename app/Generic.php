<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generic extends Model
{
    protected $guarded = [];

    public function Brands()
    {
        return $this->hasMany('App\Models\Brand');
    }
}
