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
        <div class="col-9">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-atributos-tab" data-toggle="tab" href="#nav-atributos" role="tab" aria-controls="nav-atributos" aria-selected="true">Atributos</a>
                    <a class="nav-item nav-link" id="nav-generales-tab" data-toggle="tab" href="#nav-generales" role="tab" aria-controls="nav-generales" aria-selected="true">Generales</a>
                    <a class="nav-item nav-link" id="nav-lenguas-tab" data-toggle="tab" href="#nav-lenguas" role="tab" aria-controls="nav-lenguas" aria-selected="false">Lenguas</a>
                    <a class="nav-item nav-link" id="nav-saberes-tab" data-toggle="tab" href="#nav-saberes" role="tab" aria-controls="nav-saberes" aria-selected="false">Saberes</a>
                    <a class="nav-item nav-link" id="nav-oficios-tab" data-toggle="tab" href="#nav-oficios" role="tab" aria-controls="nav-oficios" aria-selected="false">Oficios</a>
                    <a class="nav-item nav-link" id="nav-avances-tab" data-toggle="tab" href="#nav-avances" role="tab" aria-controls="nav-avances" aria-selected="false">Avances</a>
                    <a class="nav-item nav-link" id="nav-traumas-tab" data-toggle="tab" href="#nav-traumas" role="tab" aria-controls="nav-traumas" aria-selected="false">Traumas, Locuras ...</a>
                    <a class="nav-item nav-link" id="nav-talentos-tab" data-toggle="tab" href="#nav-talentos" role="tab" aria-controls="nav-talentos" aria-selected="false">Talentos</a>
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
                <div class="tab-pane fade" id="nav-talentos" role="tabpanel" aria-labelledby="nav-talentos-tab">
                    <div class="col-12">
                        <select class="form-control form-control-sm" id="talentos" name="talentos[]" multiple>

                            @foreach ($talentos as $talento)
                                <option value="{{ $talento->id }}">{{ $talento->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-inventario" role="tabpanel" aria-labelledby="nav-inventario-tab">
                    <div class="col-12">
                        <div class="row">
                            <table>
                                <tr>
                                  <td>ESTORBO 2 :</td>
                                  <td>
                                    <div class="row align-items-center justify-content-center">
                                        <input type="number" style="text-align: center;" class="no-spinner form-control col-3 form-control-sm" id="estorbo2" name="estorbo2" value="0">
                                        &nbsp;/&nbsp;
                                        <input type="number" style="text-align: center;" class="no-spinner form-control col-3 form-control-sm" id="estorbo2_max" name="estorbo2_max" value="4">
                                    </div>
                                </tr>
                                <tr>
                                    <td>ESTORBO 3 :</td>
                                    <td>
                                      <div class="row align-items-center justify-content-center">
                                          <input type="number" style="text-align: center;" class="no-spinner form-control col-3 form-control-sm" id="estorbo3" name="estorbo3" value="0">
                                          &nbsp;/&nbsp;
                                          <input type="number" style="text-align: center;" class="no-spinner form-control col-3 form-control-sm" id="estorbo3_max" name="estorbo3_max" value="3">
                                      </div>
                                  </tr>
                                  <tr>
                                    <td>ESTORBO 4 :</td>
                                    <td>
                                      <div class="row align-items-center justify-content-center">
                                          <input type="number" style="text-align: center;" class="no-spinner form-control col-3 form-control-sm" id="estorbo4" name="estorbo4" value="0">
                                          &nbsp;/&nbsp;
                                          <input type="number" style="text-align: center;" class="no-spinner form-control col-3 form-control-sm" id="estorbo4_max" name="estorbo4_max" value="1">
                                      </div>
                                  </tr>
                                <tr>
                              </table>
                        </div>

                        <div class="row align-items-center">
                            <div class="mb-3 col-4">
                                <label for="equipo" class="form-label">Equipo:</label>
                                <select id="equipo" class="form-control form-control-sm">
                                    @foreach($petrechos->merge($armas)->merge($armaduras) as $equipo)
                                        <option value="{{ $equipo->id }}" data-danio="{{$equipo->danio}}" data-alcance="{{$equipo->alcance_max}}" data-propiedades="{{$equipo->propiedades}}"  data-tipo_id="{{$equipo->tipo_id}}" data-estorbo="{{$equipo->estorbo}}" data-estorbo2="{{$equipo->estorbo_2}}" data-estorbo3="{{$equipo->estorbo_3}}" data-nombre="{{ $equipo->nombre }}" data-descripcion="{{ $equipo->descripcion }}">{{ $equipo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-2">
                                <label for="cantidad" class="form-label">Cantidad:</label>
                                <input type="number" class="form-control form-control-sm" id="cantidad" min="1" max="100" value="1">
                            </div>
                            <div class="mb-3 col-3">
                                <label for="descripcionObjeto" class="form-label">Descripción:</label>
                                <input type="text" id="descripcionObjeto" class="form-control form-control-sm">
                            </div>
                            <div class="mt-3 col-3">
                                <button id="crear-objeto" class="btn btn-sm btn-info" type="button"><i class="fas fa-plus"></i> Objeto</button>
                                <button id="crear-arma" class="btn btn-sm btn-warning" type="button"><i class="fas fa-plus"></i>Add Arma</button>
                                <button id="crear-armadura" class="btn btn-sm btn-secondary" type="button"><i class="fas fa-plus"></i>Add Armadura</button>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card">
                              <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Armas <span class="badge badge-warning" style="display:none;" id="totalArmas"></span>
                                  </button>
                                </h5>
                              </div>

                              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <div id="armas"></div>
                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Armaduras <span class="badge badge-warning" style="display:none;" id="totalArmaduras"></span>
                                  </button>
                                </h5>
                              </div>
                              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <div id="armaduras"></div>
                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Objetos <span class="badge badge-warning" style="display:none;" id="totalObjetos"></span>
                                  </button>
                                </h5>
                              </div>
                              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <div id="objetos"></div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-3">
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
        petrechos = @json($petrechos);
        armas = @json($armas);
        armaduras = @json($armaduras);
        objetos = [];
        armasPj = [];
        armadurasPj = [];

        $("#user_id").select2({
            language: "es",
            width: "100%",
            theme: 'classic'
        });

        $("#talentos").select2({
            language: "es",
            width: "100%",
            theme: 'classic',
            multiple: true
        });

        $("#equipo").select2({
            language: "es",
            width: "100%",
            theme: 'classic',
        });

        $("#crear-arma").on("click", function(){
            var equipo = $('#equipo option:selected');
            var cantidad = $('#cantidad').val();
            var descripcion = $('#descripcionObjeto').val();

            let arma = armas.find(arma => arma.id == equipo.val());

            let propiedades = [];
                arma.propiedades.forEach(propiedad => {
                    propiedades.push(propiedad.id);
            });

            arma = {
                id: uuidv4(),
                armaId:equipo.val(),
                tipo_id: equipo.data('tipo_id'),
                danio: equipo.data('danio'),
                alcance: equipo.data('alcance'),
                estorbo: equipo.data('estorbo'),
                propiedades: propiedades,
            }
            armasPj.push(arma);
            mostrarArmas();

            $("#equipo").val("").trigger("change");
            $("#cantidad").val("1");
            $("#descripcionObjeto").val("");
        });

        $('#crear-objeto').on('click', function() {
            var equipo = $('#equipo option:selected');
            var cantidad = $('#cantidad').val();
            var descripcion = $('#descripcionObjeto').val();

            let objeto = {
                id: uuidv4(),
                equipoId:equipo.val(),
                cantidad: cantidad,
                tipo_id: equipo.data('tipo_id'),
                estorbo: equipo.data('estorbo'),
                estorbo2: equipo.data('estorbo2'),
                estorbo3: equipo.data('estorbo3'),
                descripcion:descripcion,
            };
            objetos.push(objeto);
            mostrarObjetos();

            $("#equipo").val("").trigger("change");
            $("#cantidad").val("1");
            $("#descripcionObjeto").val("");
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

    function mostrarObjetos() {
        var html = '';
        actualizarEstorbos();
        $('#objetos').empty();
        $("#totalObjetos").text("");
        $("#totalObjetos").hide();
        if(objetos.length > 0){
            $("#totalObjetos").text(objetos.length);
            $("#totalObjetos").show();
        }
        for (let i = 0; i < objetos.length; i++) {
            let objeto = objetos[i];
            let optionHTML = '';
            let selectHTML = '';

            // Generar opciones del select
            petrechos.forEach(function(equipo, index) {
                let selected = equipo.id == objeto.equipoId ? 'selected' : '';
                optionHTML += '<option value="' + equipo.id + '" data-tipo_id="' + equipo.tipo_id + '" data-nombre="' + equipo.nombre + '" data-estorbo="' + equipo.estorbo + '" data-descripcion="' + equipo.descripcion + '" ' + selected + '>' + equipo.nombre + '</option>';
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
                            '<button class="btn btn-sm btn-danger eliminar-objeto" data-id="'+ objeto.id+'"  type="button">Eliminar</button>' +
                        '</div>' +
                        '</div>' +
                    '</div>';
            $('#objetos').append(html);
        }

        $(".equipo-select").select2({
            language: "es",
            width: "100%",
        });

        $('.eliminar-objeto').on('click', function() {
            var id = $(this).data('id');
            objetos = objetos.filter(function(objeto) {
                return objeto.id != id;
            });
            actualizarEstorbos();
            mostrarObjetos();
        });

    }

    function mostrarArmas(){
        var html = '';
        actualizarEstorbos();
        $('#armas').empty();
        $("#totalArmas").text("");
        $("#totalArmas").hide();
        if(armasPj.length > 0){
            $("#totalArmas").text(armasPj.length);
            $("#totalArmas").show();
        }
        for (let i = 0; i < armasPj.length; i++) {
            let objeto = armasPj[i];
            let optionHTML = '';
            let selectHTML = '';
            let optionTipoHTML = '';
            let selectTipos = '';
            let selectPropiedades = '';
            let optionPropiedadHTML = '';


            // Generar opciones del select
            armas.forEach(function(equipo, index) {
                let selected = equipo.id == objeto.armaId ? 'selected' : '';
                optionHTML += '<option value="' + equipo.id + '" data-tipo_id="' + equipo.tipo_id + '" data-nombre="' + equipo.nombre + '" data-estorbo="' + equipo.estorbo + '" data-descripcion="' + equipo.descripcion + '" ' + selected + '>' + equipo.nombre + '</option>';
            });

            @json($tipos).forEach(function(tipo, index) {
                let selected = tipo.id == objeto.tipo_id ? 'selected' : '';
                optionTipoHTML += '<option value="' + tipo.id + '"' + selected +' >' + tipo.nombre + '</option>';
            });

            @json($propiedades).forEach(function(propiedad, index) {
                let selected = objeto.propiedades.includes(propiedad.id) ? 'selected' : '';
                optionPropiedadHTML += '<option value="' + propiedad.id + '" ' + selected + '>' + propiedad.nombre + '</option>';
            });

            selectHTML = '<select class="form-control form-control-sm equipo-select" onchange="editarArma(' + i + ', this.value)">' + optionHTML + '</select>';
            selectTipos = '<select class="form-control form-control-sm tipo-select" onchange="editarObjetoTipo(' + i + ', this.value)" disabled>' + optionTipoHTML + '</select>';
            selectPropiedades = '<select class="form-control form-control-sm propiedad-select" multiple onchange="editarObjetoPropiedad(' + i + ', this.value)">' + optionPropiedadHTML + '</select>';
            let html = '<div class="mb-3 objeto" data-id="' + objeto.id + '">' +
                            '<div class="row align-items-center">' +
                                '<div class="mb-3 col-2">' +
                                    '<label class="form-label">Equipo:</label>' +
                                        selectHTML +
                                    '</div>' +
                                '<div class="mb-3 col-1">' +
                                    '<label class="form-label">Daño:</label>' +
                                    '<input type="number" class="form-control form-control-sm" disabled value="'+ objeto.danio + '">' +
                                '</div>' +
                                '<div class="mb-3 col-2">' +
                                    '<label class="form-label">Tipo:</label>' +
                                    selectTipos +
                                '</div>' +
                                '<div class="mb-3 col-1">' +
                                    '<label class="form-label">Estorbo:</label>' +
                                    '<input type="text" class="form-control form-control-sm descripcion-input" onkeyup="editarObjetoDescripcion(' + i + ',  this.value)" value="' + objeto.estorbo + '">' +
                                '</div>' +
                                '<div class="mb-3 col-4">' +
                                    '<label class="form-label">Propiedades:</label>' +
                                    selectPropiedades +
                                '</div>' +
                                '<div class="mb-3 col-1">' +
                                    '<label class="form-label">Alcance:</label>' +
                                    '<input type="text" class="form-control form-control-sm alcance-input" onkeyup="editarObjetoDescripcion(' + i + ',  this.value)" value="' + objeto.alcance + '">' +
                                '</div>' +
                                '<div class="mt-3 col-1">' +
                                    '<button class="btn btn-sm btn-danger eliminar-arma" data-id="'+ objeto.id+'"  type="button">Eliminar</button>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>';
            $('#armas').append(html);
        }

        $(".equipo-select").select2({
            language: "es",
            width: "100%",
            theme: "classic",
        });

        $(".propiedad-select").select2({
            language: "es",
            width: "100%",
            theme: "classic",
            multiple: true,
        });

        $('.eliminar-arma').on('click', function() {
            var id = $(this).data('id');
            armasPj = armasPj.filter(function(objeto) {
                return objeto.id != id;
            });
            mostrarArmas();
        });

    }


    function editarObjeto(index, valor){
        objetos[index]["equipoId"] = valor;
        actualizarEstorbos();
    };

    function editarArma(index, valor){
        armasPj[index]["armaId"] = valor;

        let arma = armas.find(arma => arma.id == valor);

        armasPj[index]["tipo_id"] = arma.tipo_id;
        armasPj[index]['danio'] = arma.danio;
        armasPj[index]['estorbo'] = arma.estorbo;
        armasPj[index]['alcance'] = arma.alcance_max;

        let propiedades = [];

        if(arma.propiedades){
            arma.propiedades.forEach(propiedad => {
                propiedades.push(propiedad.id);
            });
        }


        armasPj[index]['propiedades'] = propiedades;

        mostrarArmas();

    };
    function editarObjetoCantidad(index, valor){
        objetos[index]["cantidad"] = valor;
        actualizarEstorbos();
    };

    function editarObjetoDescripcion(index, valor){
        objetos[index]["descripcion"] = valor;
        actualizarEstorbos();
    };


    function uuidv4() {
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = Math.random() * 16 | 0,
                v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
    }

    function agruparObjetosPorPropiedad(objetos, propiedad) {
        return objetos.reduce(function(acumulador, objeto) {
            var valorPropiedad = objeto[propiedad];
            if (!acumulador[valorPropiedad]) {
            acumulador[valorPropiedad] = { valor: valorPropiedad, suma: 0, objetos: [] };
            }
            acumulador[valorPropiedad].suma += 1 * objeto.cantidad;
            acumulador[valorPropiedad].objetos.push(objeto);
            return acumulador;
        }, {});
    }

    function actualizarEstorbos(){
        let objetosEstorbo = agruparObjetosPorPropiedad(objetos, 'estorbo');

        $("#estorbo2").val(objetosEstorbo[2] ? objetosEstorbo[2].suma : 0);
        $("#estorbo3").val(objetosEstorbo[3] ? objetosEstorbo[3].suma : 0);
        $("#estorbo4").val(objetosEstorbo[4] ? objetosEstorbo[4].suma : 0);
        $("#estorbo2_max").val(4);
        $("#estorbo3_max").val(2);
        $("#estorbo4_max").val(1);
        //objetos tipo1
        let objetosTipo1 = objetos.filter(function(objeto) {
            return objeto.tipo_id == 1;
        });

        let max_estorbo2 = objetosTipo1.reduce((r, b) => Math.max(r, b.estorbo2), 0);
        let max_estorbo3 = objetosTipo1.reduce((r, b) => Math.max(r, b.estorbo3), 0);

        $("#estorbo2_max").val( parseInt($("#estorbo2_max").val()) + max_estorbo2);
        $("#estorbo3_max").val( parseInt($("#estorbo3_max").val()) + max_estorbo3);

    }
</script>
