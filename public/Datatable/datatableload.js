




$(document).ready( function () {
    $('#tabla_pacientes').DataTable(
      {
      "language": {
                  "lengthMenu": "Mostrar _MENU_ pacientes por página",
                  "zeroRecords": "No se ha encontrado nada - disculpe",
                  "info": "Mostrando página _PAGE_ de _PAGES_",
                  "infoEmpty": "No hay datos disponibles",
                  "infoFiltered": "(filtrado de _MAX_ pacientes disponibles)",
                  "search": "Buscar:",
                  "paginate": {
                        "previous": "anterior",
                        "next": "siguiente"
                      }
              }}

                             );
} );



$(document).ready( function () {
    $('#tabla_clientes').DataTable(
      {
      "aaSorting": [],
      "pageLength": 50,
      "language": {
                  "lengthMenu": "Mostrar _MENU_ clientes por página",
                  "zeroRecords": "No se ha encontrado nada - disculpe",
                  "info": "Mostrando página _PAGE_ de _PAGES_",
                  "infoEmpty": "No hay datos disponibles",
                  "infoFiltered": "(filtrado de _MAX_ clientes disponibles)",
                  "search": "Buscar:",
                  "paginate": {
                        "previous": "anterior",
                        "next": "siguiente"
                      }
              }}

                             );
} );

$(document).ready( function () {
    $('#tabla_muestreos').DataTable(
      {
      "aaSorting": [],
      "pageLength": 10,
      "language": {
                  "lengthMenu": "Mostrar _MENU_ muestreos por página",
                  "zeroRecords": "No se ha encontrado nada - disculpe",
                  "info": "Mostrando página _PAGE_ de _PAGES_",
                  "infoEmpty": "No hay datos disponibles",
                  "infoFiltered": "(filtrado de _MAX_ muestreos disponibles)",
                  "search": "Buscar:",
                  "paginate": {
                        "previous": "anterior",
                        "next": "siguiente"
                      }
              }}

                             );
} );


$(document).ready( function () {
    $('#tabla_muestras_cliente').DataTable(
      {
      "aaSorting": [],
      "pageLength": 10,
      "language": {
                  "lengthMenu": "Mostrar _MENU_ muestras por página",
                  "zeroRecords": "No se ha encontrado nada - disculpe",
                  "info": "Mostrando página _PAGE_ de _PAGES_",
                  "infoEmpty": "No hay datos disponibles",
                  "infoFiltered": "(filtrado de _MAX_ muestras disponibles)",
                  "search": "Buscar:",
                  "paginate": {
                        "previous": "anterior",
                        "next": "siguiente"
                      }
              }}

                             );
} );


$(document).ready( function () {
    $('#tabla_parametros').DataTable(
      {
      "aaSorting": [],
      "pageLength": 100,
      "language": {
                  "lengthMenu": "Mostrar _MENU_ parámetros por página",
                  "zeroRecords": "No se ha encontrado nada - disculpe",
                  "info": "Mostrando página _PAGE_ de _PAGES_",
                  "infoEmpty": "No hay datos disponibles",
                  "infoFiltered": "(filtrado de _MAX_ parámetros disponibles)",
                  "search": "Buscar:",
                  "paginate": {
                        "previous": "anterior",
                        "next": "siguiente"
                      }
              }}

                             );
} );

$(document).ready( function () {
    $('#tabla_proyectos').DataTable(
      {
      "aaSorting": [],
      "pageLength": 10,
      "language": {
                  "lengthMenu": "Mostrar _MENU_ proyectos por página",
                  "zeroRecords": "No se ha encontrado nada - disculpe",
                  "info": "Mostrando página _PAGE_ de _PAGES_",
                  "infoEmpty": "No hay datos disponibles",
                  "infoFiltered": "(filtrado de _MAX_ proyectos disponibles)",
                  "search": "Buscar:",
                  "paginate": {
                        "previous": "anterior",
                        "next": "siguiente"
                      }
              }}

                             );
} );