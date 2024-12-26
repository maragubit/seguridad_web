 <!-- resources/views/home.blade.php -->
 @extends('base')

@section('title', 'Seguridad web')

@section('content')
<br>
<div class="container text-center">
    
    <div class="row justify-content-md-center">

        @forelse($categorias as $categoria)
        <div class="col-lg-4 mb-3">
            <div class="pruebasList">
                <h6>{{$categoria->nombre}} </h6>
                <hr>
                <img src="/img/categorias/{{$categoria->url}}" style="max-height:200px !important" class="card-img img-fluid" 
                alt="{{ $categoria->nombre }}"></img>
                <hr>
                <table class="table table-striped">    
                @forelse($categoria->pruebas as $prueba)
                        <tr>
                        <td><a href="{{route ('prueba.show', $prueba)}}">{{$prueba->nombre}}</a></td>
                        <td>{{$prueba->referencia}}</td>
                        <td> <a href="{{route ('prueba.edit', $prueba)}}"><i class="bi bi-pencil-square"></i></a></td>
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
<a href="{{route('prueba.create')}}"><button class="btn btn-success">Crear</button></a>
</div>

<br>

@endsection