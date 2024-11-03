<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Side extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImgPathAttribute()
    {
        return asset('storage/sides/'.$this->image);
    }

    public function getPriceValueAttribute()
    {
        return $this->price.' EGP';
    }
}
