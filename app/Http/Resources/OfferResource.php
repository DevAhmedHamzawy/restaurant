<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $from_date_value = Carbon::parse($this->from_date);
        $to_date_value = Carbon::parse($this->to_date);

        return [
            'meal_id' => $this->meal_id,
            'name' => $this->name,
            'offer_name' => 'sale off '. $this->percentage . ' % ' .'for '.$this->category->name,
            'description' => $this->description,
            'image' => $this->img_path,
            'color' => $this->color,
            'percentage' => $this->percentage.' %',
            'date_from_to' => Carbon::parse($this->from_date)->format('F j').' - '.Carbon::parse($this->to_date)->format('F j'),
            'days_left' => $from_date_value->diffInDays($to_date_value).' days left'
        ];
    }
}
