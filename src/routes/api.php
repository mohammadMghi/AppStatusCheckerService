<?php

use App\Http\Controllers\ExpiredSubscriptionsCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get('/appStoreStatus', [AppstroreStatusContoller::class, 'index']);
    Route::get('/googlePlayStatus', [UserController::class, 'index']);

    Route::get('/getExpiredCount', [ExpiredSubscriptionsCount::class, 'index']);
});

 
 