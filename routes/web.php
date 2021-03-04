<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AnnonceController;

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

Route::get('/', [AccueilController::class, 'index']);
Route::get('/annonces/{id}', [AnnonceController::class,'afficherAnnonce']);
Route::get('/annonces/cat/{id}',[AnnonceController::class,'afficherAnnoncesParCategorie']);
Route::get('/annonces/souscat/{id}',[AnnonceController::class,'afficherAnnoncesParSousCategorie']);

Route::get('/annonce/add',[AnnonceController::class,'afficherFormulaireAjouterAnnonce']);
Route::post('/annonce/add',[AnnonceController::class,'ajouterAnnonce']);

Route::get('/annonce/{id}/edit',[AnnonceController::class, 'afficherFormulaireModifierAnnonce']);
Route::put('/annonce/{id}/edit',[AnnonceController::class, 'modifierAnnonce']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
