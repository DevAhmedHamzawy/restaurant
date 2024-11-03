<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class WeekHourResource extends JsonResource
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
            'day' => $this->day->name,
            'time' => Carbon::parse($this->from)->format('g:i A') .'-'. Carbon::parse($this->to)->format('g:i A'),
            'day_off' => $this->to == null && $this->from == null ? 'true' : 'false'
        ];
    }
}
