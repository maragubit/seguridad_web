<?php

use App\Http\Controller\Prueba\PruebaController as PruebaPruebaController;
use App\Http\Controllers\CoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Proyecto\ProyectoController;
use App\Http\Controllers\Prueba\PruebaController;
use App\Http\Controllers\Herramienta\HerramientaController;
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
Route::get('/create', [PruebaController::class, 'create'])->name('prueba.create');
Route::post('/create', [PruebaController::class, 'store']);
Route::get('/edit/{prueba}', [PruebaController::class, 'edit'])->name('prueba.edit');
Route::put('/update/{prueba}', [PruebaController::class, 'update'])->name(name:'prueba.update');
});

############################################################
##                       Herramientas                         ##
############################################################
Route::group(['prefix' => 'herramientas'], function() {
    Route::get('', [HerramientaController::class, 'index'])->name('herramienta.index');
    Route::get('/create', [HerramientaController::class, 'create'])->name('herramienta.create');
    Route::post('/create', [HerramientaController::class, 'store']);
    Route::get('/edit/{herramienta}', [HerramientaController::class, 'edit'])->name('herramienta.edit');
    Route::put('/update/{herramienta}', [HerramientaController::class, 'update'])->name(name:'herramienta.update');
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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

