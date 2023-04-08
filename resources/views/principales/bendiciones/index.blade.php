<div class="mb-2">
    <button id="btn-add" class="btn btn-success" onclick="abrirModal()"><i class="fas fa-plus"></i> Agregar nueva Bendición/Maldición</button>
</div>

<div>
    <table id="tabla_bendiciones" class="table table-hover table-sm table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>alineaciones</th>
                <th>Dificultad</th>
                <th>Objetivo</th>
                <th>Duración</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modalBendiciones" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">Título del modal</h5>
                <a type="button" data-bs-dismiss="modal" aria-label="Close" onclick='$("#modalBendiciones").modal("hide")'><i
                        class="fas fa-times"></i></a>
            </div>
            <form id="formularioBendicion">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="alineaciones" class="form-label">Alineaciones</label>
                        <select class="form-control form-control-sm" id="alineaciones" name="alineaciones" required>
                            @foreach($dioses as $dios)
                            <option value="{{ $dios->id }}">{{ $dios->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="mb-3 col-4">
                            <label for="dificultad" class="form-label">Dificultad</label>
                            <input type="number" class="form-control form-control-sm" id="dificultad" name="dificultad">
                        </div>

                        <div class="mb-3 col-4">
                            <label for="objetivo" class="form-label">Objetivo</label>
                            <input type="text" class="form-control form-control-sm" id="objetivo" name="objetivo">
                        </div>

                        <div class="mb-3 col-4">
                            <label for="coste" class="form-label">Coste</label>
                            <input type="text" class="form-control form-control-sm" id="coste" name="coste">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Escribe una descripción"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="critico" class="form-label">Exito Crítico:</label>
                        <textarea class="form-control" id="critico" name="critico" placeholder="Escribe el efecto del crítico de la bendición/maldición"></textarea>
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
        $("#titulo").text("Bendiciones/Maldiciones");
        $('#tabla_bendiciones').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('getDataBendiciones') }}",
                    "type": "GET"
                },
                "columns": [
                    { "data": "id", "width": "5%", "className": "text-center" },
                    { "data": "nombre", "width": "30%" },
                    { "data": "alineaciones", "width": "15%" },
                    { "data": "dificultad", "width": "5%", "className": "text-right" },
                    { "data": "objetivo", "width": "15%" },
                    { "data": "duracion", "width": "5%" },
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

        $("#alineaciones").select2({
            language: "es",
            width: "100%",
            placeholder: "Seleccione las alineaciones",
            multiple: true,
            theme: 'classic'
        });

    });

    async function abrirModal(editar = false) {
        let ruta = "";

        $("#nombre").val("");
        $("#alineaciones").val("").trigger("change");
        $("#dificultad").val("");
        $("#objetivo").val("");
        $("#coste").val("");
        $("#descripcion").val("");
        $("#critico").val("");

        $("#miModalLabel").html("Nueva Bendición/Maldición");
        if (!editar) {
            ruta = "{{ route('storeBendicion') }}";
        } else {
            let datos = await getDatosPropiedad(editar);
            $("#miModalLabel").html("Editando Bendición/Maldición");
            ruta = "{{ route('updateBendicion', '_id_') }}";
            ruta = ruta.replace("_id_", datos.id);

            $("#nombre").val(datos.nombre);
            $("#dificultad").val(datos.dificultad);
            $("#objetivo").val(datos.objetivo);
            $("#coste").val(datos.coste);
            $("#descripcion").val(datos.descripcion);
            $("#critico").val(datos.critico);
            var alineacionesIds = [];

            for (var i = 0; i < datos.alineaciones.length; i++) {
                alineacionesIds.push(datos.alineaciones[i].id);
            }

            $("#alineaciones").val(alineacionesIds).trigger("change");
        }

        $("#formularioBendicion").attr("action", ruta);
        $("#modalBendiciones").modal();
    }


    async function getDatosPropiedad(id) {
        try {
            let ruta = "{{ route('getDataBendicion', '_id_') }} ";
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
        let ruta = $("#formularioBendicion").attr("action");
        cargaSwal('load', "Guardando datos...")
        $("#modalBendiciones").modal("hide");

        let nombre = $("#nombre").val();
        let dificultad = $("#dificultad").val();
        let objetivo = $("#objetivo").val();
        let coste = $("#coste").val();
        let descripcion = $("#descripcion").val();
        let critico = $("#critico").val();
        let alineaciones = $("#alineaciones").val();

        $.ajax({
            url: ruta,
            method: 'POST',
            data: {
                nombre,
                dificultad,
                objetivo,
                coste,
                descripcion,
                critico,
                alineaciones,
            },
            success: function(response) {
                cargaSwal(response.status, response.mensaje)
                $("#tabla_bendiciones").DataTable().ajax.reload(null, false);
            },
            error: function(xhr, status, error) {
                cargaSwal(false, "Error en el servidor al procesar su petición.")
            }
        });
    }

    function deleteBendicion(id) {
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
                    url: "{{ route('deleteBendicion') }}",
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        cargaSwal(response.status, response.mensaje)
                        $("#tabla_bendiciones").DataTable().ajax.reload(null, false);
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
