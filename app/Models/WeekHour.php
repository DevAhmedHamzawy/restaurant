<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeekHour extends Model
{
    use HasFactory;

    protected $with = ['day'];

    protected $guarded = [];

    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}
