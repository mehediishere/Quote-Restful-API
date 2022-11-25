<?php

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

Route::controller(\App\Http\Controllers\ApiAuthController::class)->group(function (){
    Route::post('/register', 'register');
    Route::post('/login', 'login');

    Route::middleware('auth:sanctum')->group(function (){
        Route::get('/logout', 'logout');
    });

});

Route::controller(\App\Http\Controllers\QuoteController::class)->group(function (){
   Route::get('/quotes', 'showAll');
   Route::get('/quotes/{id}', 'showSingleQuote');
   Route::get('/quotes/search/{quote}', 'search');

   Route::middleware('auth:sanctum')->group(function (){
       Route::post('/quotes', 'newQuote');
       Route::put('/quotes/{id}', 'updateQuote');
       Route::delete('/quotes/{id}', 'removeQuote');
   });

});

