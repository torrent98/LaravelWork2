<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public static $wrap = 'user';

    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            'username' => $this->resource->username,
            'email' => $this->resource->email,
            'role' => $this->resource->role
        ];
    }
}
