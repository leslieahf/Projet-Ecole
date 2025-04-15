<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjoutUtilisateursController;
use App\Http\Controllers\InscriptionController; 
use App\Http\Controllers\ConnexionController; 
use App\Http\Controllers\CompteController; 
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
use App\Http\Controllers\RapportController;
use App\Http\Controllers\DemandeSuppressionController;
use App\Http\Controllers\ControlerStatutController;
use App\Http\Controllers\ModifObjetsController;
use App\Http\Controllers\AssocierObjPiecesController;
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

Route::get('/deconnexion', [CompteController::class, 'deconnexion']);

Route::view('/visualisation', 'visualisation') -> middleware('auth.custom');

Route::get('/profil', [ProfilController::class, 'showForm']) -> middleware('auth.custom');

Route::post('/profil', [ProfilController::class, 'update']) -> middleware('auth.custom');

Route::get('/profilautres', [ListeUtilisateursController::class, 'liste']) -> middleware('auth.custom');

Route::get('/ajoutobjets', [AjoutObjetsController::class, 'showForm'])-> middleware('auth.advanced_or_expert');

Route::post('/ajoutobjets', [AjoutObjetsController::class, 'ajouter'])-> middleware('auth.advanced_or_expert');

Route::get('/visualisation', [RechercherObjetsController::class, 'rechercher']) -> middleware('auth.custom');

Route::get('/ajoutoutils', [AjoutOutilsController::class, 'showForm'])-> middleware('auth.advanced_or_expert');

Route::post('/ajoutoutils', [AjoutOutilsController::class, 'ajouter'])-> middleware('auth.advanced_or_expert');

Route::get('/administration', [AdminController::class, 'liste2'])-> middleware('auth.expert');

Route::get('/administration/{id}', [ModifUtilisateursController::class, 'showForm'])-> middleware('auth.expert');

Route::post('/administration/{id}', [ModifUtilisateursController::class, 'update'])-> middleware('auth.expert');

Route::delete('/administration/utilisateur/{id}', [ModifUtilisateursController::class, 'delete'])-> middleware('auth.expert');

Route::delete('/administration/objet/{id}', [SupprimerObjetsController::class, 'delete'])-> middleware('auth.expert');

Route::delete('/administration/outil/{id}', [SupprimerOutilsController::class, 'delete'])-> middleware('auth.expert');

Route::view('/gestion', 'gestion')-> middleware('auth.advanced_or_expert');

Route::get('/rapport', [RapportController::class, 'generatePDF'])->middleware('auth.advanced_or_expert');

Route::get('/gestion', [DemandeSuppressionController::class, 'showlisteobjets'])->middleware('auth.advanced_or_expert');

Route::get('/gestion/{id}', [ModifObjetsController::class, 'showForm'])->middleware('auth.advanced_or_expert');

Route::post('/gestion/{id}', [ModifObjetsController::class, 'update'])->middleware('auth.advanced_or_expert');

Route::post('/gestion/demandesup/{id}', [DemandeSuppressionController::class, 'demandesup'])->middleware('auth.advanced_or_expert');

Route::post('/gestion/controlstatut/{id}', [ControlerStatutController::class, 'controlstatut'])->middleware('auth.advanced_or_expert');

Route::post('/gestion/controlstatut/{id}', [ControlerStatutController::class, 'controlstatut'])->middleware('auth.advanced_or_expert');

Route::post('/gestion/association/{id}', [AssocierObjPiecesController::class, 'associer'])->middleware('auth.advanced_or_expert');