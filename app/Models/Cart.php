<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['meal', 'size'];

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public static function getOptions($options)
    {
        $options = json_decode($options);

        $the_options = [];

        foreach($options as $option)
        {
            $the_option = Option::find($option->id);
            $the_option->qty = $option->qty;

            array_push($the_options, $the_option);
        }

        return $the_options;
    }

    public static function getDrinks($drinks)
    {
        $drinks = json_decode($drinks);

        $the_drinks = [];

        foreach($drinks as $drink)
        {
            $the_drink = Option::find($drink->id);
            $the_drink->qty = $drink->qty;

            array_push($the_drinks, $the_drink);
        }

        return $the_drinks;
    }

    public static function getSides($sides)
    {
        $sides = preg_replace('/[{}]/', '', $sides);
        $sides = explode(",", $sides);

        $the_sides = [];
        foreach ($sides as $side) {
            $side = Side::find($side);
            array_push($the_sides, $side);
        }

        return $the_sides;
    }
}
