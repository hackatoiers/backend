<?php

namespace App\Http\Resources\Api\Auditing;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuditingResource extends JsonResource
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
            'event' => $this->event,
            'user' => $this->user?->name ?? null,
            'auditable_type' => $this->auditable_type,
            'auditable_id' => $this->auditable_id,
            'old_values' => $this->old_values,
            'new_values' => $this->new_values,
            'created_at' => $this->created_at,
            'ip_address' => $this->ip_address,
            'url' => $this->url,
        ];
    }
}
