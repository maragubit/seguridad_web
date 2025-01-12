 <!-- resources/views/home.blade.php -->
 @extends('base')

@section('content')
<br>
<div class="container text-center">
    
    <div class="row justify-content-md-center">
        @forelse($herramientas as $herramienta)
        <div class="col-lg-4">
            <div>
                <h6 style="background-color: black; border-radius: 3px; padding:2px;"> <a style="font-weight: 600 !important;"href="{{route ('herramienta.show', $herramienta)}}">{{$herramienta->nombre}}</a> @if (auth()->user()->role_id == 1)<a href="{{route ('herramienta.edit', $herramienta)}}"><i class="bi bi-gear"></i></a>@endif</h6>
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
@if (auth()->user()->role_id == 1)<a href="{{route('herramienta.create')}}"><button class="btn btn-success">Crear</button></a>@endif
</div>

<br>
<style>
    a:hover{
        color:#1abd1a;
    }
</style>
@endsection