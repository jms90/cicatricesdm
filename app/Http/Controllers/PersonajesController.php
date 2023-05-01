<?php

namespace App\Http\Controllers;

use App\Events\personajeActualizado;
use App\Models\Arma;
use App\Models\Armadura;
use App\Models\Ascendencia;
use App\Models\Atributo;
use App\Models\AtributoPj;
use App\Models\AtributosFicha;
use App\Models\Clase;
use App\Models\Habilidad;
use App\Models\LugarCuerpo;
use App\Models\Personaje;
use App\Models\Petrecho;
use App\Models\Propiedad;
use App\Models\Talento;
use App\Models\TipoObjeto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;

class PersonajesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = view("sinpermisos.sinpermisos");

        if (Auth::user()->isAbleTo("acceso-personajes")) {
            $view = view('principales.personajes.index')->render();
        }

        return $view;
    }


    public function edit($id)
    {
        $view = view("sinpermisos.sinpermisos");

        if (Auth::user()->isAbleTo("editar-personajes")) {
            $users = User::all();
            $ascendencias = Ascendencia::all();
            $clases = Clase::all();
            $atributos = AtributosFicha::all();
            $talentos = Talento::all();
            $habilidades = Habilidad::all();
            $atributosNiveles = Atributo::all();
            $petrechos = Petrecho::all();
            $armas = Arma::all();
            $armaduras = Armadura::with("lugaresCuerpo")->get();
            $propiedades = Propiedad::all();
            $tiposOArma = TipoObjeto::all();
            $lugaresCuerpo = LugarCuerpo::all();

            $modelo = Personaje::where("id", $id)->with("atributos", "habilidades",/*  "talentos", "petrechos", "armas", "armaduras",  */ "avances")->first();


            $view = view('principales.personajes.edit')
                ->with("users", $users)
                ->with("ascendencias", $ascendencias)
                ->with("clases", $clases)
                ->with("atributos", $atributos)
                ->with("talentos", $talentos)
                ->with("habilidades", $habilidades)
                ->with("atributosNiveles", $atributosNiveles)
                ->with("petrechos", $petrechos)
                ->with("armas", $armas)
                ->with("armaduras", $armaduras)
                ->with("modelo", $modelo)
                ->with("propiedades", $propiedades)
                ->with("tipos", $tiposOArma)
                ->with("lugaresCuerpo", $lugaresCuerpo)
                ->render();

            return $view;
        }
    }


    /**
     *
     * Create view
     */
    public function create()
    {
        $view = view("sinpermisos.sinpermisos");

        if (Auth::user()->isAbleTo("crear-personajes")) {
            $users = User::all();
            $ascendencias = Ascendencia::all();
            $clases = Clase::all();
            $atributos = AtributosFicha::all();
            $talentos = Talento::all();
            $habilidades = Habilidad::all();
            $atributosNiveles = Atributo::all();
            $petrechos = Petrecho::all();
            $armas = Arma::all();
            $armaduras = Armadura::with("lugaresCuerpo")->get();
            $propiedades = Propiedad::all();
            $tiposOArma = TipoObjeto::all();
            $lugaresCuerpo = LugarCuerpo::all();

            $view = view('principales.personajes.edit')
                ->with("users", $users)
                ->with("ascendencias", $ascendencias)
                ->with("clases", $clases)
                ->with("atributos", $atributos)
                ->with("talentos", $talentos)
                ->with("habilidades", $habilidades)
                ->with("atributosNiveles", $atributosNiveles)
                ->with("petrechos", $petrechos)
                ->with("armas", $armas)
                ->with("armaduras", $armaduras)
                ->with("modelo", null)
                ->with("propiedades", $propiedades)
                ->with("tipos", $tiposOArma)
                ->with("lugaresCuerpo", $lugaresCuerpo)
                ->render();
        }

        return $view;
    }

    /**
     * Obtiene los datos de todas Armaduras para una Datatble
     */
    public function getDataTable()
    {
        if (Auth::user()->isAbleTo("acceso-personajes")) {

            $sql = "SELECT
            p.id as id,
            p.nombre as nombre,
            u.name AS jugador,
            c.nombre AS clase
        FROM
            personajes p
            LEFT JOIN users u ON p.user_id = u.id
            LEFT JOIN clases c ON p.clase_id = c.id

        WHERE
            p.deleted_at IS NULL";

            $datos = DB::select($sql);

            return DataTables::of($datos)
                ->addColumn('action', function ($data) {
                    $botones = "<center>";
                    $botones .= '<button class="btn btn-info btn-sm mr-2 editar" onclick="abrirModal(' . $data->id . ')"><i class="fas fa-edit"></i></button>';
                    $botones .= '<button class="btn btn-danger btn-sm eliminar" onclick="deleteArmadura(' . $data->id . ')"><i class="fas fa-trash"></i></button>';
                    $botones .= "</center>";
                    return $botones;
                })
                ->rawColumns(['action'])
                ->make(true);
        } else {
        }
    }

    public function getData($id)
    {

        try {
            $personaje = Personaje::findOrFail($id);

            return $personaje;
        } catch (\Throwable $th) {
            return "Error al obtener los datos del armadura";
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo("crear-personajes")) {
            /*   $count = Personaje::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            } */

            $personaje = new Personaje();
            $personaje->user_id = $request->user_id;
            $personaje->nombre = $request->nombre;
            $personaje->genero = $request->genero;
            $personaje->ascendencia_id = $request->ascendencia_id;
            $personaje->segunda_ascendencia_id = $request->segunda_ascendencia_id;
            $personaje->clase_id = $request->clase_id;
            $personaje->segunda_clase_id = $request->segunda_clase_id;
            $personaje->concepto = $request->concepto;
            $personaje->experiencia_total = $request->experiencia_total;
            $personaje->experiencia_gastada = $request->experiencia_gastada;
            $personaje->puntos_vida = $request->puntos_vida;
            $personaje->puntos_vida_restantes = $request->puntos_vida_restantes;
            $personaje->pef_total = $request->pef_total;
            $personaje->pef_restantes = $request->pef_restantes;
            $personaje->pem_total = $request->pem_total;
            $personaje->pem_restantes = $request->pem_restantes;
            $personaje->defensa_acac = $request->defensa_acac;
            $personaje->defensa_pelea = $request->defensa_pelea;
            $personaje->control = $request->control;
            $personaje->iluminacion = $request->iluminacion;
            $personaje->cordura = $request->cordura;
            $personaje->edad = $request->edad;
            $personaje->peso = $request->peso;
            $personaje->altura = $request->altura;
            $personaje->complexion = $request->complexion;
            $personaje->peculiaridad = $request->peculiaridad;
            $personaje->procedencia = $request->procedencia;

            $ok = $personaje->save();

            if ($ok) {

                foreach ($request->puntosMasAltosAtributos as $atributo_id => $valor) {
                    $atributo = new Atributo;
                    $atributo->id = $atributo_id;
                    $atributo->valor = $valor;

                    $personaje->atributos()->attach($atributo, ['valor' => $valor]);
                }

                foreach ($request->habilidades as $habilidad_id => $valor) {
                    $habilidad = new Atributo;
                    $habilidad->id = $habilidad_id;
                    $habilidad->valor = $valor;

                    $personaje->habilidades()->attach($habilidad, ['valor' => $valor]);
                }

                $atributos = Atributo::all();

                foreach ($request->avances as $avance => $valor) {

                    $atributo = $atributos->where("nombre", $valor["atributo"])->first();

                    foreach ($valor["niveles"] as $clave => $avance) {
                        if ($avance != "NaN") {
                            $avancePj = new AtributoPj();
                            $avancePj->atributo_id = $atributo->id;
                            $avancePj->personaje_id = $personaje->id;
                            $avancePj->segundoNivel = ($clave + 1) % 2 == 0 ? true : false;
                            $avancePj->nivel =  ($clave + 1) % 2 == 0 ? ($clave + 1) / 2 : ($clave + 1) / 2 + 0.5;
                            $avancePj->cantidad_nivel = $avance;

                            $avancePj->save();
                        }
                    }
                }

                $personaje->talentos()->attach($request->talentos);

                return Response::json([
                    "status" => true,
                    "mensaje" => "Registro creado correctamente."
                ]);
            }

            return Response::json([
                "status" => false,
                "mensaje" => "Error al crear un nuevo registro."
            ]);
        }

        return Response::json([
            "status" => false,
            "mensaje" => "No tienes permisos para realizar esta acción",
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->isAbleTo("editar-personajes")) {

            $count = Armadura::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->where("id", "!=", $id)->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }
            $personaje = Personaje::find($id);

            $personaje->user_id = $request->user_id;
            $personaje->nombre = $request->nombre;
            $personaje->genero = $request->genero;
            $personaje->ascendencia_id = $request->ascendencia_id;
            $personaje->segunda_ascendencia_id = $request->segunda_ascendencia_id;
            $personaje->clase_id = $request->clase_id;
            $personaje->segunda_clase_id = $request->segunda_clase_id;
            $personaje->concepto = $request->concepto;
            $personaje->experiencia_total = $request->experiencia_total;
            $personaje->experiencia_gastada = $request->experiencia_gastada;
            $personaje->puntos_vida = $request->puntos_vida;
            $personaje->puntos_vida_restantes = $request->puntos_vida_restantes;
            $personaje->pef_total = $request->pef_total;
            $personaje->pef_restantes = $request->pef_restantes;
            $personaje->pem_total = $request->pem_total;
            $personaje->pem_restantes = $request->pem_restantes;
            $personaje->defensa_acac = $request->defensa_acac;
            $personaje->defensa_pelea = $request->defensa_pelea;
            $personaje->control = $request->control;
            $personaje->iluminacion = $request->iluminacion;
            $personaje->cordura = $request->cordura;
            $personaje->edad = $request->edad;
            $personaje->peso = $request->peso;
            $personaje->altura = $request->altura;
            $personaje->complexion = $request->complexion;
            $personaje->peculiaridad = $request->peculiaridad;
            $personaje->procedencia = $request->procedencia;

            $ok = $personaje->save();

            if ($ok) {

                $personaje->atributos()->detach();
                foreach ($request->puntosMasAltosAtributos as $atributo_id => $valor) {
                    $atributo = new Atributo;
                    $atributo->id = $atributo_id;
                    $atributo->valor = $valor;

                    $personaje->atributos()->attach($atributo, ['valor' => $valor]);
                }

                $personaje->habilidades()->detach();
                foreach ($request->habilidades as $habilidad_id => $valor) {
                    $habilidad = new Atributo;
                    $habilidad->id = $habilidad_id;
                    $habilidad->valor = $valor;

                    $personaje->habilidades()->attach($habilidad, ['valor' => $valor]);
                }

                $atributos = Atributo::all();

                AtributoPj::where("personaje_id", $personaje->id)->forceDelete();
                foreach ($request->avances as $avance => $valor) {

                    $atributo = $atributos->where("nombre", $valor["atributo"])->first();

                    foreach ($valor["niveles"] as $clave => $avance) {
                        if ($avance != "NaN") {
                            $avancePj = new AtributoPj();
                            $avancePj->atributo_id = $atributo->id;
                            $avancePj->personaje_id = $personaje->id;
                            $avancePj->segundoNivel = ($clave + 1) % 2 == 0 ? true : false;
                            $avancePj->nivel =  ($clave + 1) % 2 == 0 ? ($clave + 1) / 2 : ($clave + 1) / 2 + 0.5;
                            $avancePj->cantidad_nivel = $avance;

                            $avancePj->save();
                        }
                    }
                }

                $personaje->talentos()->detach();
                $personaje->talentos()->attach($request->talentos);

                event(new personajeActualizado($personaje));
                return Response::json([
                    "status" => true,
                    "mensaje" => "Registro creado correctamente."
                ]);
            }

            return Response::json([
                "status" => false,
                "mensaje" => "Error al crear un nuevo registro."
            ]);
        }

        return Response::json([
            "status" => false,
            "mensaje" => "No tienes permisos para realizar esta acción",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        if (Auth::user()->isAbleTo("borrar-personajes")) {

            try {
                $armadura = Armadura::findOrFail($request->id);

                $armadura->delete();

                return Response::json([
                    "status" => true,
                    "mensaje" => "armadura eliminada con éxito."
                ]);
            } catch (\Throwable $th) {
                return Response::json([
                    "status" => true,
                    "mensaje" => "Error al obtener los datos del armadura"
                ]);
            }
        }

        return Response::json([
            "status" => false,
            "mensaje" => "No tienes permisos para realizar esta acción",
        ]);
    }
}
