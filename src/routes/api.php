<?php

use App\Events\RacketUpdated;
use App\Http\Controllers\V1\ProfileController;
use App\Http\Controllers\V1\RacketController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//event(new RacketUpdated('message lol'));

Route::group(['prefix' => 'v1'], function () {
    Route::resource('profile', ProfileController::class);
    Route::post('racket', [RacketController::class, 'update']);
    Route::get('login', [User::class, 'create']);
});
