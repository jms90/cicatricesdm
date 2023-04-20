<div class="mb-2">
    <button id="btn-add" class="btn btn-success" onclick="abrirModal()"><i class="fas fa-plus"></i>Guardar</button>
</div>

<div>
    <div class="row">
        <div class="mb-2 col-2">
            <label for="user_id" class="form-label">Jugador</label>
            <select class="form-control form-control-sm" id="user_id" name="user_id">
                @foreach ($users as $user)
                    <option {{ $modelo != null && $user->id == $modelo->user_id ? "selected" : "" }} value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2 col-2">
            <label for="nombre" class="form-label">Nombre del Pj</label>
            <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" value="{{ $modelo != null ? $modelo->nombre : "" }}">
        </div>

        <div class="mb-2 col-1">
            <label for="genero" class="form-label">Género</label>
            <select class="form-control form-control-sm" id="genero" name="genero">
                <option {{ $modelo != null && $modelo->genero == "M" ? "selected" : "" }} value="M">Masculino</option>
                <option {{ $modelo != null && $modelo->genero == "F" ? "selected" : "" }} value="F">Femenino</option>
            </select>
        </div>

        <div class="mb-2 col-1">
            <label for="ascendencia_id" class="form-label">A. Dominante</label>
            <select class="form-control form-control-sm" id="ascendencia_id" name="clase_id">
                @foreach ($ascendencias as $ascendencia)
                    <option {{ $modelo != null && $ascendencia->id == $modelo->ascendencia_id ? "selected" : "" }} value="{{ $ascendencia->id }}">{{ $ascendencia->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-2 col-1">
            <label for="segunda_ascendencia_id" class="form-label">A. Secundaria</label>
            <select class="form-control form-control-sm" id="segunda_ascendencia_id" name="clase_id">
                @foreach ($ascendencias as $ascendencia)
                    <option {{ $modelo != null && $user->id == $modelo->segunda_ascendencia_id ? "selected" : "" }} value="{{ $ascendencia->id }}">{{ $ascendencia->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="mb-2 col-2">
            <label for="clase_id" class="form-label">Primera Clase</label>
            <select class="form-control form-control-sm" id="clase_id" name="clase_id">
                @foreach ($clases as $clase)
                    <option {{ $modelo != null && $clase->id == $modelo->clase_id ? "selected" : "" }} value="{{ $clase->id }}">{{ $clase->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-2 col-2">
            <label for="segunda_clase_id" class="form-label">Segunda Clase</label>
            <select class="form-control form-control-sm" id="segunda_clase_id" name="clase_id">
                @foreach ($clases as $clase)
                    <option {{ $modelo != null && $clase->id == $modelo->segunda_clase_id ? "selected" : "" }} value="{{ $clase->id }}">{{ $clase->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2 col-5">
            <label for="concepto" class="form-label">Concepto</label>
            <input type="text" class="form-control form-control-sm" id="concepto" name="concepto" value="{{ $modelo != null ? $modelo->concepto : ""}}">
        </div>
        <div class="mb-2 col-1">
            <label for="experiencia_total" class="form-label">Exp Total</label>
            <input type="text" class="form-control form-control-sm" id="experiencia_total" name="experiencia_total" value="{{ $modelo != null ? $modelo->experiencia_total : ""}}">
        </div>
        <div class="mb-2 col-1">
            <label for="experiencia_gastada" class="form-label">Exp Gastada</label>
            <input type="text" class="form-control form-control-sm" id="experiencia_gastada" name="experiencia_gastada" value="{{ $modelo != null ? $modelo->experiencia_gastada : ""}}">
        </div>
    </div>

    <div class="row">
        <fieldset class="border p-2 col-8">
            <legend  class="float-none w-auto">Atributos</legend>
            <div class="row">
                <div class="col-6">
                    @foreach ($atributos->where("tipo", "0") as $atributo )
                    <div class="row">
                        <label class="col-4" for="{{ $atributo->nombre }}">{{ $atributo->nombre }}</label>
                        @for ($i = 1; $i <= 6; $i++)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="{{ $atributo->nombre }}_{{ $i }}" name="{{ $atributo->nombre }}">
                                <label class="form-check-label" for="{{ $atributo->nombre }}_{{ $i }}"></label>
                            </div>
                        @endfor
                    </div>
                    @endforeach
                </div>
                <div class="col-6">
                    @foreach ($atributos->where("tipo", "1") as $atributo )
                    <div class="row">
                        <label class="col-4" for="{{ $atributo->nombre }}">{{ $atributo->nombre }}</label>
                        @for ($i = 1; $i <= 6; $i++)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="{{ $atributo->nombre }}_{{ $i }}" name="{{ $atributo->nombre }}">
                                <label class="form-check-label" for="{{ $atributo->nombre }}_{{ $i }}"></label>
                            </div>
                        @endfor
                    </div>
                    @endforeach
                </div>
            </div>
        </fieldset>
        <div class="row col-4">
            <fieldset class="border p-2 col-12 ml-auto" style="height: 50px">
                <legend  class="float-none w-auto">Puntos de Vida</legend>
            </fieldset>
            <fieldset class="border p-2 col-12 ml-auto" style="height: 50px">
                <legend  class="float-none col-12 w-auto">PEF / PEM</legend>
            </fieldset>
            <fieldset class="border p-2 col-12 ml-auto" style="height: 50px">
                <legend  class="float-none col-12 w-auto">DEFENSA</legend>
            </fieldset>
            <fieldset class="border p-2 col-12 ml-auto" style="height: 50px">
            </fieldset>
        </div>


    </div>
</div>

<script>
    $(document).ready(function() {
        $("#user_id").select2({
            language: "es",
            width: "100%",
            theme: 'classic'
        });

        $('input[type="checkbox"]').change(function() {
            var selected = parseInt($(this).attr('id').split('_')[1]);

            for (var i = 1; i <= selected; i++) {
                $('#' + $(this).attr('id').split('_')[0] + '_' + i).prop('checked', true);
            }

            for (var i = selected + 1; i <= 6; i++) {
                $('#' + $(this).attr('id').split('_')[0] + '_' + i).prop('checked', false);
            }



        });


        $("#clase_id").select2({
            language: "es",
            width: "100%",
            theme: "classic"
        });

        $("#segunda_clase_id").select2({
            language: "es",
            width: "100%",
            theme: "classic"
        });

        $("#ascendencia_id").select2({
            language: "es",
            width: "100%",
            theme: "classic"
        });

        $("#segunda_ascendencia_id").select2({
            language: "es",
            width: "100%",
            theme: "classic"
        });

        $("#titulo").text("Crear Nueva Ficha");

        @if ($modelo)
            $("#titulo").text("Editar Ficha");
        @endif

        $('#tabla_clases').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('getDataPersonajes') }}",
                "type": "GET"
            },
            "columns": [{
                    "data": "id",
                    "width": "5%",
                    "className": "text-center"
                },
                {
                    "data": "jugador",
                    "width": "40%"
                },
                {
                    "data": "nombre",
                    "width": "40%"
                },
                {
                    "data": "clase",
                    "width": "10%"
                },
                {
                    "data": "action",
                    "width": "5%",
                    "orderable": false,
                    "searchable": false,
                    "className": "text-center"
                }
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
        }, );
    });
</script>
