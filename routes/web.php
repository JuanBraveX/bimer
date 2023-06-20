<?php

use App\Http\Controllers\PlaneController;
use App\Http\Controllers\SuscripcioneController;
use App\Http\Controllers\RedeController;
use App\Http\Controllers\FicheroController;
use App\Http\Controllers\BimerController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::middleware(['auth', 'verified'])->group(function () {
    // Rutas accesibles para usuarios invitados
    //Route::resource('bimers', BimerController::class);
    //Route::resource('planes', PlaneController::class);
    //Route::resource('suscripciones', SuscripcioneController::class);

    Route::get('planes', [PlaneController::class, 'index'])->name('planes.index');

    Route::get('bimers', [BimerController::class, 'index'])->name('bimers.index');
    Route::get('bimers/{bimer}/edit', [BimerController::class, 'edit'])->name('bimers.edit');
    Route::put('bimers/{bimer}', [BimerController::class, 'update'])->name('bimers.update');

    Route::get('suscripciones', [SuscripcioneController::class, 'index'])->name('suscripciones.index');
    Route::get('suscripciones/{suscripcione}', [SuscripcioneController::class, 'show'])->name('suscripciones.show');
    Route::post('suscripciones', [SuscripcioneController::class, 'store'])->name('suscripciones.store');

    //Route::resource('redes', RedeController::class);
    //Route::resource('ficheroes', FicheroController::class);

    Route::post('/enlacePago', [PlaneController::class, 'enlacePago'])->name('planes.enlacePago');
    Route::get('/storeP/{id_plan}/{cantidad}/{token}', [SuscripcioneController::class, 'storeP'])->name('suscripciones.storeP');
    Route::get('/indexP', [PlaneController::class, 'indexP'])->name('planes.indexP');
});


// Ruta pública para Bimers.show
// Ruta para bimer.show accesible sin autenticación
Route::get('fiche/{path}', [FicheroController::class, 'deleteFolder'])->name('deleteFolder');
Route::get('ficher/{path}/{id}', [FicheroController::class, 'deleteFicher'])->name('deleteFicher');

Route::get('bimers/{bimer}', [BimerController::class, 'show'])->name('bimers.show');

Auth::routes(['verify' => true]);

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/indexF', [PlaneController::class, 'indexF'])->name('planes.indexF');

