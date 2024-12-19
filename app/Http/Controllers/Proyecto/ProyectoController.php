<?php

namespace App\Http\Controllers\Proyecto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

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
}
