<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjoutUtilisateursController;
use App\Http\Controllers\InscriptionController; 
use App\Http\Controllers\ConnexionController; 
use App\Http\Controllers\ProfilController; 
use App\Http\Controllers\ListeUtilisateursController; 
use App\Http\Controllers\AjoutObjetsController;
use App\Http\Controllers\RechercherObjetsController;
use App\Http\Controllers\AjoutOutilsController;
use App\Http\Controllers\ListeOutilsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ModifUtilisateursController;
use App\Http\Controllers\SupprimerObjetsController;
use App\Http\Controllers\SupprimerOutilsController;
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

Route::view('/', 'accueil');

Route::get('/ajoututilisateurs', [AjoutUtilisateursController::class, 'showForm']);

Route::post('/ajoututilisateurs', [AjoutUtilisateursController::class, 'ajouter']);

Route::get('/inscription', [InscriptionController::class, 'showForm']);

Route::post('/inscription', [InscriptionController::class, 'inscription']);

Route::get('/connexion', [ConnexionController::class, 'showForm']);

Route::post('/connexion', [ConnexionController::class, 'connexion']);

Route::view('/visualisation', 'visualisation');

Route::get('/profil', [ProfilController::class, 'showForm']);

Route::post('/profil', [ProfilController::class, 'update']);

Route::get('/profilautres', [ListeUtilisateursController::class, 'liste']);

Route::get('/ajoutobjets', [AjoutObjetsController::class, 'showForm']);

Route::post('/ajoutobjets', [AjoutObjetsController::class, 'ajouter']);

Route::get('/visualisation', [RechercherObjetsController::class, 'rechercher']);

Route::get('/ajoutoutils', [AjoutOutilsController::class, 'showForm']);

Route::post('/ajoutoutils', [AjoutOutilsController::class, 'ajouter']);

Route::get('/administration', [AdminController::class, 'liste2']);

Route::get('/administration/{id}', [ModifUtilisateursController::class, 'showForm']);

Route::post('/administration/{id}', [ModifUtilisateursController::class, 'update']);

Route::delete('/administration/utilisateur/{id}', [ModifUtilisateursController::class, 'delete']);

Route::delete('/administration/objet/{id}', [SupprimerObjetsController::class, 'delete']);

Route::delete('/administration/outil/{id}', [SupprimerOutilsController::class, 'delete']);