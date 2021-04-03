<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resources([
        'alumnos' => AlumnoController::class,
        'medicamentos' => MedicamentoController::class,
        'medicos' => MedicoController::class,
        'consultas' => ConsultaController::class
    ]);

    Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
    Route::post('/reportes', [ReporteController::class, 'show'])->name('reportes.show');

    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('/roles', [RoleController::class, 'changeRole'])->name('roles.show');
});
