<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressCollection extends JsonResource
{
    public static $wrap = 'features';

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "type" => "Feature",
            "geometry" => [
                "type" => "Point",
                "coordinates" => [
                    $this->lng,
                    $this->lat
                ]
            ],
            "properties" => [
                "id" => $this->id,
                "name" => $this->city . ', ' . $this->public_place_name . ' ' . $this->public_place_type . ' ' . $this->houseno . ', ' . $this->postal_code,
                "year" => 1950, //Todo: nincs ertek
                "category" => $this->objects->first()->categories->pluck('title'),
                "organizations" => $this->objects->first()->organizations->pluck('name'),
                "subject_words" => $this->objects->first()->subjects->pluck('name'),
                "notes" => ""
            ]
        ];
    }
}
