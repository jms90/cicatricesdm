<div class="mb-2">
    <button id="btn-add" class="btn btn-success" onclick="abrirModal()"><i class="fas fa-plus"></i>Guardar</button>
</div>

<div>
Crear nueva ficha
</div>

<script>
    $(document).ready(function() {
        $("#titulo").text("Crear Nueva Ficha");
        @if($modelo)
            $("#titulo").text("Editar Ficha");
        @endif

        $('#tabla_clases').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('getDataPersonajes') }}",
                    "type": "GET"
                },
                "columns": [
                    { "data": "id", "width": "5%", "className": "text-center" },
                    { "data": "jugador", "width": "40%" },
                    { "data": "nombre", "width": "40%" },
                    { "data": "clase", "width": "10%" },
                    { "data": "action", "width": "5%", "orderable": false, "searchable": false, "className": "text-center" }
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
            },
        );
    });
</script>
