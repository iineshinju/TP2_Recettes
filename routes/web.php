<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

//Route::get('/', function () {
//    return view('welcome');
//});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecettesController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/recettes', [RecettesController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/recettes/{title}',[RecettesController::class,'show']);
Route::post('/contact', [ContactController::class, 'store']);
Route::get('/contact/all', [ContactController::class, 'show']);

// Création du formulaire de contact
// Route::get('/contact', )