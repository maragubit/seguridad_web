 <!-- resources/views/home.blade.php -->
 @extends('base')

@section('content')
<br>
<div class="container text-center">
<div style="text-align:end;" class="mb-3 mr-2">
    <form action="{{ route('herramienta.index') }}" method="GET" class="d-inline">
    <input type="text" id="search-input" placeholder="Buscar..." name="search"/>
    <button class="btn btn-success"><i class="bi bi-search"></i></button>
    </form>
</div>
    <div class="row justify-content-md-center">
        @forelse($herramientas as $herramienta)
        <div class="col-lg-4">
            <div>
                <h6 style="background-color: black; border-radius: 3px; padding:2px;"> <a style="font-weight: 600 !important;"href="{{route ('herramienta.show', $herramienta)}}">{{$herramienta->nombre}}</a> @if (auth()->check() && auth()->user()->role_id == 1)<a href="{{route ('herramienta.edit', $herramienta)}}"><i class="bi bi-gear"></i></a>@endif</h6>
                <div class="descripcion mb-5">
                    <p>{{$herramienta->descripcion}}</p>
                </div>
            </div>        
        </div>
 @empty
        Sin registro de herramientas...
        @endforelse
    </div>
    <!-- Paginación -->

    <div class="pagination-container">
    <!-- Página Anterior -->
    @if ($herramientas->onFirstPage())
        <span class="disabled">« Anterior</span>
    @else
        <a href="{{ $herramientas->previousPageUrl() }}">« Anterior</a>
    @endif

    <!-- Enlaces de Páginas -->
    @foreach ($herramientas->links() as $page)
        @if ($page['active'])
            <span class="current">{{ $page['label'] }}</span>
        @else
            <a href="{{ $page['url'] }}">{{ $page['label'] }}</a>
        @endif
    @endforeach

    <!-- Página Siguiente -->
    @if ($herramientas->hasMorePages())
        <a href="{{ $herramientas->nextPageUrl() }}">Siguiente »</a>
    @else
        <span class="disabled">Siguiente »</span>
    @endif
</div>
<br>
@if (auth()->check() && auth()->user()->role_id == 1)<a href="{{route('herramienta.create')}}"><button class="btn btn-success">Crear</button></a>@endif
</div>

<br>
<style>
    a:hover{
        color:#1abd1a;
    }
  /* Contenedor de paginación */
.pagination-container {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

/* Estilos de los enlaces de la paginación */
.pagination-container a,
.pagination-container .current {
    display: inline-block;
    padding: 8px 16px;
    margin: 0 5px;
    background-color: #114b0e;
    border: 1px solid #114b0e;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    font-size: 14px;
    transition: background-color 0.3s, color 0.3s;
}

/* Efecto hover para los enlaces */
.pagination-container a:hover {
    background-color:rgb(2, 61, 25);
    color: white;
}

/* Resaltar la página actual */
.pagination-container .current {
    background-color: #28a745;
    border-color: #28a745;
}

/* Deshabilitar el botón de anterior o siguiente */
.pagination-container .disabled {
    display: inline-block;
    padding: 8px 16px;
    margin: 0 5px;
    background-color: #e9ecef;
    border: 1px solid #ddd;
    color: #6c757d;
    border-radius: 4px;
}

/* Estilos para los botones de navegación (anterior/siguiente) */
.pagination-container .disabled:hover,
.pagination-container a:disabled:hover {
    background-color: #e9ecef;
    color: #6c757d;
}
</style>
@endsection