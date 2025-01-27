<!DOCTYPE html>
<html>
<head>
    <title>Informe Web Guardian</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .marca-agua {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            text-align: center;
            opacity: 0.3;
        }

        .marca-agua img {
            width: 50%; /* Ajusta el tamaño de la marca de agua */
            margin-top: 40%;
        }
    </style>
</head>
<body>
    <div class="marca-agua">
        <img src="{{ public_path('img/apple-icon.png') }}" alt="Marca de agua">
    </div>
    <h2 style="text-align:center">Informe de Web Guardian sobre {{$proyecto->nombre}}</h2>
    <p>El usuario {{ Auth::user()->name }} ha llevado a cabo una serie de pruebas bajo su supervisión directa para el dominio {{$proyecto->url}}, asegurándose de que cada procedimiento se ejecutó conforme a los estándares
       previamente establecidos. Como máximo responsable, el usuario {{ Auth::user()->name }} garantiza la validez de los datos recopilados y asume plena responsabilidad sobre los resultados
       presentados en este informe.
       Cualquier observación, conclusión o interpretación derivada de las pruebas ha sido revisada y confirmada por el usuario {{ Auth::user()->name }}, quien se compromete a responder 
       por la integridad y precisión de la información aquí contenida.</p>
       <br>
       <h3>Pruebas realizadas con éxito</h3>
       
       <table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Referencia</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($pruebasSuperadas as $prueba)
                <tr>
                    <td>{{ $prueba->nombre }}</td>
                    <td>{{ $prueba->categoria->nombre }}</td>
                    <td>{{ $prueba->referencia}}</td>
                    <td>{{ $prueba->updated_at }}</td>
                </tr>
            
        @empty
            <tr>
                <td colspan="4">No hay pruebas registradas.</td>
            </tr>
        @endforelse
    </tbody>
</table>
<hr>
<h3>Pruebas pendientes de superar</h3>
       
       <table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Referencia</th>
            
        </tr>
    </thead>
    <tbody>
        @forelse ($pruebasNoSuperadas as $prueba)
                <tr>
                    <td>{{ $prueba->nombre }}</td>
                    <td>{{ $prueba->categoria->nombre }}</td>
                    <td>{{ $prueba->referencia}}</td>
                </tr>
            
        @empty
            <tr>
                <td colspan="4">No hay pruebas registradas.</td>
            </tr>
        @endforelse
    </tbody>
</table>
<br>
<h2 style="text-align:center">Informe detallado de pruebas superadas</h2>
<br>
@forelse ($pruebasSuperadas as $prueba)
<h3>{{$prueba->nombre}} ({{$prueba->referencia}}) [{{$prueba->updated_at}}]</h3>
<p>{{$prueba->objetivo}}
<h4>Procedimiento:</h4>
@php
$proyecto_prueba=$proyecto_prueba->where('proyecto_id',$proyecto->id)->where('prueba_id',$prueba->id)->first()
@endphp
<p>{!! $proyecto_prueba->realizacion !!}</p>
<br>
<h4>Proceso de bastionado:</h4>
<p>{!! $proyecto_prueba->bastionado !!}</p>
<br>
<h4>Observaciones de la prueba:</h4>
<p>{!! $proyecto_prueba->observación !!}</p>
<hr>
@empty
@endforelse
<hr>
<br>
<br>
<!-- Comienza en el informe las no superadas pero realizadas -->
 @if($pruebasNoSuperadasRealizadas->count() > 0)
<h2 style="text-align:center">Informe detallado de pruebas realizadas no superadas</h2>
<br>
@forelse ($pruebasNoSuperadasRealizadas as $prueba)
<h3>{{$prueba->nombre}} ({{$prueba->referencia}}) [{{$prueba->updated_at}}]</h3>
<p>{{$prueba->objetivo}}
<h4>Procedimiento:</h4>
@php
$proyecto_prueba=$proyecto_prueba->where('proyecto_id',$proyecto->id)->where('prueba_id',$prueba->id)->first()
@endphp
<p>{!! $proyecto_prueba->realizacion !!}</p>
<br>
<h4>Proceso de bastionado:</h4>
<p>{!! $proyecto_prueba->bastionado !!}</p>
<br>
<h4>Observaciones de la prueba:</h4>
<p>{!! $proyecto_prueba->observación !!}</p>
 <hr>      
@empty
@endforelse
@endif
</body>
</html>
