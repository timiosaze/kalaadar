<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\TimeController;
use App\Models\Country;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/countries', [CountryController::class, 'countries']);
Route::get('/meetings', [MeetingController::class, 'list'])->name('zoom.list');
Route::post('/meetings', [MeetingController::class, 'create'])->name('zoom.create');
Route::get('/meetings/{id}', [MeetingController::class, 'get'])->name('zoom.get');
Route::put('/meetings/{id}', [MeetingController::class, 'update'])->name('zoom.get');
Route::delete('/meetings/{id}', [MeetingController::class, 'delete'])->name('zoom.get');

Route::get('/times', [TimeController::class, 'times']);
