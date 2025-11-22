<?php

namespace App\Http\Resources\Api\Photo;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhotoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'item_id' => $this->item_id,
            'url' => Storage::url($this->photo_url),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
