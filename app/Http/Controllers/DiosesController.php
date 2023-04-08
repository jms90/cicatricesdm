<?php

namespace App\Http\Controllers;

use App\Models\Dios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;

class DiosesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = view("sinpermisos.sinpermisos");

        if (Auth::user()->isAbleTo("acceso-dioses")) {
            $view = view('configuraciones.dioses.index')->render();
        }

        return $view;
    }

    /**
     * Obtiene los datos de todos los dioses para una Datatble
     */
    public function getDataTable()
    {
        if (Auth::user()->isAbleTo("acceso-dioses")) {

            $sql = 'SELECT
                        id,
                        nombre
                    FROM
                        dioses
                    WHERE
                        deleted_at IS NULL';
            $datos = DB::select($sql);

            return DataTables::of($datos)
                ->addColumn('action', function ($data) {
                    $botones = "<center>";
                    $botones .= '<button class="btn btn-info btn-sm mr-2 editar" onclick="abrirModal(' . $data->id . ')"><i class="fas fa-edit"></i></button>';
                    $botones .= '<button class="btn btn-danger btn-sm eliminar" onclick="deleteDios(' . $data->id . ')"><i class="fas fa-trash"></i></button>';
                    $botones .= "</center>";
                    return $botones;
                })
                ->rawColumns(['action'])
                ->make(true);
        } else {
        }
    }

    public function getData(Dios $dios)
    {
        if (Auth::user()->isAbleTo("acceso-dioses")) {

            return $dios;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo("crear-dioses")) {
            $count = Dios::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }
            $dios = new Dios();

            $dios->nombre = $request->nombre;
            $dios->descripcion = $request->descripcion;

            $ok = $dios->save();

            if ($ok) {
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
        if (Auth::user()->isAbleTo("editar-dioses")) {
            $count = Dios::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->where("id", "!=", $id)->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            try {
                $dios = Dios::findOrFail($id);

                $dios->nombre = $request->nombre;
                $dios->descripcion = $request->descripcion;

                $ok = $dios->save();

                if ($ok) {
                    return Response::json([
                        "status" => true,
                        "mensaje" => "Dios editado con éxito..."
                    ]);
                }
            } catch (\Throwable $th) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Error al actualizar el Dios."
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
        if (Auth::user()->isAbleTo("borrar-dioses")) {

            try {
                $tipo = Dios::findOrFail($request->id);

                $tipo->delete();

                return Response::json([
                    "status" => true,
                    "mensaje" => "Dios eliminado con éxito."
                ]);
            } catch (\Throwable $th) {
                return Response::json([
                    "status" => true,
                    "mensaje" => "Error al obtener los datos del dios"
                ]);
            }
        }

        return Response::json([
            "status" => false,
            "mensaje" => "No tienes permisos para realizar esta acción",
        ]);
    }
}
