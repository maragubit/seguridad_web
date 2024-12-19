<?php

use App\Http\Controller\Prueba\PruebaController as PruebaPruebaController;
use App\Http\Controllers\CoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Proyecto\ProyectoController;
use App\Http\Controllers\Prueba\PruebaController;
use Illuminate\Support\Facades\Route;
use App\Models\Categoria;
use App\Models\Proyecto;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/',[CoreController::class,'index'])->name('index');

############################################################
##                       Proyectos                          ##
############################################################

Route::group(['prefix' => 'proyectos'], function() {
    Route::get('/mis-proyectos', [ProyectoController::class, 'proyectos_list'])->name('proyecto.misproyectos');
    Route::get('/crear', [ProyectoController::class, 'crear_form'])->name('proyecto.crear');
    Route::post('/crear', [ProyectoController::class, 'store'])->name('proyecto.crear');
    Route::get('/ver/{proyecto}', [ProyectoController::class, 'show'])->name(name:'proyecto.show');
    Route::get('/borrar/{proyecto}', [ProyectoController::class, 'delete'])->name(name:'proyecto.delete');
    Route::get('/edit/{proyecto}', [ProyectoController::class, 'edit'])->name(name:'proyecto.edit');
    Route::post('/update/{proyecto}', [ProyectoController::class, 'update'])->name(name:'proyecto.update');
});
############################################################
##                       Pruebas                         ##
############################################################
Route::group(['prefix' => 'pruebas'], function() {
Route::get('/pruebas', [PruebaController::class, 'index'])->name('prueba.index');
});



Route::get('/dashboard', function () {
    $categorias=Categoria::all();
    return view('index',[
        "categorias"=>$categorias,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
