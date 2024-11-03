<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class MostMealsFilter implements Filter
{
    public function apply(Builder $builder, $value)
    {
        if($value !== null){
            return $builder->orderByDesc('meals_count');
        }
    }
}
