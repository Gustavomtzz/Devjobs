<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\VacanteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/', HomeController::class)->middleware('auth')->name('home');


//** VACANTES RUTAS PRIVADAS */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'rol.reclutador',
])->group(function () {
    Route::get('/dashboard', [VacanteController::class, 'index'])->name('vacantes.index');
    Route::get('/vacantes/create', [VacanteController::class, 'create'])->name('vacantes.create');
    Route::get('/vacantes/{vacante}/edit', [VacanteController::class, 'edit'])->name('vacantes.edit');
});
//VACANTES RUTAS PUBLICAS
Route::get('/vacantes/{vacante}', [VacanteController::class, 'show'])->name('vacantes.show');

/**FIN VACANTES RUTAS */

/**CANDIDATOS RUTAS PRIVADAS */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'rol.reclutador'
])->group(function () {
    Route::get('/candidatos/{vacante}', [CandidatoController::class, 'index'])->name('candidatos.index');
});

/** FIN CANDIDATOS RUTAS */

//**  RUTAS VERIFICAR EMAIL */
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
/** FIN RUTAS VERIFICAR EMAIL */

/** NOTIFICACIONES */
//CONTROLADOR DE TIPO __Invoke, llama automaticamente al unico metodo que tiene.
Route::middleware(
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'rol.reclutador',
)->group(function () {
    Route::get('/notificaciones', NotificacionController::class)->name('notificaciones');
});
/** FIN NOTIFICACIONES */
