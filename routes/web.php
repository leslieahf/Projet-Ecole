<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjoutElevesController;
use App\Http\Controllers\InscriptionController; 
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

Route::get('/confirm/{id}', [ElevesController::class, 'confirm']);

Route::get('/ajouteleves', function (){
    return view('ajouteleves');
});

Route::post('/ajouteleves', [AjoutElevesController::class, 'ajouter']);

Route::get('/inscription', [InscriptionController::class, 'ShowForm']);

Route::post('/inscription', [InscriptionController::class, 'inscription']);

