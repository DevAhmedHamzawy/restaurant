<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function subTags()
    {
        return $this->hasMany(Tag::class, 'parent_id')->whereNotNull('parent_id');
    }

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }
}
