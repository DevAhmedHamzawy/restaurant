<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImgPathAttribute()
    {
        return asset('storage/drinks/'.$this->image);
    }

    public function getPriceValueAttribute()
    {
        return $this->price.' EGP';
    }
}
