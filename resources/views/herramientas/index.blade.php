 <!-- resources/views/home.blade.php -->
 @extends('base')

@section('title', 'Seguridad web')

@section('content')
<br>
<div class="container text-center">
    
    <div class="row justify-content-md-center">
        @forelse($herramientas as $prueba)
        <div class="col-lg-4">
            <div>
                <h6>{{$prueba->nombre}} <a href="{{route ('herramienta.edit', $prueba)}}"><i class="bi bi-gear"></i></a></h6>
                    
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