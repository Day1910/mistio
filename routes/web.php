<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

Route::post('/registrar', [PagesController::class, 'fnRegistrarCurso'] ) ->name('xRegistrarCurso');

Route::get('/listaCurso',[PagesController::class, 'fnListaCurso'] )->name('xListaCurso');

Route::get('/detalleCurso/{id}',[PagesController::class, 'fnDetalleCurso'] ) ->name('xDetalleCurso');

Route::get('/actualizarCurso/{id}',[PagesController::class, 'fnActualizarCurso'] ) ->name('xActualizarCurso');
//Route::get('/actualizar/{id}',[PagesController::class, 'fnUpdate'] ) ->name('Estudiante.xUpdate');

Route::delete('/eliminarCurso/{id}',[PagesController::class, 'fnEliminarCurso'] ) ->name('xEliminarCurso');






Route::get('/', [PagesController::class, 'fnIndex'] ) ->name('xIndex');

Route::post('/', [PagesController::class, 'fnRegistrar'] ) ->name('Estudiante.xRegistrar');

Route::get('/lista',[PagesController::class, 'fnLista'] )->name('xLista');

Route::get('/detalle/{id}',[PagesController::class, 'fnEstDetalle'] ) ->name('Estudiante.xDetalle');

Route::get('/galeria/{numero?}',[PagesController::class, 'fnGaleria'] ) ->  where('numero', '[0-9]+')->name('xGaleria');

Route::get('/actualizar/{id}',[PagesController::class, 'fnEstActualizar'] ) ->name('Estudiante.xActualizar');
//Route::get('/actualizar/{id}',[PagesController::class, 'fnUpdate'] ) ->name('Estudiante.xUpdate');

Route::delete('/eliminar/{id}',[PagesController::class, 'fnEliminar'] ) ->name('Estudiante.xEliminar');









Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
