<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'title' => $this->id,
            'category_title' => $this->objects->first()->categories->first()->title,
            'category_content' => $this->objects->first()->categories->first()->content,
            'object_content' => $this->objects->first()->content,
            'photos' => PhotoCollection::collection($this->objects->first()->photos)
        ];
    }
}
