<?php

namespace App\Http\Controllers;

use App\Models\Armadura;
use App\Models\Ascendencia;
use App\Models\Atributo;
use App\Models\AtributosFicha;
use App\Models\Clase;
use App\Models\Habilidad;
use App\Models\LugarCuerpo;
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
            $users = User::all();
            $ascendencias = Ascendencia::all();
            $clases = Clase::all();
            $atributos = AtributosFicha::all();
            $talentos = Talento::all();
            $habilidades = Habilidad::all();

            $view = view('principales.personajes.index')
            ->with("users", $users)
            ->with("ascendencias", $ascendencias)
            ->with("clases", $clases)
            ->with("atributos", $atributos)
            ->with("talentos", $talentos)
            ->with("habilidades", $habilidades)
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
            a.id AS id,
            a.nombre AS nombre,
            tobj.nombre as tipo,
            a.proteccion AS proteccion,
            a.estorbo AS estorbo,
            GROUP_CONCAT( propiedades.nombre SEPARATOR ', ' ) AS propiedades,
            GROUP_CONCAT( lugares_cuerpo.nombre SEPARATOR ', ' ) AS lugares,
            a.precio
        FROM
            armaduras a
            LEFT JOIN armaduras_propiedades ON a.id = armaduras_propiedades.armadura_id
            LEFT JOIN propiedades ON armaduras_propiedades.propiedad_id = propiedades.id AND propiedades.deleted_at is null

					  LEFT JOIN armaduras_lugares_cuerpo ON a.id = armaduras_lugares_cuerpo.armadura_id
            LEFT JOIN lugares_cuerpo ON armaduras_lugares_cuerpo.lugar_id = lugares_cuerpo.id AND armaduras_lugares_cuerpo.deleted_at is null
            LEFT JOIN tipos_objetos tobj ON tobj.id = a.tipo_id AND tobj.deleted_at is null
        WHERE
            a.deleted_at IS NULL
        GROUP BY id, nombre, tipo, proteccion, estorbo, precio";

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
            $armadura = Armadura::with("propiedades", "lugaresCuerpo")->findOrFail($id);

            return $armadura;
        } catch (\Throwable $th) {
            dd($th);
            return "Error al obtener los datos del armadura";
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo("crear-personajes")) {
            $count = Armadura::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            $armadura = new Armadura();
            $armadura->nombre = $request->nombre;
            $armadura->tipo_id = $request->tipo;
            $armadura->proteccion = $request->proteccion;
            $armadura->estorbo = $request->estorbo;
            $armadura->precio = $request->precio;
            $armadura->descripcion = $request->descripcion;

            $ok = $armadura->save();

            if ($ok) {
                if ($request->propiedades) {
                    $armadura->propiedades()->sync($request->propiedades);
                }

                if ($request->lugares) {
                    $armadura->lugaresCuerpo()->sync($request->lugares);
                }

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

            try {
                $armadura = Armadura::findOrFail($id);

                $armadura->nombre = $request->nombre;
                $armadura->tipo_id = $request->tipo;
                $armadura->proteccion = $request->proteccion;
                $armadura->estorbo = $request->estorbo;
                $armadura->precio = $request->precio;
                $armadura->descripcion = $request->descripcion;

                $ok = $armadura->save();


                if ($ok) {
                    $armadura->propiedades()->sync($request->propiedades);

                    $armadura->lugaresCuerpo()->sync($request->lugares);

                    return Response::json([
                        "status" => true,
                        "mensaje" => "armadura editada con éxito..."
                    ]);
                }
            } catch (\Throwable $th) {
                dd($th);
                return Response::json([
                    "status" => false,
                    "mensaje" => "Error al actualizar el armadura."
                ]);
            }
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
