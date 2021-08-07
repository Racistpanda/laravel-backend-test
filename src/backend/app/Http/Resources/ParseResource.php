<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'tag' => $this->tag,
            'data' => ParseDataResource::collection($this->parseData),
            'done' => $this->percentageDone(),
            'created_at' => $this->created_at,
        ];
    }
}
