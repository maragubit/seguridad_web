 <!-- resources/views/home.blade.php -->
 @extends('base')

@section('content')
<br>
<div class="container text-center">
    
    <div class="row justify-content-md-center">

        @forelse($categorias as $categoria)
        <div class="col-lg-4 mb-3">
            <div class="pruebasList">
                <h6 class="negro">{{$categoria->nombre}} </h6>
                <div style="background-color:#212529">
                    <img src="/img/categorias/{{$categoria->url}}" style="height:250px !important; width:280px !important;" class="card-img img-fluid" 
                    alt="{{ $categoria->nombre }}"></img>
                </div>
                <table class="table table-striped table-dark pruebas mt-2">    
                @forelse($categoria->pruebas as $prueba)
                        <tr>
                        <td><a href="{{route ('prueba.show', $prueba)}}">{{$prueba->nombre}}</a></td>
                        <td>{{$prueba->referencia}}</td>
                        @if (auth()->check() && auth()->user()->role_id == 1)<td> <a href="{{route ('prueba.edit', $prueba)}}"><i class="bi bi-pencil-square"></i></a></td>@endif
                        </tr>
                        @empty
                        <p>sin pruebas....</p>
                    @endforelse
                </table>
            </div>        
        </div>
 @empty
        Sin registro de categorias...
        @endforelse
    </div>
          
<br>
@if (auth()->check() && auth()->user()->role_id == 1)<a href="{{route('prueba.create')}}"><button class="btn btn-success">Crear</button></a>@endif
</div>

<br>

@endsection