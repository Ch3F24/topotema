<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResouce extends JsonResource
{
    public $preserveKeys = true;

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'value'     => $this->title,
            'label'     => $this->title,
            'description' => $this->description,
            'clicked'   => false,
            'disabled'  => false,
            'checked'   => true,
            'type'      =>  "category"
        ];
    }
}
