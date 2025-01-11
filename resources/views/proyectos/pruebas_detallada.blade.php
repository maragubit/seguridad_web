@extends('base')

@section('content')
<br>
<div class="container  text-center mt-2">
    <h1>{{$proyecto->nombre}}</h1>
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="/img/categorias/{{$prueba->categoria->url}}" alt="Card image cap" id="product-detail">
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{$prueba->nombre}}</h1>
                           
                            
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Categoría:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{$prueba->categoria->nombre}}</strong></p>
                                </li>
                                <li class="list-inline-item">
                                    <h6>Referencia:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{$prueba->referencia}}</strong></p>
                                </li>
                            </ul>

                            <h6>Descripcion:</h6>
                            <p>{{$prueba->objetivo}}</p>

                            <h6>Herramientas recomendadas:</h6>
                            <ul class="list-unstyled pb-3">
                                @forelse ($prueba->herramientas as $herramienta)
                                <li>{{$herramienta->nombre}}</li>
                                @empty
                                <li>sin herramientas</li>
                                @endforelse
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->
<form method="POST" action="{{route ('proyecto.post_prueba_detallada', $proyecto_prueba)}}">
    @csrf
    <!-- Campo de realizacion -->
    <label for="realizacion" class="mb-1">¿Cómo ha realizado la prueba?:</label>
    <textarea id="realizacion" name="realizacion">@if ($proyecto_prueba->realizacion){{$proyecto_prueba->realizacion}}@endif</textarea>

    <!-- Campo de bastionado -->
    <label for="bastionado" class="mb-1 mt-5">¿Qué medidas de seguridad has implementado para {{$prueba->nombre}}?</label>
    <textarea id="bastionado" name="bastionado">@if ($proyecto_prueba->bastionado){{$proyecto_prueba->bastionado}}@endif</textarea>

    <!-- Campo de observaciones -->
    <label for="observacion" class="mb-3 mt-5">Observaciones:</label><br>
    <textarea id="observacion" class="form-control" name="observación">@if ($proyecto_prueba->observación){{$proyecto_prueba->observación}}@endif</textarea>

    <button type="submit" class="btn btn-success btn-lg mt-3">Guardar cambios en el informe</button>
</form>
</div>
<br>
<script>
    // Inicializar CKEditor en los campos de texto
    ClassicEditor
        .create(document.querySelector('#realizacion'), {

        toolbar: ['bold', 'italic', 'link', 'undo', 'redo'] // Añadir la opción de cargar imágenes
    })
        .catch(error => {
            console.error(error);
        });

        ClassicEditor
        .create(document.querySelector('#bastionado'), {
        
        toolbar: ['bold', 'italic', 'link', 'undo', 'redo'] // Añadir la opción de cargar imágenes
    })
        .catch(error => {
            console.error(error);
        });

    
</script>
@endsection