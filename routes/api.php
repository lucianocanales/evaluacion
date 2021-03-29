<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\HistoriInventoriesController;
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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');

Route::group(['middleware' => ['jwt.verify']], function () {
    // Verifica si está autentificado quien entra a las rutas de este grupo
    Route::get('articles', [ArticlesController::class, 'getArticles']);
    Route::post('article/buy', [HistoriInventoriesController::class, 'buyArticle']);
    Route::post('article/sell', [HistoriInventoriesController::class, 'sellArticle']);
    Route::post('article/count', [HistoriInventoriesController::class, 'countArticle']);
    Route::get('article/{pk}', [HistoriInventoriesController::class, 'getHistorial']);
});
