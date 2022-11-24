<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PhotoCollection extends JsonResource
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
            'title' => $this->title,
            'storage_place' => $this->storage_place,
            'creator' => $this->creator,
            'description' => $this->description,
            'src' => 'data:' . $this->file->mimetype . ';base64,' . chunk_split(base64_encode($this->file->file_content)),
            'thumbnail' => 'data:' . $this->file->mimetype . ';base64,' . chunk_split(base64_encode($this->file->thumbnail_content)),
        ];
    }
}
