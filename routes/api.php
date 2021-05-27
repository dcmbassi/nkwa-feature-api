<?php

use App\Http\Controllers\PointController;
use App\Models\Total;
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

Route::get('/points', [PointController::class, 'index']);
Route::post('/points', [PointController::class, 'store']);
Route::post('/set-total', [PointController::class, 'setTotal']);

Route::get('/reset-points', function () {
    return Total::find(1)->update(['total' => 300]);
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
