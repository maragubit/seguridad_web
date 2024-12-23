 <!-- resources/views/home.blade.php -->
 @extends('base')

@section('title', 'Seguridad web')

@section('content')
<br>
<div class="container text-center">
<table style="width:95%;" id="tabla_proyectos" class="display nowrap">
    <thead>
    <tr>
        <th> Nombre</th>
        <th> URL</th>
        <th> Fecha</th>
        <th> Editar</th>
        <th> Eliminar</th>


    </tr>
    </thead>
    <tbody>
    @forelse ($proyectos as $proyecto)
    <tr>
        <td><a href="{{route('proyecto.show', $proyecto)}}">{{$proyecto->nombre}}</a></td>
        <td>{{$proyecto->url}}</td>
        <td>{{$proyecto->created_at}}</td>
        <td><a href="{{route('proyecto.edit', $proyecto)}}"><i class="bi bi-pencil-square"></i></a></td>
        <td><a href="{{route('proyecto.delete', $proyecto)}}"><i class="bi bi-trash-fill"></i></a></td>
    </tr>
    @empty
    <tr>
        <td><a href="">Sin resultados...</td>
        <td></td>
        <td></td>
        <td>editar</td>
        <td><i class="bi bi-trash-fill"></i></td>
    </tr>
    @endif
    </tbody>
</table>
<br>
<a href="{{route('proyecto.crear')}}"><button class="btn btn-success">Crear nuevo proyecto</button></a>
</div>
<br>

@endsection