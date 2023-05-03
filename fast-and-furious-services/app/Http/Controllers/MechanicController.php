<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use App\Http\Resources\MechanicResource;
use App\Http\Resources\MechanicCollection;

use App\Models\Raiting;

use App\Models\Service;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MechanicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mechanics = Mechanic::all();

        return new MechanicCollection($mechanics);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:150',
            'phone_number' => 'required|string|max:150|unique:mechanics',
            'years_of_experience' => 'required|numeric|lte:30|gte:1',
            'email' => 'required|email|unique:mechanics',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        if(auth()->user()->isUser())
            return response()->json('You are not authorized to create new mechanic.'); 

        $mechanic = Mechanic::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'years_of_experience' => $request->years_of_experience,
            'email' => $request->email,
        ]);

        return response()->json(['Mechanic is created successfully.', new MechanicResource($mechanic)]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Mechanic $mechanic)
    {
        return new MechanicResource($mechanic);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mechanic $mechanic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:150',
            'phone_number' => 'required|string|max:150|unique:mechanics,phone_number,'.$mechanic->id,
            'years_of_experience' => 'required|numeric|lte:30|gte:1',
            'email' => 'required|email|unique:mechanics,email,'.$mechanic->id,
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        if(auth()->user()->isUser())
            return response()->json('You are not authorized to update mechanic.');      

        $mechanic->name = $request->name;
        $mechanic->phone_number = $request->phone_number;
        $mechanic->years_of_experience = $request->years_of_experience;
        $mechanic->email = $request->email;

        $mechanic->save();

        return response()->json(['Mechanic is updated successfully.', new MechanicResource($mechanic)]);

    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mechanic $mechanic)
    {
        if(auth()->user()->isUser())
            return response()->json('You are not authorized to delete mechanic.');
            
        $raiting = Raiting::get()->where('mechanic', $mechanic_id);
        if (count($raiting) > 0)
            return response()->json('You cannot delete mechanic that have ratings.');

        $mechanic->delete();

        return response()->json('Mechanic is deleted successfully.');

    }
}
