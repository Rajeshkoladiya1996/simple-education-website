<?php

use Illuminate\Http\Request;

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
Route::get('sticker/{name}', 'API\APIBaseController@sticker');
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//      echo 'sdsdsd';
//      die;
//   return $request->user();
//});
