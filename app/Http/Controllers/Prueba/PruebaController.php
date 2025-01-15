<?php

namespace App\Http\Controllers\Prueba;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Prueba;
use App\Models\Categoria;
use App\Models\Herramienta;
use Illuminate\Support\Facades\Auth;

class PruebaController extends Controller
{
    function index()
    {
        $object = Prueba::all();
        $categorias= Categoria::all();
        $contexto=[
            "pruebas"=>$object,
            "categorias"=>$categorias,
        ];
        return view("pruebas.index",$contexto);
    } 
    function create()
    {
        
        $object = Categoria::all();
        $herramientas = Herramienta::all();

        $contexto=[
            "categorias"=>$object,
            "herramientas"=>$herramientas,
        ];
        return view("pruebas.create",$contexto);
    }
    
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validated = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nombre' => 'required|string|max:255',
            'referencia' => 'required|string|max:255',
            'objetivo' => 'required|string',
            'recomendaciones' => 'nullable|string',
            'bastionado' => 'nullable|string',
            'herramientas' => 'nullable|array', // Asegurar que sea una lista de herramientas
            'herramientas.*' => 'exists:herramientas,id', // Validar cada herramienta
        ]);


        // Crear la nueva prueba
        $prueba = Prueba::create([
            'categoria_id' => $validated['categoria_id'],
            'nombre' => $validated['nombre'],
            'referencia' => $validated['referencia'],
            'objetivo' => $validated['objetivo'],
            'recomendaciones' => $validated['recomendaciones'],
            'bastionado' => $validated['bastionado'],
        ]);

        // Asignar las herramientas a la prueba
        
        if (isset($validated['herramientas']) && is_array($validated['herramientas']) && count($validated['herramientas']) > 0) {
            // Asignar las herramientas a la prueba
            $prueba->herramientas()->sync($validated['herramientas']);
        }

        return redirect()->route('prueba.index');
    }

    
    public function edit(Request $request, Prueba $prueba)
    {
        $herramientas=Herramienta::all();
        $categorias=Categoria::all();
        $contexto=[
            "prueba"=>$prueba,
            "herramientas"=>$herramientas,
            "categorias"=>$categorias,
        ];
        return view('pruebas.edit',$contexto);
    }
    public function update(Request $request, Prueba $prueba)
    {
        $put=$request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nombre' => 'required|string|max:255',
            'referencia' => 'required|string|max:255',
            'objetivo' => 'required|string',
            'recomendaciones' => 'nullable|string',
            'bastionado' => 'nullable|string',
            'herramientas' => 'nullable|array', // Asegurar que sea una lista de herramientas
            'herramientas.*' => 'exists:herramientas,id', // Validar cada herramienta
        ]);
        $prueba->update([
            'categoria_id' => $put['categoria_id'],
            'nombre' => $put['nombre'],
            'referencia' => $put['referencia'],
            'objetivo' => $put['objetivo'],
            'recomendaciones' => $put['recomendaciones'] ?? null,
            'bastionado' => $put['bastionado'] ?? null,
        ]);
        if (isset($put['herramientas']) && is_array($put['herramientas']) && count($put['herramientas']) > 0) {
            // Sincronizar las herramientas si están presentes y no vacías
            $prueba->herramientas()->sync($put['herramientas']);
        }
        return redirect()->route('prueba.index');
    }
    public function show(Prueba $prueba){
        return view('pruebas.show',["prueba"=>$prueba,]);
    }
}
