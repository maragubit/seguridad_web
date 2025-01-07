<?php

use App\Http\Controller\Prueba\PruebaController as PruebaPruebaController;
use App\Http\Controllers\CoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Proyecto\ProyectoController;
use App\Http\Controllers\Prueba\PruebaController;
use App\Http\Controllers\Herramienta\HerramientaController;
use App\Http\Controllers\InformeController;
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
    Route::get('/ver/{proyecto}', [ProyectoController::class, 'show'])->name('proyecto.show');
    Route::get('/borrar/{proyecto}', [ProyectoController::class, 'delete'])->name('proyecto.delete');
    Route::get('/edit/{proyecto}', [ProyectoController::class, 'edit'])->name('proyecto.edit');
    Route::post('/update/{proyecto}', [ProyectoController::class, 'update'])->name('proyecto.update');
    Route::get('/pruebas/{categoria}/proyecto/{proyecto}',[ProyectoController::class, 'pruebas_proyecto'])->name('proyecto.pruebas');
    Route::get('/detallada/{proyecto}/{prueba}', [ProyectoController::class, 'prueba_detallada'])->name('proyecto.prueba_detallada');
    Route::get('/{proyecto}/{prueba}/{superada}', [ProyectoController::class, 'prueba_superada'])->name('proyecto.prueba_superada');
    Route::post('/{proyecto_prueba}/actualizar', [ProyectoController::class, 'post_prueba_detallada'])->name('proyecto.post_prueba_detallada');
    

});
############################################################
##                       Pruebas                         ##
############################################################
Route::group(['prefix' => 'pruebas'], function() {
Route::get('/pruebas', [PruebaController::class, 'index'])->name('prueba.index');
Route::get('/create', [PruebaController::class, 'create'])->name('prueba.create');
Route::post('/create', [PruebaController::class, 'store']);
Route::get('/edit/{prueba}', [PruebaController::class, 'edit'])->name('prueba.edit');
Route::put('/update/{prueba}', [PruebaController::class, 'update'])->name('prueba.update');
Route::get('/show/{prueba}', [PruebaController::class, 'show'])->name('prueba.show');
});

############################################################
##                       Herramientas                         ##
############################################################
Route::group(['prefix' => 'herramientas'], function() {
    Route::get('', [HerramientaController::class, 'index'])->name('herramienta.index');
    Route::get('/create', [HerramientaController::class, 'create'])->name('herramienta.create');
    Route::post('/create', [HerramientaController::class, 'store']);
    Route::get('/{herramienta}', [HerramientaController::class, 'show'])->name('herramienta.show');
    Route::get('/edit/{herramienta}', [HerramientaController::class, 'edit'])->name('herramienta.edit');
    Route::put('/update/{herramienta}', [HerramientaController::class, 'update'])->name('herramienta.update');
    });


#informe
Route::get('/informe/{proyecto}', [InformeController::class, 'generarPDF'])->name('informe.pdf');

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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

