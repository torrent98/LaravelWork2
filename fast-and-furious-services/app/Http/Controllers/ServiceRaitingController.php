<?php

namespace App\Http\Controllers;

use App\Models\Raiting;
use App\Http\Resources\RaitingCollection;

use Illuminate\Http\Request;

class ServiceRaitingController extends Controller
{
    public function index($service_id)
    {
        $raiting = Raiting::get()->where('service', $service_id);
        if (count($raiting) == 0)
            return response()->json('Data not found', 404);
        return new RaitingCollection($raiting);
    }
}
