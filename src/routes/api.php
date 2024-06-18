<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, PlaceController, WishListController};


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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});



Route::get('/places',[PlaceController::class, 'index']);
Route::post('/register',[AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/wishlist/add/{placeId}', [WishlistController::class, 'add']);
    Route::get('/wishlist', [WishlistController::class, 'index']);
});
Route::middleware(['auth:api', 'role:admin'])->group(function () {
    Route::post('/add_place',[PlaceController::class, 'store']);
    Route::get('/wishlists',[WishListController::class, 'indexAll']);
    Route::get('/users', [AuthController::class, 'indexAll']);

});
