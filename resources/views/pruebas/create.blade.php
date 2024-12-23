 <!-- resources/views/home.blade.php -->
 @extends('base')

@section('title', 'Seguridad web')

@section('content')
<br>
<div class="container text-center" style="width:1000px">
<form action="" method="POST" style="width:1000px">
        <!-- Token de seguridad para Laravel -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

         <!-- Campo para nombre -->
        <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        </div>
        <br>
        <!-- Campo para referencia -->
        <div class="form-group">
        <label for="referencia">Referencia:</label>
        <input type="text" name="referencia" id="referencia" placeholder="referencia OWASP">
        </div>
        <br>
        <!-- Campo para categoría -->
        <div class="form-group">
        <label for="categoria_id">Categoría:</label>
        <select name="categoria_id" id="categoria_id" required>
            <option value="">Seleccione una categoría</option>
            <!-- Opciones dinámicas -->
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>
        </div>
        <br>
        <!-- Campo para herramientas -->
        <div class="form-group">
        <label for="herramientas">Herramientas:</label><br>
        <select name="herramientas[]" id="herramientas" multiple required>
            <!-- Opciones de herramientas aquí -->
                @forelse ($herramientas as $herramienta)
            <option value="{{$herramienta->id}}">{{$herramienta->nombre}}</option>
            @empty
            <option value="0">No hay herramientas seleccionadas</option>
            @endforelse
        </select>
        <p>Puedes seleccionar varias herramientas manteniendo presionada la tecla Ctrl (Windows) o Cmd (Mac) mientras haces clic.</p>
        </div>

        <!-- Campo para objetivo -->
        <div class="form-group">
        <textarea name="objetivo" style="width:600px !important" id="objetivo" placeholder="objetivo de la prueba" rows="4" required></textarea>
        </div>
        <br>
        
        <!-- Botón de envío -->
        <button class="btn btn-success" type="submit">Guardar</button>
    </form>
</div>

<br>

@endsection