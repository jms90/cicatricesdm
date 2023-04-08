<div class="mb-2">
    <button id="btn-add" class="btn btn-success" onclick="abrirModal()"><i class="fas fa-plus"></i> Agregar nueva Arma</button>
</div>

<div>
    <table id="tabla_armas" class="table table-hover table-sm table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Daño</th>
                <th>Estorbo</th>
                <th>Alc. Min</th>
                <th>Alc. Max</th>
                <th>Propiedades</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modalArmas" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">Título del modal</h5>
                <a type="button" data-bs-dismiss="modal" aria-label="Close" onclick='$("#modalArmas").modal("hide")'><i
                        class="fas fa-times"></i></a>
            </div>
            <form id="formularioArma">
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
                            <label for="alcance_min" class="form-label">Alcance Mínimo</label>
                            <input type="text" class="form-control form-control-sm" id="alcance_min" name="alcance_min">
                        </div>

                        <div class="mb-3 col-3">
                            <label for="alcance_max" class="form-label">Alcance Máximo</label>
                            <input type="text" class="form-control form-control-sm" id="alcance_max" name="alcance_max">
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
        $("#titulo").text("Armas");
        $('#tabla_armas').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('getDataArmas') }}",
                    "type": "GET"
                },
                "columns": [
                    { "data": "id", "width": "5%", "className": "text-center" },
                    { "data": "nombre", "width": "30%" },
                    { "data": "tipo", "width": "15%" },
                    { "data": "danio", "width": "5%", "className": "text-right" },
                    { "data": "estorbo", "width": "5%", "className": "text-right" },
                    { "data": "alcance_min", "width": "5%", "className": "text-right" },
                    { "data": "alcance_max", "width": "5%", "className": "text-right" },
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
        $("#alcance_min").val("");
        $("#alcance_max").val("");
        $("#precio").val("0");
        $("#propiedades").val("").trigger("change");
        $("#descripcion").val("")

        $("#miModalLabel").html("Nueva Arma");
        if (!editar) {
            ruta = "{{ route('storeArma') }}";
        } else {
            let datos = await getDatosPropiedad(editar);
            $("#miModalLabel").html("Editando Arma");
            ruta = "{{ route('updateArma', '_id_') }}";
            ruta = ruta.replace("_id_", datos.id);

            $("#nombre").val(datos.nombre);
            $("#tipo").val(datos.tipo_id).trigger("change");
            $("#danio").val(datos.danio);
            $("#estorbo").val(datos.estorbo);
            $("#alcance_min").val(datos.alcance_min);
            $("#alcance_max").val(datos.alcance_max);
            $("#precio").val(datos.precio);

            var propiedadesIds = [];

            for (var i = 0; i < datos.propiedades.length; i++) {
                propiedadesIds.push(datos.propiedades[i].id);
            }

            $("#propiedades").val(propiedadesIds).trigger("change");
            $("#descripcion").val(datos.descripcion);
        }

        $("#formularioArma").attr("action", ruta);
        $("#modalArmas").modal();
    }


    async function getDatosPropiedad(id) {
        try {
            let ruta = "{{ route('getDataArma', '_id_') }} ";
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
        let ruta = $("#formularioArma").attr("action");
        cargaSwal('load', "Guardando datos...")
        $("#modalArmas").modal("hide");

        let nombre = $("#nombre").val();
        let tipo = $("#tipo").val();
        let danio = $("#danio").val();
        let estorbo = $("#estorbo").val();
        let alcance_min = $("#alcance_min").val();
        let alcance_max = $("#alcance_max").val();
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
                alcance_min,
                alcance_max,
                precio,
                propiedades,
                descripcion,
            },
            success: function(response) {
                cargaSwal(response.status, response.mensaje)
                $("#tabla_armas").DataTable().ajax.reload(null, false);
            },
            error: function(xhr, status, error) {
                cargaSwal(false, "Error en el servidor al procesar su petición.")
            }
        });
    }

    function deleteArma(id) {
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
                    url: "{{ route('deleteArma') }}",
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        cargaSwal(response.status, response.mensaje)
                        $("#tabla_armas").DataTable().ajax.reload(null, false);
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
