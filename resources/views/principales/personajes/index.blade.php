<div class="mb-2">
    <button id="btn-add" class="btn btn-success" onclick="abrirModal()"><i class="fas fa-plus"></i> Agregar nueva
        Ficha</button>
</div>

<div>
    <table id="tabla_clases" class="table table-hover table-sm table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Jugador</th>
                <th>Nombre</th>
                <th>Clase</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $("#titulo").text("Personajes");
        $('#tabla_clases').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('getDataPersonajes') }}",
                "type": "GET"
            },
            "columns": [{
                    "data": "id",
                    "width": "5%",
                    "className": "text-center"
                },
                {
                    "data": "jugador",
                    "width": "40%"
                },
                {
                    "data": "nombre",
                    "width": "40%"
                },
                {
                    "data": "clase",
                    "width": "10%"
                },
                {
                    "data": "action",
                    "width": "5%",
                    "orderable": false,
                    "searchable": false,
                    "className": "text-center"
                }
            ],
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
        }, );
    });

    function abrirModal(id = false) {

        $("#contenido").empty();
        let ruta = "{{ route('createPersonaje') }}";
        $("#titulo").text("Crear Nueva Ficha");
        if(id != false){
            $("#titulo").text("Editar Ficha");
            ruta = "{{ route('editPersonaje', ':id:') }}";
            ruta = ruta.replace(':id:', id);
        }

        $.get(ruta, function(data) {
            $('#contenido').html(data);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            if (jqXHR.status == 403) {
                cargaSwal(false, "No tiene permisos para realizar esta acción.")
            } else {
                cargaSwal(false, "Error al realizar la petición.");
            }
        });
    }
</script>
