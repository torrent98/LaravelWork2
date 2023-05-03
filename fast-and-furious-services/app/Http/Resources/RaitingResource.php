<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\UserResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\MechanicResource;

class RaitingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

     public static $wrap = 'raiting';

    public function toArray(Request $request): array
    {
        return [
            'date_and_time' => $this->resource->date_and_time,
            'user' => new UserResource($this->resource->userkey),
            'mechanic' => new MechanicResource($this->resource->mechanickey),
            'service' => new ServiceResource($this->resource->servicekey),
            'rating' => $this->resource->rating,
            'note' => $this->resource->note,
        ];
    }
}
