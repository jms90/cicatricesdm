<div class="mb-2">
    <button id="btn-add" class="btn btn-success" onclick="abrirModal()"><i class="fas fa-plus"></i> Agregar nueva
        Propiedad</button>
</div>

<div>
    <table id="tabla_objetos" class="table table-hover table-sm table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Bonificador/Penalizador</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modalPropiedad" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">Título del modal</h5>
                <a type="button" data-bs-dismiss="modal" aria-label="Close" onclick='$("#modalPropiedad").modal("hide")'><i
                        class="fas fa-times"></i></a>
            </div>
            <form id="formularioPropiedad">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="bonificador" class="form-label">Bonificador:</label>
                            <input type="number" min="0" class="form-control" id="bonificador" name="bonificador" value="0">
                        </div>
                        <div class="col-6">
                            <label for="penalizador" class="form-label">Penalizador:</label>
                            <input type="number" min="0" class="form-control" id="penalizador" name="penalizador" value="0">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Escribe una descripción"></textarea>
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
    console.log('Hi!');
</script>
<script>
    // Configurar DataTable y agregar botón de agregar
    $(document).ready(function() {
        $("#titulo").text("Propeidades de Objetos");
        $('#tabla_objetos').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('getDataPropiedades') }}",
                    "type": "GET"
                },
                "columns": [
                    { "data": "id", "width": "5%" },
                    { "data": "nombre", "width": "20%" },
                    { "data": "bonificadorPenalizador", "width": "15%" },
                    { "data": "descripcion", "width": "50%" },
                    { "data": "action", "width": "10%", "orderable": false, "searchable": false }
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
        $("#descripcion").val("");
        $("#bonificador").val("0");
        $("#penalizador").val("0");

        $("#miModalLabel").html("Nueva propiedad de Objeto");
        if (!editar) {
            ruta = "{{ route('storePropiedad') }}";
        } else {
            let datos = await getDatosPropiedad(editar);
            $("#miModalLabel").html("Editando propiedad de Objeto");
            ruta = "{{ route('updatePropiedad', '_id_') }}";
            ruta = ruta.replace("_id_", datos.id);

            $("#nombre").val(datos.nombre);
            $("#descripcion").val(datos.descripcion);
            $("#bonificador").val(datos.bonificador);
            $("#penalizador").val(datos.penalizador);
        }

        $("#formularioPropiedad").attr("action", ruta);
        $("#modalPropiedad").modal();
    }


    async function getDatosPropiedad(id) {
        try {
            let ruta = "{{ route('getDataPropiedad', '_id_') }} ";
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
        let ruta = $("#formularioPropiedad").attr("action");
        cargaSwal('load', "Guardando datos...")
        $("#modalPropiedad").modal("hide");

        let nombre = $("#nombre").val();
        let descripcion = $("#descripcion").val();
        let bonificador = $("#bonificador").val();
        let penalizador = $("#penalizador").val();
        $.ajax({
            url: ruta,
            method: 'POST',
            data: {
                nombre,
                descripcion,
                bonificador,
                penalizador
            },
            success: function(response) {
                console.log(response.mensaje)
                cargaSwal(response.status, response.mensaje)
                $("#tabla_objetos").DataTable().ajax.reload(null, false);
            },
            error: function(xhr, status, error) {
                cargaSwal(false, "Error en el servidor al procesar su petición.")
            }
        });
    }

    function deletePropiedad(id) {
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
                    url: "{{ route('deletePropiedad') }}",
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
