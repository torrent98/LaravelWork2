<?php

namespace App\Http\Controllers;

use App\Models\Raiting;
use App\Http\Resources\RaitingResource;
use App\Http\Resources\RaitingCollection;

use App\Models\Mechanic;
use App\Models\Service;
use App\Models\User;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class RaitingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new RaitingCollection(Raiting::all());
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date_and_time' => 'required|date',
            'mechanic' => 'required|numeric|gte:1|lte:10',
            'service' => 'required|numeric|gte:1|lte:5',
            'rating' => 'required|numeric|lte:5|gte:1',
            'note' => 'required|string|min:20',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        if(auth()->user()->isAdmin())
            return response()->json('You are not authorized to create new ratings.'); 

        $raiting = Raiting::create([
            'date_and_time' => $request->date_and_time,
            'user' => auth()->user()->id,
            'mechanic' => $request->providers,
            'service' => $request->service,
            'rating' => $request->rating,
            'note' => $request->note,
        ]);

        return response()->json(['Rating is created successfully.', new RaitingResource($raiting)]);

    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Raiting  $raiting
     * @return \Illuminate\Http\Response
     */
    public function show(Raiting $raiting)
    {
        return new RaitingResource($raiting);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\AppointmentRating  $apprat
     * @return \Illuminate\Http\Response
     */
    public function edit(Raiting $raiting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Raiting $raiting)
    {
        $validator = Validator::make($request->all(), [
            'date_and_time' => 'required|date',
            'user' => 'required|numeric|digits_between:1,5',
            'mechanic' => 'required|numeric|gte:1|lte:10',
            'service' => 'required|numeric|gte:1|lte:5',
            'rating' => 'required|numeric|lte:5|gte:1',
            'note' => 'required|string|min:20',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        if(auth()->user()->isAdmin())
            return response()->json('You are not authorized to update ratings.');    

        if(auth()->user()->id != $raiting->user)
            return response()->json('You are not authorized to update someone elses ratings.');     

        $raiting->date_and_time = $request->date_and_time;
        $raiting->user = auth()->user()->id;
        $raiting->mechanic = $request->providers;
        $raiting->service = $request->service;
        $raiting->rating = $request->rating;
        $raiting->note = $request->note;
        
        $raiting->save();

        return response()->json(['Rating is updated successfully.', new RaitingResource($raiting)]);

    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Raiting $raiting)
    {
        if(auth()->user()->isAdmin())
            return response()->json('You are not authorized to delete ratings.');    

        if(auth()->user()->id != $apprat->user)
            return response()->json('You are not authorized to delete someone elses ratings.');

        $raiting->delete();

        return response()->json('Rating is deleted successfully.');

    }
}
