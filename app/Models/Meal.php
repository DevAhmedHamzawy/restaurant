<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['favorite'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoriteable');
    }

    public function media()
    {
        return $this->hasMany(MealMedia::class);
    }

    public function features()
    {
        return $this->hasMany(Feature::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function drinks()
    {
        return $this->hasMany(Drink::class);
    }

    public function sides()
    {
        return $this->hasMany(Side::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function getFavoriteAttribute()
    {
        return $this->favorites()->whereUserId(auth()->user()->id)->exists() ? 1 : 0;
    }

    public function getImgPathAttribute()
    {
        $defaultMealMedia = $this->media()->whereDefault(1)->first();
        $defaultMealMedia == null ? $defaultMealMedia = 'meals.png' : $defaultMealMedia = $defaultMealMedia->media;

        return asset('storage/meals/'.$defaultMealMedia);
    }

    public function getPriceValueAttribute()
    {
        return $this->price.' EGP';
    }
}
