<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjoutUtilisateursController;
use App\Http\Controllers\InscriptionController; 
use App\Http\Controllers\ConnexionController; 
use App\Http\Controllers\ProfilController; 
use App\Http\Controllers\ListeUtilisateursController; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::get('/ajoututilisateurs', [AjoutUtilisateursController::class, 'showForm']);

Route::post('/ajoututilisateurs', [AjoutUtilisateursController::class, 'ajouter']);

Route::get('/inscription', [InscriptionController::class, 'showForm']);

Route::post('/inscription', [InscriptionController::class, 'inscription']);

Route::get('/connexion', [ConnexionController::class, 'showForm']);

Route::post('/connexion', [ConnexionController::class, 'connexion']);

Route::view('/gestion', 'gestion');

Route::get('/profil', [ProfilController::class, 'showForm']);

Route::post('/profil', [ProfilController::class, 'update']);

Route::get('/profilautres', [ListeUtilisateursController::class, 'liste']);

