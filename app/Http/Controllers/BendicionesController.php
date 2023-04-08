<?php

namespace App\Http\Controllers;

use App\Models\Bendicion;
use App\Models\Dios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;

class BendicionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = view("sinpermisos.sinpermisos");

        if (Auth::user()->isAbleTo("acceso-bendiciones")) {
            $dioses = Dios::all();
            $view = view('principales.bendiciones.index')
                ->with("dioses", $dioses)
                ->render();
        }

        return $view;
    }

    /**
     * Obtiene los datos de todas Arma para una Datatble
     */
    public function getDataTable()
    {
        if (Auth::user()->isAbleTo("acceso-bendiciones")) {

            $sql = "SELECT
            b.id,
            b.nombre AS nombre,
            GROUP_CONCAT( d.nombre SEPARATOR ', ' ) AS alineaciones,
            b.dificultad,
            b.objetivo,
            b.duracion
        FROM
            bendiciones b
            LEFT JOIN bendiciones_dioses bd ON b.id = bd.bendicion_id
            LEFT JOIN dioses d ON d.id = bd.dios_id
        GROUP BY id, b.nombre, duracion, dificultad,objetivo";

            $datos = DB::select($sql);

            return DataTables::of($datos)
                ->addColumn('action', function ($data) {
                    $botones = "<center>";
                    $botones .= '<button class="btn btn-info btn-sm mr-2 editar" onclick="abrirModal(' . $data->id . ')"><i class="fas fa-edit"></i></button>';
                    $botones .= '<button class="btn btn-danger btn-sm eliminar" onclick="deleteMagia(' . $data->id . ')"><i class="fas fa-trash"></i></button>';
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
        if (Auth::user()->isAbleTo("acceso-bendiciones")) {

            try {
                $bendicion = Bendicion::with("alineaciones")->findOrFail($id);

                return $bendicion;
            } catch (\Throwable $th) {

                return "Error al obtener los datos del arma";
            }
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo("crear-bendiciones")) {
            $count = Bendicion::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            $bendicion = new Bendicion();
            $bendicion->nombre = $request->nombre;
            $bendicion->dificultad = $request->dificultad;
            $bendicion->objetivo = $request->objetivo;
            $bendicion->coste = $request->coste;
            $bendicion->duracion = $request->duracion;
            $bendicion->descripcion = $request->descripcion;
            $bendicion->critico = $request->critico;


            $ok = $bendicion->save();

            if ($ok) {
                if ($request->alineaciones) {
                    $bendicion->alineaciones()->sync($request->alineaciones);
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
        if (Auth::user()->isAbleTo("editar-bendiciones")) {

            $count = Bendicion::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->where("id", "!=", $id)->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            try {
                $bendicion = Bendicion::findOrFail($id);

                $bendicion->nombre = $request->nombre;
                $bendicion->dificultad = $request->dificultad;
                $bendicion->objetivo = $request->objetivo;
                $bendicion->coste = $request->coste;
                $bendicion->duracion = $request->duracion;
                $bendicion->descripcion = $request->descripcion;
                $bendicion->critico = $request->critico;

                $ok = $bendicion->save();


                if ($ok) {
                    $bendicion->alineaciones()->sync($request->alineaciones);
                    return Response::json([
                        "status" => true,
                        "mensaje" => "magia editada con éxito..."
                    ]);
                }
            } catch (\Throwable $th) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Error al actualizar el magia."
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
        if (Auth::user()->isAbleTo("borrar-bendiciones")) {

            try {
                $magia = Magia::findOrFail($request->id);

                $magia->delete();

                return Response::json([
                    "status" => true,
                    "mensaje" => "magia eliminada con éxito."
                ]);
            } catch (\Throwable $th) {
                return Response::json([
                    "status" => true,
                    "mensaje" => "Error al obtener los datos del magia"
                ]);
            }
        }

        return Response::json([
            "status" => false,
            "mensaje" => "No tienes permisos para realizar esta acción",
        ]);
    }
}
