 <!-- resources/views/home.blade.php -->
 @extends('base')

@section('title', 'Seguridad web')

@section('content')
<br>
<div class="container  text-center mt-2">
    <h1 class="mb-3">Nuevo proyecto</h1>
    <form method="post" action="{{route ('proyecto.crear')}}">
    @csrf
      <!-- Campo Nombre -->
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input 
          type="text" 
          class="form-control" 
          id="nombre" 
          name="nombre" 
          placeholder="Nombre del proyecto" 
          required>
      </div>

      <!-- Campo URL -->
      <div class="mb-3">
        <label for="url" class="form-label">URL</label>
        <input 
          type="url" 
          class="form-control" 
          id="url" 
          name="url" 
          placeholder="URL" 
          required>
      </div>

      <!-- Botón de envío -->
      <button type="submit" class="btn btn-success">Crear</button>
    </form>
  </div>
  <br>



@endsection