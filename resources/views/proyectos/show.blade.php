 <!-- resources/views/home.blade.php -->
 @extends('base')

@section('title', 'Seguridad web')

@section('content')
<br>
<div class="container  text-center mt-2">
<h4>Seguridad de la web: {{$proyecto->url}} <button class="btn btn-dark"><i class="bi bi-filetype-pdf"></i></button></h4>
<br>

<div class="row">
        @foreach ($categorias as $categoria) <!--Por cada categoria -->
        @php
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
        if ($total > 0) {
            $estrellas = ceil(($total_superadas / $total)*5);
        } else {
            $estrellas = 0; // O cualquier valor que tenga sentido en tu contexto
        }
        $noestrellas=5-$estrellas;
        
        @endphp
            <div class="col-12 col-md-4 p-5 mt-3 text-center">
                <a href="#">
                    <img src="{{ asset('img/categorias/' . $categoria->url) }}" 
                        class="categorias rounded-circle border img-fluid" 
                        alt="{{ $categoria->nombre }}">
                </a>
                <h5 class="text-center mt-3 mb-3">{{ $categoria->nombre }}</h5>
                <div class="row justify-content-center align-items-center">
                @for ($i = 0; $i < $estrellas; $i++)
                <div class="star"></div>
                @endfor
                @for ($i = 0; $i < $noestrellas; $i++)
                <div class="nostar"></div>
                @endfor
                </div>
                <br>
                <a href="{{route ('proyecto.pruebas',['categoria' => $categoria, 'proyecto' => $proyecto])}}">
                    <button class="btn btn-success">Realizar pruebas</button>
                </a>
               
            </div>
            
        @endforeach
</div>
<br>
@endsection