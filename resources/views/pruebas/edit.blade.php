@extends('base')

@section('title', 'Editar Prueba')

@section('content')
<br>
<div class="container text-center" style="width:1000px">
    <form action="{{ route('prueba.update', $prueba->id) }}" method="POST" style="width:1000px">
        @csrf
        @method('PUT') <!-- Método HTTP para actualizar -->

        <!-- Campo para nombre -->
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input 
                type="text" 
                name="nombre" 
                id="nombre" 
                value="{{ old('nombre', $prueba->nombre) }}" 
                required
            >
        </div>
        <br>

        <!-- Campo para referencia -->
        <div class="form-group">
            <label for="referencia">Referencia:</label>
            <input 
                type="text" 
                name="referencia" 
                id="referencia" 
                placeholder="Referencia OWASP" 
                value="{{ old('referencia', $prueba->referencia) }}"
            >
        </div>
        <br>

        <!-- Campo para categoría -->
        <div class="form-group">
            <label for="categoria_id">Categoría:</label>
            <select name="categoria_id" id="categoria_id" required>
                <option value="">Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                    <option 
                        value="{{ $categoria->id }}" 
                        {{ old('categoria_id', $prueba->categoria_id) == $categoria->id ? 'selected' : '' }}
                    >
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>

        <!-- Campo para herramientas -->
        <div class="form-group">
            <label for="herramientas">Herramientas:</label><br>
            <select name="herramientas[]" id="herramientas" multiple required>
                @forelse($herramientas as $herramienta)
                    <option 
                        value="{{ $herramienta->id }}" 
                        {{ in_array($herramienta->id, old('herramientas', $prueba->herramientas->pluck('id')->toArray())) ? 'selected' : '' }}
                    >
                        {{ $herramienta->nombre }}
                    </option>
                @empty
                    <option value="0">No hay herramientas disponibles</option>
                @endforelse
            </select>
            <p>Puedes seleccionar varias herramientas manteniendo presionada la tecla Ctrl (Windows) o Cmd (Mac) mientras haces clic.</p>
        </div>
        <br>

        <!-- Campo para objetivo -->
        <div class="form-group">
            <textarea 
                name="objetivo" 
                id="objetivo" 
                style="width:600px !important" 
                placeholder="Objetivo de la prueba" 
                rows="4" 
                required
            >{{ old('objetivo', $prueba->objetivo) }}</textarea>
        </div>
        <br>

        <!-- Botón de envío -->
        <button class="btn btn-success" type="submit">Actualizar</button>
    </form>
</div>
<br>
@endsection