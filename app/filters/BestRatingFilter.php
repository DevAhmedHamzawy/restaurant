<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class BestRatingFilter implements Filter
{
    public function apply(Builder $builder, $value)
    {
        if($value !== null){
            return $builder->orderByDesc('reviews_avg_rating');
        }
    }
}
