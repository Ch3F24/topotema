<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ObjectCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "type" => "Feature",
            "geometry" => [
                "type" => "Point",
                "coordinates" => [
                    $this->address->first()->lng,
                    $this->address->first()->lat
                ]
            ],
            "properties" => [
                "id" => $this->id,
                "name" => $this->alias,
                "desciprion" => $this->description,
                "full_address" => $this->address->first()->address,
                "date_from" =>  intval(Carbon::parse($this->date_from_start)->format('Y')),
                "date_to" => intval(Carbon::parse($this->date_to_end)->format('Y')),
                "category" => $this->categories->pluck('title'),
                "organizations" => $this->organizations->pluck('name'),
                "subject_words" => $this->subjects->pluck('name'),
                "notes" => ""
            ]
        ];
    }
}
