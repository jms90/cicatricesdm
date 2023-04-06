<div class="mb-2">
    <button id="btn-add" class="btn btn-success" onclick="abrirModal()"><i class="fas fa-plus"></i> Agregar nuevo
        Tipo</button>
</div>

<div>
    <table id="tabla_objetos" class="table table-hover table-sm table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Clase de Objeto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modalTipo" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">Título del modal</h5>
                <a type="button" data-bs-dismiss="modal" aria-label="Close" onclick='$("#modalTipo").modal("hide")'><i
                        class="fas fa-times"></i></a>
            </div>
            <form id="formularioTipo">
                <div class="modal-body">
                    <div class="mb-3 col-12">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="row">
                        <div class="mb-3 col-4">
                            <label for="arma" class="form-label">Arma:</label>
                            <input type="checkbox" class="form-control" id="arma" name="clase">
                        </div>
                        <div class="mb-3 col-4">
                            <label for="armadura" class="form-label">Armadura:</label>
                            <input type="checkbox" class="form-control" id="armadura" name="clase">
                        </div>
                        <div class="mb-3 col-4">
                            <label for="petrecho" class="form-label">Petrecho:</label>
                            <input type="checkbox" class="form-control" id="petrecho" name="clase">
                        </div>
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
        $("#titulo").text("Tipos de Objetos");

        $('input[name=clase]').on('change', function() {
            $('input[name=clase]').not(this).prop('checked', false);
        });

        $('#tabla_objetos').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('getDataObjetos') }}",
                    "type": "GET"
                },
                "columns": [
                    { "data": "id", "width": "10%" },
                    { "data": "nombre", "width": "50%" },
                    { "data": "clase", "width": "20%" },
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
        $("#arma").prop("checked", false);
        $("#armadura").prop("checked", false);
        $("#petrecho").prop("checked", false);
        $("#miModalLabel").html("Nuevo Tipo de Objeto");
        if (!editar) {
            ruta = "{{ route('storeTipo') }}";
        } else {
            let datos = await getDatosTipos(editar);
            $("#miModalLabel").html("Editando un Tipo de Objeto");
            ruta = "{{ route('updateTipo', '_id_') }}";
            ruta = ruta.replace("_id_", datos.id);

            $("#nombre").val(datos.nombre);
            $("#arma").prop("checked", datos.arma == 1);
            $("#armadura").prop("checked", datos.armadura == 1);
            $("#petrecho").prop("checked", datos.petrecho == 1);
        }

        $("#formularioTipo").attr("action", ruta);
        $("#modalTipo").modal();
    }


    async function getDatosTipos(id) {
        try {
            let ruta = "{{ route('getDataTipo', '_id_') }} ";
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
        let ruta = $("#formularioTipo").attr("action");
        cargaSwal('load', "Guardando datos...")
        $("#modalTipo").modal("hide");

        let nombre = $("#nombre").val();
        let arma = $("#arma").prop("checked");
        let armadura = $("#armadura").prop("checked");
        let petrecho = $("#petrecho").prop("checked");
        $.ajax({
            url: ruta,
            method: 'POST',
            data: {
                nombre,
                arma,
                armadura,
                petrecho
            },
            success: function(response) {
                cargaSwal(response.status, response.mensaje)
                $("#tabla_objetos").DataTable().ajax.reload(null, false);
            },
            error: function(xhr, status, error) {
                cargaSwal(false, "Error en el servidor al procesar su petición.")
            }
        });
    }

    function deleteTipo(id) {
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
                    url: "{{ route('deleteTipo') }}",
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        cargaSwal(response.status, response.mensaje)
                        $("#tabla_objetos").DataTable().ajax.reload(null, false);
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
