<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CoreController extends Controller
{
    public function index(){
        $categorias=Categoria::all();
        return view ('index',[
            "categorias"=>$categorias,
        ]);
    }
}
