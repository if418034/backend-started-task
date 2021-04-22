<?php

use App\Http\Controllers\AgencyController;
use App\Http\Controllers\InternshipController;
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
//Route::get('/internships', [InternshipController::class, 'index']);
//Route::post('/internships', [InternshipController::class, 'store']);

Route::resource('agencies', AgencyController::class);
Route::resource('internships', InternshipController::class);
Route::get('/internships/search/{name}', [InternshipController::class, 'search']);
Route::get('/internships/agency/{name}', [InternshipController::class, 'perAgency']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
