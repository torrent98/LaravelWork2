<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\ServiceCollection;

use App\Models\Raiting;
use App\Models\Mechanic;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ServiceCollection(Service::all());
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
            'name' => 'required|string|max:150|unique:services',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        if(auth()->user()->isUser())
            return response()->json('You are not authorized to create new services.');  

        $service = Service::create([
            'name' => $request->name,
        ]);

        return response()->json(['Service is created successfully.', new ServiceResource($service)]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return new ServiceResource($service);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
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

    //izbacio Service $service iz parametara
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:150|unique:services,name,' .$service->id,
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        if(auth()->user()->isUser())
            return response()->json('You are not authorized to update services.');   

        $service->name = $request->name;

        $service->save();

        return response()->json(['Service is updated successfully.', new ServiceResource($service)]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if(auth()->user()->isUser())
        return response()->json('You are not authorized to delete services.'); 

        $raiting = Raiting::get()->where('service', $service->id);
        if (count($raiting) > 0)
            return response()->json('You cannot delete services that have ratings.');
            
        $service->delete();

        return response()->json('Service is deleted successfully.');
    }
}
