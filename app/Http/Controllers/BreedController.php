<?php

namespace App\Http\Controllers;

use App\Http\Resources\BreedResource;
use App\Models\Breed;
use Illuminate\Http\Request;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breeds = Breed::all();

        return BreedResource::collection($breeds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Breed  $breed
     * @return \Illuminate\Http\Response
     */
    public function show(Breed $breed)
    {
        return new BreedResource($breed);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Breed  $breed
     * @return \Illuminate\Http\Response
     */
    public function edit(Breed $breed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Breed  $breed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Breed $breed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Breed  $breed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Breed $breed)
    {
        //
    }
}
