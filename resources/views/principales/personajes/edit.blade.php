<style>
    .no-spinner::-webkit-outer-spin-button,
    .no-spinner::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.no-spinner {
  -moz-appearance: textfield;
}
</style>
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
        <div class="col-8">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-atributos-tab" data-toggle="tab" href="#nav-atributos" role="tab" aria-controls="nav-atributos" aria-selected="true">Atributos</a>
                    <a class="nav-item nav-link" id="nav-generales-tab" data-toggle="tab" href="#nav-generales" role="tab" aria-controls="nav-generales" aria-selected="true">Generales</a>
                    <a class="nav-item nav-link" id="nav-lenguas-tab" data-toggle="tab" href="#nav-lenguas" role="tab" aria-controls="nav-lenguas" aria-selected="false">Lenguas</a>
                    <a class="nav-item nav-link" id="nav-saberes-tab" data-toggle="tab" href="#nav-saberes" role="tab" aria-controls="nav-saberes" aria-selected="false">Saberes</a>
                    <a class="nav-item nav-link" id="nav-oficios-tab" data-toggle="tab" href="#nav-oficios" role="tab" aria-controls="nav-oficios" aria-selected="false">Oficios</a>
                    <a class="nav-item nav-link" id="nav-avances-tab" data-toggle="tab" href="#nav-avances" role="tab" aria-controls="nav-avances" aria-selected="false">Avances</a>
                    <a class="nav-item nav-link" id="nav-traumas-tab" data-toggle="tab" href="#nav-traumas" role="tab" aria-controls="nav-traumas" aria-selected="false">Traumas, Locuras ...</a>
                    <a class="nav-item nav-link" id="nav-inventario-tab" data-toggle="tab" href="#nav-inventario" role="tab" aria-controls="nav-inventario" aria-selected="false">Inventario</a>

                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-atributos" role="tabpanel" aria-labelledby="nav-atributos-tab">
                    <div class="row">
                        <div class="col-6">
                            @foreach ($atributos->where("tipo", "0") as $atributo )
                            <div class="row">
                                <label class="col-4" for="{{ $atributo->nombre }}">{{ $atributo->nombre }}</label>
                                @for ($i = 1; $i <= 6; $i++)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="atributo_{{ $atributo->id }}_{{ $i }}" name="{{ $atributo->nombre }}"{{$i == 1 ? "checked" : ""}}>
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
                                        <input class="form-check-input" type="checkbox" id="atributo_{{ $atributo->id }}_{{ $i }}" name="{{ $atributo->nombre }}"{{$i == 1 ? "checked" : ""}}>
                                        <label class="form-check-label" for="{{ $atributo->nombre }}_{{ $i }}"></label>
                                    </div>
                                @endfor
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-generales" role="tabpanel" aria-labelledby="nav-generales-tab">
                    <div class="col-12">
                        @php
                        $count = 1;
                        @endphp
                        @foreach ($habilidades->where("tipo", 0) as $habilidad)
                        @if ($count % 4 == 1)
                            <div class="row">
                        @endif
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="d-flex align-items-center">
                                        <label for="habilidad_{{ $habilidad->nombre }}" class="mr-2">{{ $habilidad->nombre }}</label>
                                        @for ($i = 1; $i <= 4; $i++)
                                            <div class="form-check form-check-inline  ml-auto" style="width: 7px;">
                                                <input class="form-check-input" type="checkbox" id="habilidad_{{ $habilidad->id }}_{{ $i }}" name="{{ $habilidad->nombre }}" style="{{$i == 4 ? "box-shadow: 1px 1px 10px 0.2rem #a77df585" : ""}}">
                                                <label class="form-check-label" for="{{ $habilidad->nombre }}_{{ $i }}"></label>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                                @if ($count % 4 == 0 || $loop->last)
                                    </div>
                                @endif
                                @php
                                    $count++;
                                @endphp
                        @endforeach
                        </div>
                </div>
                <div class="tab-pane fade" id="nav-lenguas" role="tabpanel" aria-labelledby="nav-lenguas-tab">
                    <div class="col-12">
                        @php
                        $count = 1;
                        @endphp
                        @foreach ($habilidades->where("tipo", 1) as $habilidad)
                        @if ($count % 4 == 1)
                            <div class="row">
                        @endif
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="d-flex align-items-center">
                                        <label for="{{ $habilidad->nombre }}_{{ $i }}" class="mr-2">{{ $habilidad->nombre }}</label>
                                        @for ($i = 1; $i <= 4; $i++)
                                            <div class="form-check form-check-inline  ml-auto" style="width: 7px;">
                                                <input class="form-check-input" type="checkbox" id="habilidad_{{ $habilidad->id }}_{{ $i }}" name="{{ $habilidad->nombre }}" style="{{$i == 4 ? "box-shadow: 1px 1px 10px 0.2rem #a77df585" : ""}}">
                                                <label class="form-check-label" for="{{ $habilidad->nombre }}_{{ $i }}"></label>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                                @if ($count % 4 == 0 || $loop->last)
                                    </div>
                                @endif
                                @php
                                    $count++;
                                @endphp
                        @endforeach
                        </div>
                </div>
                <div class="tab-pane fade" id="nav-saberes" role="tabpanel" aria-labelledby="nav-saberes-tab">
                    <div class="col-12">
                        @php
                        $count = 1;
                        @endphp
                        @foreach ($habilidades->where("tipo", 2) as $habilidad)
                        @if ($count % 4 == 1)
                            <div class="row">
                        @endif
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="d-flex align-items-center">
                                        <label for="{{ $habilidad->nombre }}_{{ $i }}" class="mr-2">{{ $habilidad->nombre }}</label>
                                        @for ($i = 1; $i <= 4; $i++)
                                            <div class="form-check form-check-inline  ml-auto" style="width: 7px;">
                                                <input class="form-check-input" type="checkbox" id="habilidad_{{ $habilidad->id }}_{{ $i }}" name="{{ $habilidad->nombre }}" style="{{$i == 4 ? "box-shadow: 1px 1px 10px 0.2rem #a77df585" : ""}}">
                                                <label class="form-check-label" for="{{ $habilidad->nombre }}_{{ $i }}"></label>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                                @if ($count % 4 == 0 || $loop->last)
                                    </div>
                                @endif
                                @php
                                    $count++;
                                @endphp
                        @endforeach
                        </div>
                </div>
                <div class="tab-pane fade" id="nav-oficios" role="tabpanel" aria-labelledby="nav-oficios-tab">
                    <div class="col-12">
                        @php
                        $count = 1;
                        @endphp
                        @foreach ($habilidades->where("tipo", 3) as $habilidad)
                        @if ($count % 4 == 1)
                            <div class="row">
                        @endif
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="d-flex align-items-center">
                                        <label for="{{ $habilidad->nombre }}_{{ $i }}" class="mr-2">{{ $habilidad->nombre }}</label>
                                        @for ($i = 1; $i <= 4; $i++)
                                            <div class="form-check form-check-inline  ml-auto" style="width: 7px;">
                                                <input class="form-check-input" type="checkbox" id="habilidad_{{ $habilidad->id }}_{{ $i }}" name="{{ $habilidad->nombre }}" style="{{$i == 4 ? "box-shadow: 1px 1px 10px 0.2rem #a77df585" : ""}}">
                                                <label class="form-check-label" for="{{ $habilidad->nombre }}_{{ $i }}"></label>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                                @if ($count % 4 == 0 || $loop->last)
                                    </div>
                                @endif
                                @php
                                    $count++;
                                @endphp
                        @endforeach
                        </div>
                </div>
                <div class="tab-pane fade" id="nav-avances" role="tabpanel" aria-labelledby="nav-avances-tab">
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
                                    @foreach ($atributosNiveles as $atributo)
                                        <tr>
                                            <td>{{ $atributo->nombre }}</td>
                                            @for ($i = 1; $i <= 6; $i++)
                                                <td>
                                                    <div class="row align-items-center justify-content-center">
                                                        <input type="number" style="text-align: right;" class="no-spinner form-control col-3 form-control-sm" id="nivel_{{ $i }}_{{ $atributo->id }}" name="nivel_{{ $i }}_{{ $atributo->id }}" value="{{ $atributo->{'nivel_'.$i} }}">
                                                        &nbsp;/&nbsp;
                                                        <input type="number" style="text-align: right;" class="no-spinner form-control col-3 form-control-sm" id="nivel_secundario_{{ $i }}_{{ $atributo->id }}" name="nivel_{{ $i }}_{{ $atributo->id }}" value="{{ $atributo->{'nivel_'.$i} }}">
                                                    </div>
                                                </td>
                                            @endfor
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </center>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-traumas" role="tabpanel" aria-labelledby="nav-traumas-tab">
                    <div class="col-12">
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-inventario" role="tabpanel" aria-labelledby="nav-inventario-tab">
                    <div class="col-12">
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-4">
            <fieldset class="border p-2 col-12 ml-auto">
                <legend class="float-none w-auto">Varios</legend>
                <div class="form-group row justify-content-center align-items-center">
                    <div class="col-md-4">
                        <label for="control" class="form-label">Puntos de Vida</label>
                        <input type="number" name="puntos_vida" id="puntos_vida" class="form-control form-control-sm text-center" required>
                    </div>
                    <div class="mt-4 text-center">
                        <span>/</span>
                    </div>
                    <div class="col-md-4">
                        <label for="control" class="form-label"></label>
                        <input type="number" name="puntos_vida_restantes" id="puntos_vida_restantes" class="form-control form-control-sm text-center" required>
                    </div>
                </div>
                <hr>
                <div class="form-group row justify-content-center align-items-center">
                    <div class="col-md-4">
                        <label for="control" class="form-label">PEF</label>
                        <input type="number" name="pef_restantes" id="pef_restantes" class="form-control form-control-sm text-center" required>
                    </div>
                    <div class="mt-4 text-center">
                        <span>/</span>
                    </div>
                    <div class="col-md-4">
                        <label for="control" class="form-label">PEF Máx</label>
                        <input type="number" name="pef_total" id="pef_total" class="form-control form-control-sm text-center" required>
                    </div>
                </div>

                <div class="form-group row justify-content-center align-items-center">
                    <div class="col-md-4">
                        <label for="control" class="form-label">PEM</label>
                        <input type="number" name="pem_restantes" id="pem_restantes" class="form-control form-control-sm text-center" required>
                    </div>
                    <div class="mt-4 text-center">
                        <span>/</span>
                    </div>
                    <div class="col-md-4">
                        <label for="control" class="form-label">PEM Máx</label>
                        <input type="number" name="pem_total" id="pem_total" class="form-control form-control-sm text-center" required>
                    </div>
                </div>
                <hr>
                <div class="form-group row justify-content-center align-items-center">
                    <div class="col-md-4">
                        <label for="control" class="form-label">A.CaC</label>
                        <input type="number" name="defensa_acac" id="defensa_acac" class="form-control form-control-sm text-center" required>
                    </div>
                    <div class="text-center">
                        <span>/</span>
                    </div>
                    <div class="col-md-4">
                        <label for="control" class="form-label">Pelea</label>
                        <input type="number" name="defensa_pelea" id="defensa_pelea" class="form-control form-control-sm text-center" required>
                    </div>
                </div>
                <hr>
                <div class="form-group row justify-content-center align-items-center">
                    <div class="col-md-4">
                        <label for="control" class="form-label">Control</label>
                        <input type="number" name="control" id="control" class="form-control form-control-sm text-center" required>
                    </div>
                    <div class="mt-4 text-center">
                        <span>/</span>
                    </div>
                    <div class="col-md-4">
                        <label for="max_control" class="form-label"></label>
                        <input type="number" name="max_control" id="max_control" class="form-control form-control-sm text-center" disabled value="100">
                    </div>
                </div>
                <div class="form-group row justify-content-center align-items-center">
                    <div class="col-md-4">
                        <label for="iluminacion" class="form-label">Iluminación</label>
                        <input type="number" name="iluminacion" id="iluminacion" class="form-control form-control-sm text-center" required>
                    </div>
                    <div class="mt-4 text-center">
                        <span>/</span>
                    </div>
                    <div class="col-md-4">
                        <label for="max_iluminacion" class="form-label"></label>
                        <input type="number" name="max_iluminacion" id="max_iluminacion" class="form-control form-control-sm text-center" disabled value="100">
                    </div>
                </div>
                <div class="form-group row justify-content-center align-items-center">
                    <div class="col-md-4">
                        <label for="cordura" class="form-label">Cordura</label>
                        <input type="number" name="cordura" id="cordura" class="form-control form-control-sm text-center" required>
                    </div>
                    <div class="mt-4 text-center">
                        <span>/</span>
                    </div>
                    <div class="col-md-4">
                        <label for="max_cordura" class="form-label"></label>
                        <input type="number" name="max_cordura" id="max_cordura" class="form-control form-control-sm text-center" disabled value="100">
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">

    </div>
