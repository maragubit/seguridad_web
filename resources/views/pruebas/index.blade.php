 <!-- resources/views/home.blade.php -->
 @extends('base')

@section('title', 'Seguridad web')

@section('content')
<br>
<div class="container text-center">
    
    <div class="row justify-content-md-center">
        @forelse($pruebas as $prueba)
        <div class="col-lg-4">
            <div>
                <h6>{{$prueba->nombre}}</h6>
                    @forelse($prueba->herramientas as $herramienta)
                        <p>{{$herramienta->nombre}}</p>
                        @empty
                        sin herramientas....
                    @endforelse
                
            </div>        
        </div>
 @empty
        Sin registro de pruebas...
        @endforelse
    </div>
          
<br>
<a href="{{route('prueba.create')}}"><button class="btn btn-success">Crear</button></a>
</div>

<br>

@endsection