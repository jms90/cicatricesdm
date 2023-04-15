<div class="mb-2">
    <button id="btn-add" class="btn btn-success" onclick="abrirModal()"><i class="fas fa-plus"></i> Agregar nueva Clase</button>
</div>

<div>
    <table id="tabla_clases" class="table table-hover table-sm table-striped table-bordered" style="width:100%">
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
<div class="modal fade" id="modalClases" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">Título del modal</h5>
                <a type="button" data-bs-dismiss="modal" aria-label="Close" onclick='$("#modalClases").modal("hide")'><i
                        class="fas fa-times"></i></a>
            </div>
            <form id="formularioClase">
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="talento_id" class="form-label">Talento Principal</label>
                            <select class="form-control form-control-sm" id="talento_id" name="talento_id">
                                @foreach($talentos as $talento)
                                <option value="{{ $talento->id }}">{{ $talento->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Escribe una descripción"></textarea>
                    </div>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <a class="nav-item nav-link active" id="nav-atributos-tab" data-toggle="tab" href="#nav-atributos" role="tab" aria-controls="nav-atributos" aria-selected="true">Atributos</a>
                          <a class="nav-item nav-link" id="nav-equipoSugerido-tab" data-toggle="tab" href="#nav-equipoSugerido" role="tab" aria-controls="nav-equipoSugerido" aria-selected="false">Equipo Sugerido</a>
                        </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-atributos" role="tabpanel" aria-labelledby="nav-atributos-tab">
                            <div id="tabla-atributos">
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <center>
                                            <table class="tableNiveles table table-hover table-responsive table-sm" style="width: 100%;-webkit-box-shadow: 5px 5px 12px 0px rgba(0,0,0,0.68);box-shadow: 5px 5px 12px 0px rgba(0,0,0,0.68);padding: 6px;">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Atributos</th>
                                                        <th><center>Nivel 1 </center></th>
                                                        <th><center>Nivel 2 </center></th>
                                                        <th><center>Nivel 3 </center></th>
                                                        <th><center>Nivel 4 </center></th>
                                                        <th><center>Nivel 5 </center></th>
                                                        <th><center>Nivel 6 </center></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($atributos as $atributo)
                                                        <tr>
                                                            <td>{{ $atributo->nombre }}</td>
                                                            @for ($i = 1; $i <= 6; $i++)
                                                                <td>
                                                                    <center>
                                                                        <input type="number" style="text-align: right;" class="form-control form-control-sm" id="nivel_{{ $i }}_{{ $atributo->id }}" name="nivel_{{ $i }}_{{ $atributo->id }}" value="{{ $atributo->{'nivel_'.$i} }}">
                                                                    </center>
                                                                </td>
                                                            @endfor
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-equipoSugerido" role="tabpanel" aria-labelledby="nav-equipoSugerido-tab">
                            <div class="row align-items-center">
                                <div class="mb-3 col-4">
                                    <label for="equipo" class="form-label">Equipo:</label>
                                    <select id="equipo" class="form-control form-control-sm">
                                        @foreach($petrechos as $equipo)
                                            <option value="{{ $equipo->id }}" data-nombre="{{ $equipo->nombre }}" data-descripcion="{{ $equipo->descripcion }}">{{ $equipo->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-2">
                                    <label for="cantidad" class="form-label">Cantidad:</label>
                                    <input type="number" class="form-control form-control-sm" id="cantidad" min="1" max="100" value="1">
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="descripcionObjeto" class="form-label">Descripción:</label>
                                    <input type="text" id="descripcionObjeto" class="form-control form-control-sm">
                                </div>
                                <div class="mt-3 col-2">
                                    <button id="crear-objeto" class="btn btn-sm btn-info" type="button">Crear objeto</button>
                                </div>
                            </div>
                            <div id="objetos"></div>
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
    var objetos;

    var petrechos;

    $(document).ready(function() {
        petrechos = @json($petrechos);
        objetos = [];

        $("#equipo").select2({
            language: "es",
            width: "100%",
        })

        $('#crear-objeto').on('click', function() {
            var equipo = $('#equipo option:selected');
            var cantidad = $('#cantidad').val();
            var descripcion = $('#descripcionObjeto').val();
            var objeto = {
                id: uuidv4(),
                equipoId:equipo.val(),
                cantidad: cantidad,
                descripcion:descripcion,
            };
            objetos.push(objeto);
            mostrarObjetos();

            $("#equipo").val("").trigger("change");
            $("#cantidad").val("1");
            $("#descripcionObjeto").val("");
        });

        $("#titulo").text("Clases");
        $('#tabla_clases').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('getDataClases') }}",
                    "type": "GET"
                },
                "columns": [
                    { "data": "id", "width": "5%", "className": "text-center" },
                    { "data": "nombre", "width": "90%" },
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

    function mostrarObjetos() {
        var html = '';
        $('#objetos').empty();
        for (let i = 0; i < objetos.length; i++) {
            let objeto = objetos[i];
            let optionHTML = '';
            let selectHTML = '';

            // Generar opciones del select
            petrechos.forEach(function(equipo, index) {
                let selected = equipo.id == objeto.equipoId ? 'selected' : '';
                optionHTML += '<option value="' + equipo.id + '" data-nombre="' + equipo.nombre + '" data-descripcion="' + equipo.descripcion + '" ' + selected + '>' + equipo.nombre + '</option>';
            });

            selectHTML = '<select class="form-control form-control-sm equipo-select" onchange="editarObjeto(' + i + ', this.value)">' + optionHTML + '</select>';

            let html = '<div class="mb-3 objeto" data-id="' + objeto.id + '">' +
                        '<div class="row align-items-center">' +
                        '<div class="mb-3 col-4">' +
                            '<label class="form-label">Equipo:</label>' +
                            selectHTML +
                        '</div>' +
                        '<div class="mb-3 col-2">' +
                            '<label class="form-label">Cantidad:</label>' +
                            '<input type="number" class="form-control form-control-sm cantidad-input" min="1" max="100" onkeyup="editarObjetoCantidad(' + i + ', this.value)" value="' + objeto.cantidad + '">' +
                        '</div>' +
                        '<div class="mb-3 col-4">' +
                            '<label class="form-label">Descripción:</label>' +
                            '<input type="text" class="form-control form-control-sm descripcion-input" onkeyup="editarObjetoDescripcion(' + i + ',  this.value)" value="' + objeto.descripcion + '">' +
                        '</div>' +
                        '<div class="mt-3 col-2">' +
                            '<button class="btn btn-sm btn-danger eliminar-objeto" type="button">Eliminar</button>' +
                        '</div>' +
                        '</div>' +
                    '</div>';
            $('#objetos').append(html);
        }

        $(".equipo").select2({
            language: "es",
            width: "100%",
        });

        $('.eliminar-objeto').on('click', function() {
            var id = $(this).data('id');

            objetos = objetos.filter(function(objeto) {
                return objeto.id != id;
            });
            mostrarObjetos();
        });
    }


    function editarObjeto(index, valor){
        objetos[index]["equipoId"] = valor;
    };

    function editarObjetoCantidad(index, valor){
        console.log(index,valor)
        objetos[index]["cantidad"] = valor;
    };

    function editarObjetoDescripcion(index, valor){
        console.log(index,valor)
        objetos[index]["descripcion"] = valor;
    };


    function uuidv4() {
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = Math.random() * 16 | 0,
                v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
    }


    async function abrirModal(editar = false) {
        let ruta = "";

        $("#nombre").val("");
        $("#talento_id").val("").trigger("change");
        $("#descripcion").val("")
        objetos = [];

        $("#miModalLabel").html("Nueva Clase");
        if (!editar) {
            ruta = "{{ route('storeClase') }}";
        } else {
            let datos = await getDatosPropiedad(editar);
            $("#miModalLabel").html("Editando Clase");
            ruta = "{{ route('updateClase', '_id_') }}";
            ruta = ruta.replace("_id_", datos.id);

            $("#nombre").val(datos.nombre);
            $("#talento_id").val(datos.talento_id).trigger("change");

            datos.atributos.forEach(element => {
                $(`#nivel_${element.nivel}_${element.atributo_id}`).val(element.cantidad_nivel)
            });
            $("#descripcion").val(datos.descripcion);
        }

        $("#formularioClase").attr("action", ruta);
        $("#modalClases").modal();
        mostrarObjetos();
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
        let ruta = $("#formularioClase").attr("action");
        cargaSwal('load', "Guardando datos...")
        $("#modalClases").modal("hide");

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
                objetos,
            },
            success: function(response) {
                cargaSwal(response.status, response.mensaje)
                $("#tabla_clases").DataTable().ajax.reload(null, false);
            },
            error: function(xhr, status, error) {
                cargaSwal(false, "Error en el servidor al procesar su petición.")
            }
        });
    }

    function deleteClase(id) {
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
                    url: "{{ route('deleteClase') }}",
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        cargaSwal(response.status, response.mensaje)
                        $("#tabla_clases").DataTable().ajax.reload(null, false);
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
