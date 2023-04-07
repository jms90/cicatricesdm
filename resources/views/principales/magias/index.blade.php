<div class="mb-2">
    <button id="btn-add" class="btn btn-success" onclick="abrirModal()"><i class="fas fa-plus"></i> Agregar nueva Magia</button>
</div>

<div>
    <table id="tabla_magias" class="table table-hover table-sm table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Escuela</th>
                <th>Nivel</th>
                <th>Objetivo</th>
                <th>Coste</th>
                <th>Duración</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modalMagias" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">Título del modal</h5>
                <a type="button" data-bs-dismiss="modal" aria-label="Close" onclick='$("#modalMagias").modal("hide")'><i
                        class="fas fa-times"></i></a>
            </div>
            <form id="formularioMagia">
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-4">
                            <label for="escuela" class="form-label">Escuela de Magia</label>
                            <select class="form-control form-control-sm" id="escuela" name="escuela" required>
                                <option value="">Seleccione una Escuela</option>
                                @foreach($escuelas as $escuela)
                                <option value="{{ $escuela->id }}">{{ $escuela->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-8">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="mb-3 col-3">
                            <label for="nivel" class="form-label">Nivel</label>
                            <input type="nivel" class="form-control form-control-sm" id="nivel" name="nivel">
                        </div>

                        <div class="mb-3 col-3">
                            <label for="objetivo" class="form-label">Objetivo</label>
                            <input type="text" class="form-control form-control-sm" id="objetivo" name="objetivo">
                        </div>

                        <div class="mb-3 col-3">
                            <label for="coste" class="form-label">Coste</label>
                            <input type="coste" class="form-control form-control-sm" id="coste" name="coste">
                        </div>

                        <div class="mb-3 col-3">
                            <label for="duracion" class="form-label">Duración</label>
                            <input type="text" class="form-control form-control-sm" id="duracion" name="duracion">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="requisitos" class="form-label">Requisitos:</label>
                        <textarea class="form-control" id="requisitos" name="requisitos" placeholder="Escribe los requisitos del hechizo"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Escribe una descripción"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="critico" class="form-label">Exito Crítico:</label>
                        <textarea class="form-control" id="critico" name="critico" placeholder="Escribe el efecto del crítico del hechizo"></textarea>
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
        $("#titulo").text("Magias");
        $('#tabla_magias').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('getDataMagias') }}",
                    "type": "GET"
                },
                "columns": [
                    { "data": "id", "width": "5%", "className": "text-center" },
                    { "data": "nombre", "width": "30%" },
                    { "data": "escuela", "width": "15%" },
                    { "data": "nivel", "width": "5%", "className": "text-right" },
                    { "data": "objetivo", "width": "15%" },
                    { "data": "coste", "width": "10%" },
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

        $("#escuela").select2({
            language: "es",
            width: "100%",
            theme: 'classic'
        });

    });

    async function abrirModal(editar = false) {
        let ruta = "";

        $("#escuela").val("").trigger("change");
        $("#nombre").val("");
        $("#nivel").val("");
        $("#objetivo").val("");
        $("#coste").val("");
        $("#duracion").val("");
        $("#requisitos").val("");
        $("#descripcion").val("");
        $("#critico").val("");

        $("#miModalLabel").html("Nueva Magia");
        if (!editar) {
            ruta = "{{ route('storeMagia') }}";
        } else {
            let datos = await getDatosPropiedad(editar);
            $("#miModalLabel").html("Editando Magia");
            ruta = "{{ route('updateMagia', '_id_') }}";
            ruta = ruta.replace("_id_", datos.id);

            $("#escuela").val(datos.escuela_id).trigger("change");
            $("#nombre").val(datos.nombre);
            $("#nivel").val(datos.nivel);
            $("#objetivo").val(datos.objetivo);
            $("#coste").val(datos.coste);
            $("#duracion").val(datos.duracion);
            $("#requisitos").val(datos.requisitos);
            $("#descripcion").val(datos.descripcion);
            $("#critico").val(datos.critico);

        }

        $("#formularioMagia").attr("action", ruta);
        $("#modalMagias").modal();
    }


    async function getDatosPropiedad(id) {
        try {
            let ruta = "{{ route('getDataMagia', '_id_') }} ";
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
        let ruta = $("#formularioMagia").attr("action");
        cargaSwal('load', "Guardando datos...")
        $("#modalMagias").modal("hide");

        let escuela = $("#escuela").val();
        let nombre = $("#nombre").val();
        let nivel = $("#nivel").val();
        let objetivo = $("#objetivo").val();
        let coste = $("#coste").val();
        let duracion = $("#duracion").val();
        let requisitos = $("#requisitos").val();
        let descripcion = $("#descripcion").val();
        let critico = $("#critico").val();

        $.ajax({
            url: ruta,
            method: 'POST',
            data: {
                escuela,
                nombre,
                nivel,
                objetivo,
                coste,
                duracion,
                requisitos,
                descripcion,
                critico,
            },
            success: function(response) {
                cargaSwal(response.status, response.mensaje)
                $("#tabla_magias").DataTable().ajax.reload(null, false);
            },
            error: function(xhr, status, error) {
                cargaSwal(false, "Error en el servidor al procesar su petición.")
            }
        });
    }

    function deleteMagia(id) {
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
                    url: "{{ route('deleteMagia') }}",
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        cargaSwal(response.status, response.mensaje)
                        $("#tabla_magias").DataTable().ajax.reload(null, false);
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
