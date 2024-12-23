@extends('base')

@section('title', 'Editar Prueba')

@section('content')
<br>
<div class="container text-center" style="width:1000px">
    <form action="{{ route('herramienta.update', $herramienta->id) }}" method="POST" style="width:1000px">
        @csrf
        @method('PUT') <!-- Método HTTP para actualizar -->

        <!-- Campo para nombre -->
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input 
                type="text" 
                name="nombre" 
                id="nombre" 
                value="{{ old('nombre', $herramienta->nombre) }}" 
                required
            >
        </div>
        <br>

        <!-- Campo para descripcion -->
        <div class="form-group">
            <label for="descripcion">descripcion:</label>
            <textarea 
                name="descripcion" 
                id="descripcion" 
                placeholder="descripcion" 
                value="{{ old('descripcion', $herramienta->descripcion) }}"
                row="5"
                required
            >
            {{ old('descripcion', $herramienta->descripcion) }}
        </textarea>
        </div>
        <br>

       

        <!-- Campo para objetivo -->
        <div class="form-group">
            <input
                type="text"
                name="documentacion" 
                id="documentacion" 
                style="width:600px !important" 
                placeholder="url documentacion" 
                 value="{{ old('documentacion', $herramienta->documentacion) }}"
                required
            >
        </div>
        <br>

        <!-- Botón de envío -->
        <button class="btn btn-success" type="submit">Actualizar</button>
    </form>
</div>
<br>
@endsection