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

                    <div id="tabla-atributos">
                        <div class="row">
                            <table class="tableNiveles table table-hover table-sm table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Atributos</th>
                                        <th>Nivel 1</th>
                                        <th>Nivel 2</th>
                                        <th>Nivel 3</th>
                                        <th>Nivel 4</th>
                                        <th>Nivel 5</th>
                                        <th>Nivel 6</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($atributos as $atributo)
                                        <tr>
                                            <td>{{ $atributo->nombre }}</td>
                                            @for ($i = 1; $i <= 6; $i++)
                                                <td>
                                                    <input type="number" class="form-control" name="nivel_{{ $i }}_{{ $atributo->id }}" value="{{ $atributo->{'nivel_'.$i} }}">
                                                </td>
                                            @endfor
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="talento_id" class="form-label">Talento Principal</label>
                        <select class="form-control form-control-sm" id="talento_id" name="talento_id">
                            @foreach($talentos as $talento)
                            <option value="{{ $talento->id }}">{{ $talento->nombre }}</option>
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
                    "url": "{{ route('getDataClases') }}",
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

        $("#talento_id").select2({
            language: "es",
            width: "100%",
            theme: 'classic'
        });
    });

    async function abrirModal(editar = false) {
        let ruta = "";

        $("#nombre").val("");
        $("#talento_id").val("").trigger("change");
        $("#descripcion").val("")

        $("#miModalLabel").html("Nueva Clase");
        if (!editar) {
            ruta = "{{ route('storeClase') }}";
        } else {
            let datos = await getDatosPropiedad(editar);
            $("#miModalLabel").html("Editando Clase");
            ruta = "{{ route('updateClase', '_id_') }}";
            ruta = ruta.replace("_id_", datos.id);

            $("#nombre").val(datos.nombre);
            $("#tipo").val(datos.talento_id).trigger("change");

            $("#descripcion").val(datos.descripcion);
        }

        $("#formularioArma").attr("action", ruta);
        $("#modalArmas").modal();
    }


    async function getDatosPropiedad(id) {
        try {
            let ruta = "{{ route('getDataClase', '_id_') }} ";
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
        let talento_id = $("#talento_id").val();
        let descripcion = $("#descripcion").val();
        var atributos = {};
        $('.tableNiveles').each(function() {
            $(this).find('input').each(function() {
                var parts = $(this).attr('name').split('_');
                var nivel = parts[1];
                var atributo_id = parts[2];
                var cantidad_nivel = $(this).val();

                if (typeof atributos[atributo_id] === 'undefined') {
                    atributos[atributo_id] = {};
                }

                atributos[atributo_id][nivel] = cantidad_nivel;
            });
        });


        $.ajax({
            url: ruta,
            method: 'POST',
            data: {
                nombre,
                talento_id,
                atributos,
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