</div>

<script>
    $(document).ready(function() {
        $("#user_id").select2({
            language: "es",
            width: "100%",
            theme: 'classic'
        });

        $('#atributos input[type="checkbox"]').change(function() {
            var selected = parseInt($(this).attr('id').split('_')[2]);
            for (var i = 1; i <= selected; i++) {
                $('#atributo_' + $(this).attr('id').split('_')[1] + '_' + i).prop('checked', true);
            }

            for (var i = selected + 1; i <= 6; i++) {
                $('#atributo_' + $(this).attr('id').split('_')[1] + '_' + i).prop('checked', false);
            }

        });

        $('#habilidades input[type="checkbox"]').change(function() {
            var selected = parseInt($(this).attr('id').split('_')[2]);

            if (selected === 1 && !$(this).is(':checked')) {
                for (var i = 1; i <= 6; i++) {
                    $('#habilidad_' + $(this).attr('id').split('_')[1] + '_' + i).prop('checked', false);
                }
            } else {
                for (var i = 1; i <= selected; i++) {
                    $('#habilidad_' + $(this).attr('id').split('_')[1] + '_' + i).prop('checked', true);
                }

                for (var i = selected + 1; i <= 6; i++) {
                    $('#habilidad_' + $(this).attr('id').split('_')[1] + '_' + i).prop('checked', false);
                }
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
