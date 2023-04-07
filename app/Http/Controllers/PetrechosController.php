<?php

namespace App\Http\Controllers;

use App\Models\Petrecho;
use App\Models\Propiedad;
use App\Models\TipoObjeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;

class PetrechosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = view("sinpermisos.sinpermisos");

        if (Auth::user()->isAbleTo("acceso-petrechos")) {
            $propiedades = Propiedad::all();
            $tipos = TipoObjeto::where("petrecho", 1)->whereNull("deleted_at")->get();
            $view = view('principales.petrechos.index')
                ->with("propiedades", $propiedades)
                ->with("tipos", $tipos)->render();
        }

        return $view;
    }

    /**
     * Obtiene los datos de todos los Petrechos para una Datatble
     */
    public function getDataTable()
    {
        if (Auth::user()->isAbleTo("acceso-petrechos")) {

            $sql = "SELECT
            p.id AS id,
            p.nombre AS nombre,
            tobj.nombre as tipo,
            p.danio AS danio,
            p.estorbo AS estorbo,
            p.alcance_max as alcance_max,
            p.alcance_min as alcance_min,
            GROUP_CONCAT( propiedades.nombre SEPARATOR ', ' ) AS propiedades
        FROM
            petrechos p
            LEFT JOIN petrechos_propiedades ON p.id = petrechos_propiedades.petrecho_id
            LEFT JOIN propiedades ON petrechos_propiedades.propiedad_id = propiedades.id AND propiedades.deleted_at is null
            LEFT JOIN tipos_objetos tobj ON tobj.id = p.tipo_id AND tobj.deleted_at is null
        WHERE
            p.deleted_at IS NULL
        GROUP BY id, nombre, tipo, danio, estorbo, alcance_max, alcance_min";

            $datos = DB::select($sql);

            return DataTables::of($datos)
                ->addColumn('action', function ($data) {
                    $botones = "<center>";
                    $botones .= '<button class="btn btn-info btn-sm mr-2 editar" onclick="abrirModal(' . $data->id . ')"><i class="fas fa-edit"></i></button>';
                    $botones .= '<button class="btn btn-danger btn-sm eliminar" onclick="deletePetrecho(' . $data->id . ')"><i class="fas fa-trash"></i></button>';
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
            $petrecho = Petrecho::with("propiedades")->findOrFail($id);
            return $petrecho;
        } catch (\Throwable $th) {

            return "Error al obtener los datos del petrecho";
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo("crear-petrechos")) {
            $count = Petrecho::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            $petrecho = new Petrecho();
            $petrecho->nombre = $request->nombre;
            $petrecho->tipo_id = $request->tipo;
            $petrecho->danio = $request->danio;
            $petrecho->estorbo = $request->estorbo;
            $petrecho->alcance_min = $request->alcance_min;
            $petrecho->alcance_max = $request->alcance_max;
            $petrecho->precio = $request->precio;
            $petrecho->descripcion = $request->descripcion;

            $ok = $petrecho->save();

            if ($ok) {
                if($request->propiedades){
                    $petrecho->propiedades()->sync($request->propiedades);
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
        if (Auth::user()->isAbleTo("editar-petrechos")) {

            $count = Petrecho::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->where("id", "!=", $id)->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            try {
                $petrecho = Petrecho::findOrFail($id);
                $petrecho->nombre = $request->nombre;
                $petrecho->tipo_id = $request->tipo;
                $petrecho->danio = $request->danio;
                $petrecho->estorbo = $request->estorbo;
                $petrecho->alcance_min = $request->alcance_min;
                $petrecho->alcance_max = $request->alcance_max;
                $petrecho->precio = $request->precio;
                $petrecho->descripcion = $request->descripcion;

                $ok = $petrecho->save();


                if ($ok) {

                    $petrecho->propiedades()->sync($request->propiedades);

                    return Response::json([
                        "status" => true,
                        "mensaje" => "Petrecho editado con éxito..."
                    ]);
                }
            } catch (\Throwable $th) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Error al actualizar el petrecho."
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
        if (Auth::user()->isAbleTo("borrar-petrechos")) {

            try {
                $petrecho = Petrecho::findOrFail($request->id);

                $petrecho->delete();

                return Response::json([
                    "status" => true,
                    "mensaje" => "Petrecho eliminado con éxito."
                ]);
            } catch (\Throwable $th) {
                return Response::json([
                    "status" => true,
                    "mensaje" => "Error al obtener los datos del petrecho"
                ]);
            }
        }

        return Response::json([
            "status" => false,
            "mensaje" => "No tienes permisos para realizar esta acción",
        ]);
    }
}
