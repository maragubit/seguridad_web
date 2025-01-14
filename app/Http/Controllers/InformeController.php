<?php
namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Proyecto;
use App\Models\Prueba;
use App\Models\ProyectoPrueba;
use App\Models\User;


class InformeController extends Controller
{
    public function generarPDF(Proyecto $proyecto)
    {
        
        $pruebasSuperadas = $proyecto->pruebas()->wherePivot('superada', 1)->get();
        $pruebasNoSuperadas = Prueba::whereNotIn('id', $pruebasSuperadas->pluck('id'))->get();
        $pruebasNoSuperadasRealizadas=$proyecto->pruebas()->wherePivot('superada', 0)->wherePivotNotNull('realizacion')->get();
        $proyecto_prueba=ProyectoPrueba::all();
        // Renderizar la vista con los datos
        $contexto=[
            'proyecto' => $proyecto,
            'pruebasSuperadas'=>$pruebasSuperadas,
            'pruebasNoSuperadas'=>$pruebasNoSuperadas,
            'pruebasNoSuperadasRealizadas'=>$pruebasNoSuperadasRealizadas,
            'proyecto_prueba'=>$proyecto_prueba,
        ];
        $pdf = Pdf::loadView('informe', $contexto);

        // Descargar el PDF
        /* return view ('informe',$contexto); */
        return $pdf->download('informe_webguardian.pdf');
    }
}
