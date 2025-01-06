<?php

namespace App\Http\Controllers\Proyecto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use App\Models\Categoria;
use App\Models\Prueba;
use App\Models\ProyectoPrueba;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class ProyectoController extends Controller
{
    
    function proyectos_list()
    {
        $proyectos = Proyecto::where('user_id', auth()->id())->get();

        $contexto=[
            "proyectos"=>$proyectos,
        ];
        return view("proyectos.list",$contexto);
    }
    
    function crear_form()
    {
        return view("proyectos.crear");
    }

    public function store(Request $request)
    {

        Proyecto::create([
            'nombre'=>$request['nombre'],
            'url'=>$request['url'],
            'user_id'=>Auth::id(),

           
        ]);
        session()->flash("message","idea creada correctamente");

        return redirect()->route('proyecto.misproyectos');
    }

    public function show(Request $request, Proyecto $proyecto){
        $categorias=Categoria::all();
        
        $contexto=[
            "proyecto"=>$proyecto,
            "categorias"=>$categorias,

        ];
        return view("proyectos.show",$contexto);
    }
    public function delete(Request $request, Proyecto $proyecto)
    {
        $proyecto->delete();
        return redirect()->route('proyecto.misproyectos');
    }

    public function edit(Request $request, Proyecto $proyecto)
    {
        return view('proyectos.update',["proyecto"=>$proyecto]);
    }
    public function update(Request $request, Proyecto $proyecto)
    {
        $post=$request->validate([
            'nombre' => 'required|string|max:255',
            'url' => 'required|url',
        ]);
        $proyecto->update($post);
        return redirect()->route('proyecto.misproyectos');
    }

    public function pruebas_proyecto(Categoria $categoria,Proyecto $proyecto){
        
        $total = $categoria->pruebas->count();
        $total_superadas=0;
        $pruebas = $proyecto->pruebas->where('categoria_id', $categoria->id);
        // Iterar sobre cada prueba
        foreach ($pruebas as $prueba) {
            // Verificar si la prueba está asociada al proyecto y si 'superada' es true en el pivote
            if ($prueba->pivot->superada==true) {
                $total_superadas+=1;
            }
        }
        $contexto=[
            "categoria"=>$categoria,
            "proyecto"=>$proyecto,
            "total"=>$total,
            "total_superadas"=>$total_superadas,
        ];
        return view ("proyectos.pruebas_proyecto",$contexto);
    }
    
    
    public function prueba_superada(Proyecto $proyecto, Prueba $prueba, $superada)
    {
        // Convertir $superada en booleano para mayor seguridad
        $superada = filter_var($superada, FILTER_VALIDATE_BOOLEAN);
        echo $superada;
        // Sincronizar el estado de la prueba con el proyecto
        $proyecto->pruebas()->syncWithoutDetaching([
            $prueba->id => ['superada' => $superada,
            'observación' => '',],
        ]);

        // Redirigir a la página anterior
        return redirect()->back()->with('success', 'Estado de la prueba actualizado');
    }


    function prueba_detallada(Proyecto $proyecto, Prueba $prueba)
    {
        $proyecto_prueba = ProyectoPrueba::firstOrCreate(
            [
                'proyecto_id' => $proyecto->id,
                'prueba_id' => $prueba->id,
            ]);
        $contexto=[
            "proyecto"=>$proyecto,
            "prueba"=>$prueba,
            "proyecto_prueba"=>$proyecto_prueba,
        ];
        return view("proyectos.pruebas_detallada", $contexto);
    }
    
    public function post_prueba_detallada(Request $request,ProyectoPrueba $proyecto_prueba)
    {
        // Convertir $superada en booleano para mayor seguridad
        $post=$request->validate([
            'realizacion' => 'nullable|string',
            'bastionado' => 'nullable|string',
            'observación' => 'nullable|string',
        ]);
    
        $proyecto_prueba->update($post);
        $proyecto=Proyecto::where('id',$proyecto_prueba->proyecto_id)->first();
        $prueba=Prueba::where('id',$proyecto_prueba->prueba_id)->first();
        // Redirigir a la página anterior
        return redirect()->route('proyecto.pruebas',['categoria'=>$prueba->categoria,'proyecto'=>$proyecto]);
    
    }
}
