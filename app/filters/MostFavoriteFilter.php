<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class MostFavoriteFilter implements Filter
{
    public function apply(Builder $builder, $value)
    {
        if($value !== null){
            return $builder->orderByDesc('favorites_count');
        }
    }
}
