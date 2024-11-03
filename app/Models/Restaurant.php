<?php

namespace App\Models;

use App\Filters\BaseFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoriteable');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class)->whereNull('parent_id');
    }

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }

    public function weekHours()
    {
        return $this->hasMany(WeekHour::class);
    }

    public function getImgPathAttribute()
    {
        return asset('storage/restaurants/'.$this->image);
    }

    public function getCoverPathAttribute()
    {
        return asset('storage/restaurants/'.$this->cover);
    }

    public function getDeliveryTimeValueAttribute()
    {
        return $this->delivery_time.' min';
    }

    public function getDeliveryFeesValueAttribute()
    {
        return $this->delivery_fees.' EGP';
    }

    public function getStatusValueAttribute()
    {
        $todayName = Carbon::parse(now())->dayName;
        $weekHourRestaurantToday = WeekHour::whereDayId(Day::whereName($todayName)->first()->id)->whereRestaurantId($this->id)->first();

        return now() < $weekHourRestaurantToday->to && now() > $weekHourRestaurantToday->from ? 'open' : 'closed';
    }

    public function getTodayWorkingHoursAttribute()
    {
        $todayName = Carbon::parse(now())->dayName;
        $weekHourRestaurantToday = WeekHour::whereDayId(Day::whereName($todayName)->first()->id)->whereRestaurantId($this->id)->first();

        $weekHourRestaurantToday =  Carbon::parse($this->from)->format('g:i A') .' - '. Carbon::parse($this->to)->format('g:i A');

        return $weekHourRestaurantToday;
    }

    public static function scopeFilter(Builder $builder, $filters)
    {
        return (new BaseFilter(request()))->apply($builder, $filters);
    }
}
