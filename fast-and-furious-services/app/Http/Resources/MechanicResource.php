<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MechanicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public static $wrap = 'mechanic'; 

    public function toArray($request)
    {
        //return parent::toArray($request);

        return[

            'name' => $this->resource->name,
            'phone_number' => $this->resource->phone_number,
            'years_of_experience' => $this->resource->years_of_experience,
            'email' => $this->resource->email,

        ];

    }
}
