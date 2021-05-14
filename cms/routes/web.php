<?php

use App\Http\Controllers\save_replayController;
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

//Route view '/' in create
Route::get('/',[save_replayController::class,'create'])->name('create');

Route::view('add','create');

// Route::get('create',[save_replayController::class,'index']);

//
Route::post('add',[save_replayController::class,'store']);
Route::get('/',[save_replayController::class,'show']);
