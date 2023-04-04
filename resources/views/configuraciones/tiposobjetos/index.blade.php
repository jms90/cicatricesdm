<div>
    <button id="btn-add" class="btn btn-success" onclick="abrirModal()"><i class="fas fa-plus"></i> Agregar nuevo Tipo</button>
</div>

<div>
    <table id="tabla_objetos" class="table table-striped table-bordered" style="width:100%">
        <thead>
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
<div class="modal fade" id="modalTipo" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">Título del modal</h5>
                <a type="button" data-bs-dismiss="modal" aria-label="Close" onclick='$("#modalTipo").modal("hide")'><i class="fas fa-times"></i></a>
            </div>
            <form id="formularioTipo">
                <div class="modal-body">
                    <div class="mb-3">
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
    console.log('Hi!');
</script>
<script>
    // Configurar DataTable y agregar botón de agregar
    $(document).ready(function() {
        $("#titulo").text("Tipos de Objetos");
        $('#tabla_objetos').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('getDataObjetos') }}",
                "type": "GET"
            },
            "columns": [{
                    "data": "id",
                    "width": "10%"
                },
                {
                    "data": "nombre",
                    "width": "70%"
                },
                {
                    "data": "action",
                    "width": "20%",
                    "orderable": false,
                    "searchable": false
                }
            ]
        });
    });

    async function abrirModal(editar = false) {
        let ruta = "";

        $("#nombre").val("");
        $("#miModalLabel").html("Nuevo Tipo de Objeto");
        if (!editar) {
            ruta = "{{route('storeTipo')}}";
        } else {
            let datos = await getDatosTipos(editar);
            $("#miModalLabel").html("Editando un Tipo de Objeto");
            ruta = "{{ route('updateTipo','_id_') }}";
            ruta = ruta.replace("_id_", datos.id);

            $("#nombre").val(datos.nombre);
        }

        $("#formularioTipo").attr("action", ruta);
        $("#modalTipo").modal();
    }


    async function getDatosTipos(id) {
        try {
            let ruta = "{{route('getDataTipo','_id_') }} ";
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
        $.ajax({
            url: ruta,
            method: 'POST',
            data: {
                nombre
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