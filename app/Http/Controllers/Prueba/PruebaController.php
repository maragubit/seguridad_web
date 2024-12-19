<?php

namespace App\Http\Controller\Prueba;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prueba;

class PruebaController extends Controller
{
    function index()
    {
        $pruebas = Prueba::all();

        $contexto=[
            "pruebas"=>$pruebas,
        ];
        return view("pruebas.index",$contexto);
    } 
}
