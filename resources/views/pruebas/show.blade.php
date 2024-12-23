 <!-- resources/views/home.blade.php -->
 @extends('base')

@section('title', 'Seguridad web')

@section('content')
<br>
<div class="container  text-center mt-2">
<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
    </div>



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
</div>

<br>

@endsection