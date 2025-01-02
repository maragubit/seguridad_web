 <!-- resources/views/home.blade.php -->
 @extends('base')

@section('title', 'Seguridad web')

@section('content')
<br>
<div class="container text-center">
    
    <div class="row justify-content-md-center">
        @forelse($herramientas as $herramienta)
        <div class="col-lg-4">
            <div>
                <h6>{{$herramienta->nombre}} <a href="{{route ('herramienta.edit', $herramienta)}}"><i class="bi bi-gear"></i></a></h6>
                <div class="descripcion mb-5">
                    <p>{{$herramienta->descripcion}}</p>
                </div>
            </div>        
        </div>
 @empty
        Sin registro de herramientas...
        @endforelse
    </div>
          
<br>
<a href="{{route('herramienta.create')}}"><button class="btn btn-success">Crear</button></a>
</div>

<br>

@endsection