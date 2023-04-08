<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Raiting;
use App\Http\Resources\RaitingCollection;

class MechanicRaitingController extends Controller
{
    public function index($mechanic_id)
    {
        $raiting = Raiting::get()->where('mechanic', $mechanic_id);
        if (count($apprat) == 0)
            return response()->json('Data not found', 404);
        return new RaitingCollection($raiting);
    }
}
