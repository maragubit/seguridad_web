<?php

namespace App\Http\Controllers\Herramienta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Prueba;
use App\Models\Categoria;
use App\Models\Herramienta;
use Illuminate\Support\Facades\Auth;

class HerramientaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $herramientas = Herramienta::query()->orderBy('nombre')
            ->when($search, function ($query, $search) {
                return $query->where('nombre', 'like', '%' . $search . '%');
                             
            })
            ->get();

        return view('herramientas.index', compact('herramientas'));
    }
    
    function filtro(Request $request){
        $search = $request->query('search', '');
        $perPage = $request->query('per_page', 5);

        $query = Herramienta::query();

        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $data = $query->paginate($perPage);

        return response()->json($data);
    }


    function create()
    {
        
        return view("herramientas.create");
    }
    
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validated = $request->validate([
            
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:555',
            'documentacion' => 'required|string',
            
        ]);

        // Crear la nueva herramienta
        $herramienta = Herramienta::create([
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'],
            'documentacion' => $validated['documentacion'],
            
        ]);

        return redirect()->route('herramienta.index');
    }

    public function show(Herramienta $herramienta)
    {
        
        return view("herramientas.show",['herramienta'=>$herramienta]);
    }

    public function edit(Request $request, Herramienta $herramienta)
    {
        
        $contexto=[
            "herramienta"=>$herramienta,
            
        ];
        return view('herramientas.edit',$contexto);
    }
    public function update(Request $request, Herramienta $herramienta)
    {
        $put=$request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'documentacion' => 'required|string',
        ]);
        $herramienta->update($put);
        return redirect()->route('herramienta.index');
    }
}
