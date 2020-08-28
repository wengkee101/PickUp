<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Outlet extends JsonResource
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
            'name' => $this->name,
            'contact' => $this->contact,
            'email' => $this->email,
            'address' => $this->address,
            'city' => $this->city,
            'postcode' => $this->postcode
        ];
    }
}
