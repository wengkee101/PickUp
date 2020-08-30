<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeaSer extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tea_cat_id' => $this->tea_cat_id,
            'name' => $this->name,
            'image' => $this->image,
            'description' => $this->description,
            'stock' => $this->quantity,
            'price' => $this->price,
            'rate' => $this->rate
        ];
    }
}
