<?php

namespace App\Http\Resources;

use App\Models\Day;
use App\Models\WeekHour;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->img_path,
            'cover' => $this->cover_path,
            'address' => $this->address,
            'distance' => $this->distance($this->lat,$this->lng,request()->header('lat'),request()->header('lng'),"K")." Km",
            'delivery_time' => $this->delivery_time_value,
            'delivery_fees' => $this->delivery_fees == 0 ? 'free delivery' : $this->delivery_fees_value,
            'description' => $this->description,
            'reviews' => $this->whenLoaded('reviews'),
            'rating'=> $this->reviews->isEmpty() ? 0 : round($this->reviews->pluck('rating')->sum() / $this->reviews->pluck('rating')->count(),1),
            'favorite' => $this->favorites()->whereUserId(auth()->user()->id)->exists() ? 1 : 0,
            'tags' => $this->whenLoaded('tags'),
            'week_hours' => WeekHourResource::collection($this->whenLoaded('weekHours')),
            'today_week_hours' => $this->today_working_hours,
            'status' => $this->status_value,
        ];
    }




    // Get Distance Between Restaurant And User
    // https://www.folkstalk.com/2022/09/find-distance-between-two-coordinate-in-php-with-code-examples.html
    private function distance($lat1, $lon1, $lat2, $lon2, $unit) {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return round($miles * 1.609344);
        } else if ($unit == "N") {
            return round($miles * 0.8684);
        } else {
            return round($miles);
        }
      }
}
