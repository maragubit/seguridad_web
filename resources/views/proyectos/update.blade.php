 <!-- resources/views/home.blade.php -->
 @extends('base')

@section('title', 'Seguridad web')

@section('content')
<br>
<div class="container  text-center mt-2">
<h1 class="mb-3">Editar</h1>
    <form method="post" action="{{route('proyecto.update',$proyecto)}}">
    @csrf
      <!-- Campo Nombre -->
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input 
          type="text" 
          class="form-control" 
          id="nombre" 
          name="nombre"
          value="{{$proyecto->nombre}}" 
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
          value="{{$proyecto->url}}"  
          required>
      </div>

      <!-- Botón de envío -->
      <button type="submit" class="btn btn-warning">Editar</button>
    </form>

</div>
<br>
@endsection