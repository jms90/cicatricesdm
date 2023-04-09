<div class="mb-2">
    <button id="btn-add" class="btn btn-success" onclick="abrirModal()"><i class="fas fa-plus"></i> Agregar nueva
        Ascendencia</button>
</div>

<div>
    <table id="tabla_ascendencias" class="table table-hover table-sm table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dominante</th>
                <th>Secundaria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAscendencia" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">Título del modal</h5>
                <a type="button" data-bs-dismiss="modal" aria-label="Close" onclick='$("#modalAscendencia").modal("hide")'><i
                        class="fas fa-times"></i></a>
            </div>
            <form id="formularioAscendencia">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Escribe una descripción"></textarea>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="dominante_id" class="form-label">Dominante</label>
                            <select class="form-control form-control-sm" id="dominante_id" name="dominante_id">
                                <option value=""> Seleccione una opción</option>
                                @foreach($talentos as $talento)
                                <option value="{{ $talento->id }}">{{ $talento->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="secundaria_id" class="form-label">secundaria</label>
                            <select class="form-control form-control-sm" id="secundaria_id" name="secundaria_id">
                                <option value=""> Seleccione una opción</option>
                                @foreach($talentos as $talento)
                                <option value="{{ $talento->id }}">{{ $talento->nombre }}</option>
                                @endforeach
                            </select>
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
        $("#titulo").text("Ascendencias");

        $('input[name=clase]').on('change', function() {
            $('input[name=clase]').not(this).prop('checked', false);
        });

        $('#tabla_ascendencias').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('getDataAscendencias') }}",
                    "type": "GET"
                },
                "columns": [
                    { "data": "id", "width": "10%" },
                    { "data": "nombre", "width": "40%" },
                    { "data": "dominante", "width": "20%" },
                    { "data": "secundaria", "width": "20%" },
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

        $("#dominante_id").select2({
            language: "es",
            width: "100%",
            theme: 'classic'
        });

        $("#secundaria_id").select2({
            language: "es",
            width: "100%",
            theme: 'classic'
        });

    });

    async function abrirModal(editar = false) {
        let ruta = "";

        $("#nombre").val("");
        $("#descripcion").val("");
        $("#dominante_id").val("").trigger("change");
        $("#secundaria_id").val("").trigger("change");

        if (!editar) {
            ruta = "{{ route('storeAscendencia') }}";
        } else {
            let datos = await getDatosTipos(editar);
            $("#miModalLabel").html("Editando un Tipo de Objeto");
            ruta = "{{ route('updateAscendencia', '_id_') }}";
            ruta = ruta.replace("_id_", datos.id);

            $("#nombre").val(datos.nombre);
            $("#descripcion").val(datos.descripcion);
            $("#dominante_id").val(datos.dominante_id).trigger("change");
            $("#secundaria_id").val(datos.secundaria_id).trigger("change");
        }

        $("#formularioAscendencia").attr("action", ruta);
        $("#modalAscendencia").modal();
    }


    async function getDatosTipos(id) {
        try {
            let ruta = "{{ route('getDataAscendencia', '_id_') }} ";
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
        let ruta = $("#formularioAscendencia").attr("action");
        cargaSwal('load', "Guardando datos...")
        $("#modalAscendencia").modal("hide");

        let nombre = $("#nombre").val();
        let descripcion = $("#descripcion").val();
        let dominante_id = $("#dominante_id").val();
        let secundaria_id = $("#secundaria_id").val();
        $.ajax({
            url: ruta,
            method: 'POST',
            data: {
                nombre,
                descripcion,
                dominante_id,
                secundaria_id
            },
            success: function(response) {
                cargaSwal(response.status, response.mensaje)
                $("#tabla_ascendencias").DataTable().ajax.reload(null, false);
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
                    url: "{{ route('deleteAscendencia') }}",
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        cargaSwal(response.status, response.mensaje)
                        $("#tabla_ascendencias").DataTable().ajax.reload(null, false);
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
