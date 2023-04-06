<div class="mb-2">
    <button id="btn-add" class="btn btn-success" onclick="abrirModal()"><i class="fas fa-plus"></i> Agregar nuevo Lugar de Cuerpo</button>
</div>

<div>
    <table id="tabla_lugares" class="table table-hover table-sm table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modalLugarCuerpo" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">Título del modal</h5>
                <a type="button" data-bs-dismiss="modal" aria-label="Close" onclick='$("#modalLugarCuerpo").modal("hide")'><i
                        class="fas fa-times"></i></a>
            </div>
            <form id="formularioLugarCuerpo">
                <div class="modal-body">
                    <div class="mb-3 col-12">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" onclick="guardar()" class="btn btn-primary" onclick="guardar()">Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#titulo").text("Lugares de Cuerpo");

        $('input[name=clase]').on('change', function() {
            $('input[name=clase]').not(this).prop('checked', false);
        });

        $('#tabla_lugares').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('getDataLugaresCuerpo') }}",
                    "type": "GET"
                },
                "columns": [
                    { "data": "id", "width": "10%" },
                    { "data": "nombre", "width": "70%" },
                    { "data": "action", "width": "20%", "orderable": false, "searchable": false }
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

    async function abrirModal(editar = false) {
        let ruta = "";

        $("#nombre").val("");
        $("#miModalLabel").html("Nuevo Lugar de cuerpo");
        if (!editar) {
            ruta = "{{ route('storeLugarCuerpo') }}";
        } else {
            let datos = await getDatos(editar);
            $("#miModalLabel").html("Editando un Lugar de Cuerpo");
            ruta = "{{ route('updateLugarCuerpo', '_id_') }}";
            ruta = ruta.replace("_id_", datos.id);

            $("#nombre").val(datos.nombre);
        }

        $("#formularioLugarCuerpo").attr("action", ruta);
        $("#modalLugarCuerpo").modal();
    }


    async function getDatos(id) {
        try {
            let ruta = "{{ route('getDataLugarCuerpo', '_id_') }} ";
            ruta = ruta.replace("_id_", id);

            const response = await $.ajax({
                url: ruta,
                method: 'GET'
            });
            return Promise.resolve(response);
        } catch (error) {
            return Promise.reject(error);
        }
    }

    function guardar() {
        let ruta = $("#formularioLugarCuerpo").attr("action");
        cargaSwal('load', "Guardando datos...")
        $("#modalLugarCuerpo").modal("hide");

        let nombre = $("#nombre").val();
        $.ajax({
            url: ruta,
            method: 'POST',
            data: {
                nombre,
            },
            success: function(response) {
                cargaSwal(response.status, response.mensaje)
                $("#tabla_lugares").DataTable().ajax.reload(null, false);
            },
            error: function(xhr, status, error) {
                cargaSwal(false, "Error en el servidor al procesar su petición.")
            }
        });
    }

    function deleteLugarCuerpo(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: '¡Sí, borrarlo!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {

            if (result) {
                $.ajax({
                    url: "{{ route('deleteLugarCuerpo') }}",
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        cargaSwal(response.status, response.mensaje)
                        $("#tabla_lugares").DataTable().ajax.reload(null, false);
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Error',
                            text: 'No se pudo eliminar el registro.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    }
</script>
