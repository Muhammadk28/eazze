<?php

namespace App;
use App\Manufacturer;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = [];
    public function generic()
    {
        return $this->belongsTo('App\Models\Generic');
    }

    public function manufacture()
    {
        return $this->belongsTo(Manufacturer::class);
    }
    public function peopls()
    {
        return $this->belongsTo('App\Models\Peopls');
    }
}
