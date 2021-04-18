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

// Création de la route page d'accueil index
Route::get('/', [HomeController::class, 'index']);
// Création de la route pour recettes index
// Route::get('/recettes', [RecettesController::class, 'index']);
// Création de la pour contact index
Route::get('/contact', [ContactController::class, 'index']);
// Création de la route pour l'affichage des recettes
// Route::get('/recettes/{title}',[RecettesController::class,'show']);
// Création du formulaire de contact
Route::get('/contact', [ContactController::class, 'create']);
Route::post('/contact', [ContactController::class, 'store']);
Route::get('/contact/all', [ContactController::class, 'show']);
// Création du CRUD RecettesController
Route::resource('recettes', RecettesController::class)->only([
    // On ajoute un only, car on veut seulement que ces pages soit accessible avec ce chemin
    'index', 'show'
]);
    // On n'ajoute pas de conditions, car on veut toutes les pages. 
Route::resource('admin/recettes', RecettesController::class);
