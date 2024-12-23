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
        <label for="descripcion">Descripcion:</label>
        <textarea name="descripcion" id="descripcion" placeholder="descripcion" rows="4" required>
        </div>
        <br>
        

        <!-- Campo para objetivo -->
        <div class="form-group">
        <input type="text" name="documentacion" style="width:600px !important" id="documentacion" placeholder="url documentacion" required></textarea>
        </div>
        <br>
        
        <!-- Botón de envío -->
        <button class="btn btn-success" type="submit">Guardar</button>
    </form>
</div>

<br>

@endsection