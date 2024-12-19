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
            <div class="col-12 col-md-4 p-5 mt-3 text-center">
                <a href="#">
                    <img src="{{ asset('img/categorias/' . $categoria->url) }}" 
                        class="categorias rounded-circle border img-fluid" 
                        alt="{{ $categoria->nombre }}">
                </a>
                <h5 class="text-center mt-3 mb-3">{{ $categoria->nombre }}</h5>
                <div class="row justify-content-center align-items-center">
                @for ($i = 0; $i < 5; $i++)
                <div class="nostar"></div>
                @endfor
                </div>
                <br>
                <a href="#">
                    <button class="btn btn-success">Realizar pruebas</button>
                </a>
               
            </div>
            
        @endforeach
</div>
<br>
@endsection