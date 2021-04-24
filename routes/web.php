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
    Route::get('/alumnos/search', [AlumnoController::class, 'search'])
        ->name('alumnos.search');
    Route::get('/medicamentos/search', [MedicamentoController::class, 'search'])
        ->name('medicamentos.search');
    Route::get('/medicos/search', [MedicoController::class, 'search'])
        ->name('medicos.search');
    Route::get('/consultas/search', [ConsultaController::class, 'search'])
        ->name('consultas.search');
    Route::post('/alumnos/search', [AlumnoController::class, 'filter'])
        ->name('alumnos.search');
    Route::post('/medicamentos/search', [MedicamentoController::class, 'filter'])
        ->name('medicamentos.search');
    Route::post('/medicos/search', [MedicoController::class, 'filter'])
        ->name('medicos.search');
    Route::post('/consultas/search', [ConsultaController::class, 'filter'])
        ->name('consultas.search');

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
