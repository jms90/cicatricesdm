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
                            <label for="equipo">Equipo:</label>
                                <select id="equipo">
                                    @foreach($petrechos as $equipo)
                                    <option value="{{ $equipo->id }}" data-nombre="{{ $equipo->nombre }}" data-descripcion="{{ $equipo->descripcion }}">
                                      {{ $equipo->nombre }}
                                    </option>
                                  @endforeach
                                <!-- Agrega más opciones según tus necesidades -->
                                </select>

                                <label for="cantidad">Cantidad:</label>
                                <input type="number" id="cantidad" min="1" max="100" value="1">

                                <label for="descripcioObjeton">Descripción:</label>
                                <input type="text" id="descripcioObjeton">


                                <button id="crear-objeto">Crear objeto</button>
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
    var objetos = [];
    $(document).ready(function() {
        $('#crear-objeto').click(function() {
            agregarObjeto
        });


        $('#equipo').on('change', function() {
            var index = $(this).closest('.objeto').data('index');
            var equipoId = $(this).val();
            var equipoNombre = $(this).find('option:selected').data('nombre');
            var equipoDescripcion = $(this).find('option:selected').data('descripcion');
            objetos[index]['equipo_id'] = equipoId; // Actualiza el id del equipo en el objeto correspondiente en la variable global
            objetos[index]['equipo_nombre'] = equipoNombre; // Actualiza el nombre del equipo en el objeto correspondiente en la variable global
            objetos[index]['equipo_descripcion'] = equipoDescripcion; // Actualiza la descripción del equipo en el objeto correspondiente en la variable global
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

    function agregarObjeto() {
        // Obtén los valores de los inputs
        var equipoId = $('#equipo').val();
        var cantidad = $('#cantidad').val();
        var descripcion = $('#descripcion').val();

        // Crea el objeto con las propiedades "equipo_id", "cantidad" y "descripcion"
        var objeto = {
            equipo_id: equipoId,
            cantidad: cantidad,
            descripcion: descripcion
        };

        // Agrega el objeto a la variable global y actualiza la vista
        objetos.push(objeto);
        actualizarVista();
    }

    function actualizarVista() {
        var objetoHtml = ''; // Aquí se guardará el HTML de cada objeto
        for (var i = 0; i < objetos.length; i++) {
            // Crea el HTML para mostrar el objeto actual
            var equipoNombre = '';
            var equipoDescripcion = '';
            for (var j = 0; j < equipos.length; j++) {
            if (equipos[j].id == objetos[i].equipo_id) {
                equipoNombre = equipos[j].nombre;
                equipoDescripcion = equipos[j].descripcion;
                break;
            }
            }
            var objetoHtmlActual = `
            <div class="objeto" data-index="${i}">
                <span>Equipo:</span>
                <select class="equipo-selector" data-actual="${objetos[i].equipo_id}">
                ${generarOpcionesSelect(equipos, objetos[i].equipo_id)}
                </select>
                <span>Cantidad:</span>
                <input type="number" class="cantidad" value="${objetos[i].cantidad}">
                <span>Descripción:</span>
                <input type="text" class="descripcion" value="${objetos[i].descripcion}">
                <button class="eliminar-objeto">Eliminar</button>
                <br>
                <span>Nombre del equipo: ${equipoNombre}</span>
                <br>
                <span>Descripción del equipo: ${equipoDescripcion}</span>
            </div>
            `;
            objetoHtml += objetoHtmlActual;
        }
        $('#objetos').html(objetoHtml); // Actualiza la vista con los objetos

        // Agrega un evento click al botón de eliminar objeto
        $('.eliminar-objeto').on('click', function() {
            var index = $(this).closest('.objeto').data('index');
            objetos.splice(index, 1); // Elimina el objeto correspondiente de la variable global
            actualizarVista(); // Actualiza la vista con los objetos restantes
        });

        // Agrega un evento change al selector de equipo
        $('.equipo-selector').on('change', function() {
            var index = $(this).closest('.objeto').data('index');
            var equipoId = $(this).val();
            var equipoNombre = $(this).find('option:selected').data('nombre');
            var equipoDescripcion = $(this).find('option:selected').data('descripcion');
            objetos[index]['equipo_id'] = equipoId; // Actualiza el id del equipo en el objeto correspondiente en la variable global
            objetos[index]['equipo_nombre'] = equipoNombre; // Actualiza el nombre del equipo en el objeto correspondiente en la variable global
            objetos[index]['equipo_descripcion'] = equipoDescripcion; // Actualiza la descripción del equipo en el objeto correspondiente en la variable global
        });
        }

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
            $("#talento_id").val(datos.talento_id).trigger("change");

            datos.atributos.forEach(element => {
                $(`#nivel_${element.nivel}_${element.atributo_id}`).val(element.cantidad_nivel)
            });
            $("#descripcion").val(datos.descripcion);
        }

        $("#formularioClase").attr("action", ruta);
        $("#modalClases").modal();
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
