<?php

namespace App\Http\Controllers;

use App\Models\Atributo;
use App\Models\AtributoClase;
use App\Models\Clase;
use App\Models\Talento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;

class ClasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = view("sinpermisos.sinpermisos");

        if (Auth::user()->isAbleTo("acceso-clases")) {
            $atributos = Atributo::all();
            $talentos = Talento::all();
            $view = view('principales.clases.index')
                ->with("talentos", $talentos)
                ->with("atributos", $atributos)->render();
        }

        return $view;
    }

    /**
     * Obtiene los datos de todas Clases para una Datatble
     */
    public function getDataTable()
    {
        if (Auth::user()->isAbleTo("acceso-clases")) {

            $sql = "SELECT
            a.id AS id,
            a.nombre AS nombre,
            tobj.nombre as tipo,
            a.danio AS danio,
            a.estorbo AS estorbo,
            a.alcance_max as alcance_max,
            a.alcance_min as alcance_min,
            GROUP_CONCAT( propiedades.nombre SEPARATOR ', ' ) AS propiedades
        FROM
            armas a
            LEFT JOIN armas_propiedades ON a.id = armas_propiedades.arma_id
            LEFT JOIN propiedades ON armas_propiedades.propiedad_id = propiedades.id AND propiedades.deleted_at is null
            LEFT JOIN tipos_objetos tobj ON tobj.id = a.tipo_id AND tobj.deleted_at is null
        WHERE
            a.deleted_at IS NULL
        GROUP BY id, nombre, tipo, danio, estorbo, alcance_max, alcance_min";

            $datos = DB::select($sql);

            return DataTables::of($datos)
                ->addColumn('action', function ($data) {
                    $botones = "<center>";
                    $botones .= '<button class="btn btn-info btn-sm mr-2 editar" onclick="abrirModal(' . $data->id . ')"><i class="fas fa-edit"></i></button>';
                    $botones .= '<button class="btn btn-danger btn-sm eliminar" onclick="deleteArma(' . $data->id . ')"><i class="fas fa-trash"></i></button>';
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
            $clase = Clase::with("propiedades")->findOrFail($id);

            return $clase;
        } catch (\Throwable $th) {

            return "Error al obtener los datos de la clase";
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo("crear-clases")) {
            $count = Clase::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            $clase = new Clase();
            $clase->nombre = $request->nombre;
            $clase->talento_id = $request->talento_id;
            $clase->descripcion = $request->descripcion;

            $ok = $clase->save();

            if ($ok) {
                if ($request->atributos) {
                    foreach ($request->atributos as $atributo_id => $niveles) {
                        foreach ($niveles as $nivel => $cantidad) {

                            // Crear el registro en la tabla intermedia
                            $atributo_clase = new AtributoClase([
                                'atributo_id' => $atributo_id,
                                'clase_id' => $clase->id,
                                'nivel' => $nivel,
                                'cantidad_nivel' => $cantidad
                            ]);
                            $atributo_clase->save();
                        }
                    }
                }


                if ($request->equipoInicial) {
                    $clase->equipoInicial()->sync($request->equipoInicial);
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
        if (Auth::user()->isAbleTo("editar-clases")) {

            $count = Clase::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->where("id", "!=", $id)->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            try {
                $clase = Clase::findOrFail($id);

                $clase->nombre = $request->nombre;
                $clase->talento_id = $request->talento_id;
                $clase->descripcion = $request->descripcion;

                $ok = $clase->save();

                if ($ok) {

                    $clase->atributos()->sync($request->atributos);
                    $clase->equipoInicial()->sync($request->equipoInicial);

                    return Response::json([
                        "status" => true,
                        "mensaje" => "clase editada con éxito..."
                    ]);
                }
            } catch (\Throwable $th) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Error al actualizar el clase."
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
        if (Auth::user()->isAbleTo("borrar-clases")) {

            try {
                $clase = Clase::findOrFail($request->id);

                $clase->delete();

                return Response::json([
                    "status" => true,
                    "mensaje" => "clase eliminada con éxito."
                ]);
            } catch (\Throwable $th) {
                return Response::json([
                    "status" => true,
                    "mensaje" => "Error al obtener los datos del clase"
                ]);
            }
        }

        return Response::json([
            "status" => false,
            "mensaje" => "No tienes permisos para realizar esta acción",
        ]);
    }
}
