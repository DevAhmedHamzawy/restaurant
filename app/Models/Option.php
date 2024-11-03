<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImgPathAttribute()
    {
        return asset('storage/options/'.$this->image);
    }

    public function getPriceValueAttribute()
    {
        return $this->price.' EGP';
    }
}
