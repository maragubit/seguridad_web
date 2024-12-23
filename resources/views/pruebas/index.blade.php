 <!-- resources/views/home.blade.php -->
 @extends('base')

@section('title', 'Seguridad web')

@section('content')
<br>
<div class="container text-center">
    
    <div class="row justify-content-md-center">

        @forelse($categorias as $categoria)
        <div class="col-lg-4 mb-3">
            <div class="pruebasList">
                <h6>{{$categoria->nombre}} </h6>
                <img src="/img/categorias/{{$categoria->url}}" class="categorias rounded-circle border img-fluid" 
                alt="{{ $categoria->nombre }}"></img>
                    
                    @forelse($categoria->pruebas as $prueba)
                        <p><a href="{{route ('prueba.show', $prueba)}}">{{$prueba->nombre}}</a> <a href="{{route ('prueba.edit', $prueba)}}"><i class="bi bi-gear"></i></a></h6></p>
                        @empty
                        <p>sin pruebas....</p>
                    @endforelse
                
            </div>        
        </div>
 @empty
        Sin registro de categorias...
        @endforelse
    </div>
          
<br>
<a href="{{route('prueba.create')}}"><button class="btn btn-success">Crear</button></a>
</div>

<br>

@endsection