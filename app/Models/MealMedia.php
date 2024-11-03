<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealMedia extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getPublicMealPathAttribute()
    {
        return public_path('storage/meals/'.$this->media);
    }

    public function getMealPathAttribute()
    {
        return asset('storage/meals/'.$this->media);
    }
}
