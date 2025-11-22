<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ItemResources extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'number' => $this->number,

            'length' => $this->length,
            'height' => $this->height,
            'width' => $this->width,
            'weight' => $this->weight,

            'archeological_site' => $this->archeological_site,
            'technic' => $this->technic,
            'reference' => $this->reference,

            'integrity' => $this->integrity,
            'conservation_state' => $this->conservation_state,
            'conservation_detail' => $this->conservation_detail,

            'location_id' => $this->location_id,
            'subtype_id' => $this->subtype_id,
            'collection_id' => $this->collection_id,
            'ethnic_group_id' => $this->ethnic_group_id,

            'photos' => $this->whenLoaded('photos', function () {
                return $this->photos->map(function ($photo) {
                    return Storage::url($photo->photo_url);
                });
            }),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
