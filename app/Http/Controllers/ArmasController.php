<?php

namespace App\Http\Controllers;

use App\Models\Arma;
use App\Models\Propiedad;
use App\Models\Propiedades;
use App\Models\TipoObjeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;

class ArmasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = view("sinpermisos.sinpermisos");

        if (Auth::user()->isAbleTo("acceso-armas")) {
            $propiedades = Propiedad::all();
            $tipos = TipoObjeto::all();
            $view = view('principales.armas.index')
                ->with("propiedades", $propiedades)
                ->with("tipos", $tipos)->render();
        }

        return $view;
    }

    /**
     * Obtiene los datos de todas Arma de objetos para una Datatble
     */
    public function getDataTable()
    {
        if (Auth::user()->isAbleTo("acceso-armas")) {

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
            $arma = Arma::with("propiedades")->findOrFail($id);

            return $arma;
        } catch (\Throwable $th) {

            return "Error al obtener los datos del arma";
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo("crear-armas")) {
            $count = Arma::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            $arma = new Arma();
            $arma->nombre = $request->nombre;
            $arma->tipo_id = $request->tipo;
            $arma->danio = $request->danio;
            $arma->estorbo = $request->estorbo;
            $arma->alcance_min = $request->alcance_min;
            $arma->alcance_max = $request->alcance_max;
            $arma->precio = $request->precio;
            $arma->descripcion = $request->descripcion;

            $ok = $arma->save();

            if ($ok) {
                if($request->propiedades){
                    $arma->propiedades()->sync($request->propiedades);
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
        if (Auth::user()->isAbleTo("editar-armas")) {

            $count = Arma::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->where("id", "!=", $id)->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            try {
                $arma = Arma::findOrFail($id);

                $arma->nombre = $request->nombre;
                $arma->tipo_id = $request->tipo;
                $arma->danio = $request->danio;
                $arma->estorbo = $request->estorbo;
                $arma->alcance_min = $request->alcance_min;
                $arma->alcance_max = $request->alcance_max;
                $arma->precio = $request->precio;
                $arma->descripcion = $request->descripcion;

                $ok = $arma->save();


                if ($ok) {
                    if($request->propiedades){
                        $arma->propiedades()->sync($request->propiedades);
                    }
                    return Response::json([
                        "status" => true,
                        "mensaje" => "arma de Objeto editado con éxito..."
                    ]);
                }
            } catch (\Throwable $th) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Error al actualizar el arma de objeto."
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
        if (Auth::user()->isAbleTo("borrar-armas")) {

            try {
                $arma = Arma::findOrFail($request->id);

                $arma->delete();

                return Response::json([
                    "status" => true,
                    "mensaje" => "arma de objeto eliminado con éxito."
                ]);
            } catch (\Throwable $th) {
                return Response::json([
                    "status" => true,
                    "mensaje" => "Error al obtener los datos del arma"
                ]);
            }
        }

        return Response::json([
            "status" => false,
            "mensaje" => "No tienes permisos para realizar esta acción",
        ]);
    }
}
