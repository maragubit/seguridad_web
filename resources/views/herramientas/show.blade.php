 <!-- resources/views/home.blade.php -->
 @extends('base')

@section('title', 'Seguridad web')

@section('content')
<br>
<div class="container text-center">
<section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <!-- col end -->
                <div class="col-lg-10 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{$herramienta->nombre}}</h1>
                           
                            
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Documentacion:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{$herramienta->documentacion}}"><p class="text-muted"><strong>{{$herramienta->documentacion}}</strong></p></a>
                                </li> 
                            </ul>
                                
                            <h6>Pruebas en las que se recomienda:</h6>
                                <table class="table table-striped table-dark">
                                     @forelse($herramienta->pruebas as $prueba)
                                     <tr>
                                        <th><a href="{{route ('prueba.show', $prueba)}}">{{$prueba->nombre}}</a></th>
                                        <th>{{$prueba->referencia}}</th>
                                    </tr>
                                    @empty @endforelse
                                </table>
                                   
                            <h6>Descripcion:</h6>
                            <p>{{$herramienta->descripcion}}</p>
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