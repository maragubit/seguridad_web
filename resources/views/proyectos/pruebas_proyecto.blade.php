 <!-- resources/views/home.blade.php -->
 @extends('base')

@section('title', 'Seguridad web')

@section('content')
<br>
<div class="container  text-center mt-2">
    <h3><u>Pruebas de {{$categoria->nombre}}</u></h3>
    <br>
<h4>{{$proyecto->nombre}} <stroong>({{$total_superadas}}/{{$total}})</strong></h4>

@forelse ($categoria->pruebas as $prueba)

    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="/img/categorias/{{$prueba->categoria->url}}" alt="Card image cap" id="product-detail">
                    </div>
                    @php
                        // Verificar si la prueba está asociada al proyecto
                        $pivot = $prueba->proyectos->firstWhere('id', $proyecto->id)->pivot ?? null;
                    @endphp
                    @if ($pivot && $pivot->superada)
                    <a href="{{route('proyecto.prueba_superada', ['proyecto' => $proyecto, 'prueba' => $prueba,'superada'=>0])}}"><button class="btn btn-danger btn-lg"> Marcar prueba como fallida </button></a>
                    @else
                    <a href="{{route('proyecto.prueba_superada', ['proyecto' => $proyecto, 'prueba' => $prueba,'superada'=>1])}}"><button class="btn btn-success btn-lg"> Marcar prueba como superada </button></a>
                    @endif
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
                            
                            <ul class="list-inline">
                                <li class="list-inline-item"><p><strong>Superada:</strong></p>
                                </li>
                                @if ($pivot && $pivot->superada)
                                <li class="list-inline-item"><i class="bi bi-check2" style="color:green"></i></li>
                                @else
                                <li class="list-inline-item"><i class="bi bi-x-lg" style="color:red"></i></li>
                                @endif
                            </ul>

                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @empty
    @endforelse
    <!-- Close Content -->
</div>

@endsection