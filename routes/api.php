<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AddressBookApiController;

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


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:api'])->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Address Book API will go here in Step 8
    Route::apiResource('/addresses', AddressBookApiController::class);
});


Route::middleware(['auth:api'])->group(function () {
    Route::apiResource('/addresses', AddressBookApiController::class);
});

Route::get('/default-from', function () {
    return response()->json(
        \App\Models\AddressBook::where('user_id', Auth::id())->where('is_default_from', true)->first()
    );
});

Route::get('/default-to', function () {
    return response()->json(
        \App\Models\AddressBook::where('user_id', Auth::id())->where('is_default_to', true)->first()
    );
});


