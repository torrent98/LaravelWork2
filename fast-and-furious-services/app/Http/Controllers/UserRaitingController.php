<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Raiting;
use App\Http\Resources\RaitingCollection;

class UserRaitingCOntroller extends Controller
{
    public function index($user_id)
    {
        $raiting = Raiting::get()->where('user', $user_id);
        if (count($raiting) == 0)
            return response()->json('Data not found', 404);
        return new RaitingCollection($raiting);
    }

    public function myrating()
    {
        if(auth()->user()->isAdmin())
            return response()->json('You are not allowed to have ratings.');  
        $raiting = Raiting::get()->where('user', auth()->user()->id);
        if (count($raiting) == 0)
            return response()->json('Data not found', 404);
        return new RaitingCollection($raiting);

    }
}
