<?php

namespace App\Http\Resources\Api\ConservationAction;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConservationActionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "description" => $this->description,
            "action_date" => $this->action_date,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
