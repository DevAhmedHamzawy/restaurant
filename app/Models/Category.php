<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function restaurants()
    {
        return $this->hasMany(Category::class);
    }

    public function getImgPathAttribute()
    {
        return asset('storage/categories/'.$this->image);
    }
}
