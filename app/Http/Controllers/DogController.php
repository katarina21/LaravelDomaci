<?php

namespace App\Http\Controllers;

use App\Http\Resources\DogResource;
use App\Models\Dog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public static $wrap = 'dogs';

    public function index()
    {
        $dogs = Dog::all();

        $my_dogs=array();
        foreach($dogs as $dog){
            array_push($my_dogs,new DogResource($dog));
        }

        return $my_dogs;
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

    public function getByDog($dog_id){
        $dogs=Dog::get()->where('owner_id',$owner_id);

        if(count($dogs)==0){
            return response()->json('Owner with this id does not exist!');
        }

        $my_dogs=array();
        foreach($dogs as $dog){
            array_push($my_dogs,new DogResource($dog));
        }

        return $my_dogs;
    }

    public function myDogs(Request $request){
        $dogs=Dog::get()->where('user_id',Auth::user()->id);
        if(count($dogs)==0){
            return 'You do not have saved dogs!';
        }
        $my_dogs=array();
        foreach($dogs as $dog){
            array_push($my_dogs,new DogResource($dog));
        }

        return $my_dogs;
    }

    public function getByBreed($breed_id){
        $dogs=Dog::get()->where('breed_id',$breed_id);

        if(count($dogs)==0){
            return response()->json('ID of this breed does not exist!');
        }

        $my_dogs=array();
        foreach($dogs as $dog){
            array_push($my_dogs,new DogResource($dog));
        }

        return $my_dogs;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|String|max:255',
            'color'=>'required|String|max:255',
            'age'=>'required|Integer|max:18',
            'owner_id'=>'required',
            'breed_id'=>'required'

        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $dog=new Dog;
        $dog->name=$request->name;
        $dog->color=$request->color;
        $dog->age=$request->age;
        $dog->user_id=Auth::user()->id;
        $dog->breed_id=$request->breed_id;
        $dog->owner_id=$request->owner_id;

        $dog->save();

        return response()->json(['Dog is saved successfully!',new DogResource($dog)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dog  $dress
     * @return \Illuminate\Http\Response
     */
    public function show(Dog $dog)
    {
        return new DogResource($dog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function edit(Dog $dog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dog $dog)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|String|max:255',
            'color'=>'required|String|max:255',
            'age'=>'required|Integer|max:18',
            'owner_id'=>'required',
            'breed_id'=>'required'

        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        
        $dog=new Dog;
        $dog->name=$request->name;
        $dog->color=$request->color;
        $dog->age=$request->age;
        $dog->user_id=Auth::user()->id;
        $dog->breed_id=$request->breed_id;
        $dog->owner_id=$request->owner_id;

        $result=$dog->update();

        if($result==false){
            return response()->json('Difficulty with updating!');
        }
        return response()->json(['Dog is updated successfully!',new DogResource($dog)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dog $dog)
    {
        $dog->delete();

        return response()->json('Dog '.$dog->name .' is deleted successfully!');
    }
}
