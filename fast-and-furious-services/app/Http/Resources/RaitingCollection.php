<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RaitingCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */

     public static $wrap = 'raitings';

    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
