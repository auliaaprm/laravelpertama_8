<?php

use App\Http\Controllers\Api\CobaController;
use App\Http\Controllers\Api\GroupsController;
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

Route::get('', [CobaController::class, 'index']);
Route::get('/api/groups', [GroupsController::class, 'index']);
Route::resources([
    'friends' => CobaController::class,
    'groups'=> GroupsController::class,
]);