<?php

use App\Http\Controllers\DogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BreedController;
use App\Http\Controllers\OwnerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('dogs', DogController::class);
Route::resource('breeds', BreedController::class);
Route::resource('owners', OwnerController::class);
Route::resource('users', UserController::class);

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);


 Route::get('dogs/owner/{id}',[DogController::class,'getByOwner']);

 Route::get('dogs/breed/{id}',[DogController::class,'getByBreed']);


 Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    Route::get('my-dogs',[DogController::class,'myDogs']);

    Route::get('/logout',[AuthController::class,'logout']);

    Route::resource('dogs',DogController::class)->only('store','update','destroy');

});

