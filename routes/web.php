<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\HistoriInventoriesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ArticlesController::class, 'index'])->name('articles.index');
Route::get('article/{pk}', [HistoriInventoriesController::class, 'index'])->name('historial.index');
