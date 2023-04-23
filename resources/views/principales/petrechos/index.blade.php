<div class="mb-2">
    <button id="btn-add" class="btn btn-success" onclick="abrirModal()"><i class="fas fa-plus"></i> Agregar nuevo Petrecho</button>
</div>

<div>
    <table id="tabla_petrechos" class="table table-hover table-sm table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Daño</th>
                <th>Estorbo</th>
                <th>Estorbo 2</th>
                <th>Estorbo 3</th>
                <th>Propiedades</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modalPetrechos" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">Título del modal</h5>
                <a type="button" data-bs-dismiss="modal" aria-label="Close" onclick='$("#modalPetrechos").modal("hide")'><i
                        class="fas fa-times"></i></a>
            </div>
            <form id="formularioPetrecho">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select class="form-control form-control-sm" id="tipo" name="tipo" required>
                            <option value="">Seleccione un tipo</option>
                            @foreach($tipos as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-3">
                            <label for="danio" class="form-label">Daño</label>
                            <input type="text" class="form-control form-control-sm" id="danio" name="danio">
                        </div>

                        <div class="mb-3 col-3">
                            <label for="estorbo" class="form-label">Estorbo</label>
                            <input type="text" class="form-control form-control-sm" id="estorbo" name="estorbo">
                        </div>

                        <div class="mb-3 col-3">
                            <label for="estorbo_2" class="form-label">Estorob 2</label>
                            <input type="text" class="form-control form-control-sm" id="estorbo_2" name="estorbo_2">
                        </div>

                        <div class="mb-3 col-3">
                            <label for="estorbo_3" class="form-label">Estorbo 3</label>
                            <input type="text" class="form-control form-control-sm" id="estorbo_3" name="estorbo_3">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="text" class="form-control form-control-sm" id="precio" name="precio">
                    </div>

                    <div class="mb-3">
                        <label for="propiedades" class="form-label">Propiedades</label>
                        <select class="form-control form-control-sm" id="propiedades" name="propiedades[]" multiple>
                            @foreach($propiedades as $propiedad)
                            <option value="{{ $propiedad->id }}">{{ $propiedad->nombre }}</option>
                            @endforeach
                        </select>
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
    $(document).ready(function() {
        $("#titulo").text("Petrechos");
        $('#tabla_petrechos').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('getDataPetrechos') }}",
                    "type": "GET"
                },
                "columns": [
                    { "data": "id", "width": "5%", "className": "text-center" },
                    { "data": "nombre", "width": "30%" },
                    { "data": "tipo", "width": "15%" },
                    { "data": "danio", "width": "5%", "className": "text-right" },
                    { "data": "estorbo", "width": "5%", "className": "text-right" },
                    { "data": "estorbo_2", "width": "5%", "className": "text-right" },
                    { "data": "estorbo_3", "width": "5%", "className": "text-right" },
                    { "data": "propiedades", "width": "30%" },
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

        $("#propiedades").select2({
                language: "es",
                multiple: true,
                width: "100%",
                theme: 'classic'
            });

        $("#tipo").select2({
            language: "es",
            width: "100%",
            placeholder: "Selecciones un tipo",
            theme: 'classic'
        })
    });

    async function abrirModal(editar = false) {
        let ruta = "";

        $("#nombre").val("");
        $("#tipo").val("").trigger("change");
        $("#danio").val("");
        $("#estorbo").val("");
        $("#estorbo_2").val("");
        $("#estorbo_3").val("");
        $("#precio").val("0");
        $("#propiedades").val("").trigger("change");
        $("#descripcion").val("")

        $("#miModalLabel").html("Nuevo Petrecho");
        if (!editar) {
            ruta = "{{ route('storePetrecho') }}";
        } else {
            let datos = await getDatosPropiedad(editar);
            $("#miModalLabel").html("Editando Petrecho");
            ruta = "{{ route('updatePetrecho', '_id_') }}";
            ruta = ruta.replace("_id_", datos.id);

            $("#nombre").val(datos.nombre);
            $("#tipo").val(datos.tipo_id).trigger("change");
            $("#danio").val(datos.danio);
            $("#estorbo").val(datos.estorbo);
            $("#estorbo_2").val(datos.estorbo_2);
            $("#estorbo_3").val(datos.estorbo_3);
            $("#precio").val(datos.precio);
            var propiedadesIds = [];
            for (var i = 0; i < datos.propiedades.length; i++) {
                console.log(datos.propiedades[i].id)
                propiedadesIds.push(datos.propiedades[i].id);
            }
            console.log(propiedadesIds);
            $("#propiedades").val(propiedadesIds).trigger("change");
            $("#descripcion").val(datos.descripcion);
        }

        $("#formularioPetrecho").attr("action", ruta);
        $("#modalPetrechos").modal();
    }


    async function getDatosPropiedad(id) {
        try {
            let ruta = "{{ route('getDataPetrecho', '_id_') }} ";
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
        let ruta = $("#formularioPetrecho").attr("action");
        cargaSwal('load', "Guardando datos...")
        $("#modalPetrechos").modal("hide");

        let nombre = $("#nombre").val();
        let tipo = $("#tipo").val();
        let danio = $("#danio").val();
        let estorbo = $("#estorbo").val();
        let estorbo_2 = $("#estorbo_2").val();
        let estorbo_3 = $("#estorbo_3").val();
        let precio = $("#precio").val();
        let propiedades = $("#propiedades").val();
        let descripcion = $("#descripcion").val();

        $.ajax({
            url: ruta,
            method: 'POST',
            data: {
                nombre,
                tipo,
                danio,
                estorbo,
                estorbo_2,
                estorbo_3,
                precio,
                propiedades,
                descripcion,
            },
            success: function(response) {
                console.log(response.mensaje)
                cargaSwal(response.status, response.mensaje)
                $("#tabla_petrechos").DataTable().ajax.reload(null, false);
            },
            error: function(xhr, status, error) {
                cargaSwal(false, "Error en el servidor al procesar su petición.")
            }
        });
    }

    function deletePetrecho(id) {
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
                    url: "{{ route('deletePetrecho') }}",
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        cargaSwal(response.status, response.mensaje)
                        $("#tabla_petrechos").DataTable().ajax.reload(null, false);
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
