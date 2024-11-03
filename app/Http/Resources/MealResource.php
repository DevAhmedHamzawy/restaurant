<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
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
            'restaurant_id' => $this->restaurant_id,
            'tag_id' => $this->tag_id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price_value,
            'image' => $this->img_path,
            'reviews' => $this->whenLoaded('reviews'),
            'rating' => empty($this->reviews) || $this->reviews->pluck('rating')->count() == 0 ?  0 : round($this->reviews->pluck('rating')->sum() / $this->reviews->pluck('rating')->count(), 1),
            'favorite' => $this->favorites()->whereUserId(auth()->user()->id)->exists() ? 1 : 0,
            'features' => $this->whenLoaded('features'),
            'ingredients' => IngredientResource::collection($this->whenLoaded('ingredients')),
            'sizes' => SizeResource::collection($this->whenLoaded('sizes')),
            'options' => OptionResource::collection($this->whenLoaded('options')),
            'drinks' => DrinkResource::collection($this->whenLoaded('drinks')),
            'sides' => SideResource::collection($this->whenLoaded('sides')),
        ];
    }
}
