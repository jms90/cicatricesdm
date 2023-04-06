<?php

namespace App\Http\Controllers;

use App\Models\LugarCuerpo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;

class LugaresCuerpoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = view("sinpermisos.sinpermisos");

        if (Auth::user()->isAbleTo("acceso-lugares-cuerpo")) {
            $view = view('configuraciones.lugarescuerpo.index')->render();
        }

        return $view;
    }

    /**
     * Obtiene los datos de todas Lugares de cuerpo para una Datatble
     */
    public function getDataTable()
    {
        if (Auth::user()->isAbleTo("acceso-lugares-cuerpo")) {

            $sql = "SELECT id, nombre FROM lugares_cuerpo WHERE deleted_at IS NULL";
            $datos = DB::select($sql);

            return DataTables::of($datos)
                ->addColumn('action', function ($data) {
                    $botones = "<center>";
                    $botones .= '<button class="btn btn-info btn-sm mr-2 editar" onclick="abrirModal(' . $data->id . ')"><i class="fas fa-edit"></i></button>';
                    $botones .= '<button class="btn btn-danger btn-sm eliminar" onclick="deleteLugar(' . $data->id . ')"><i class="fas fa-trash"></i></button>';
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
            $lugar = LugarCuerpo::findOrFail($id);

            return $lugar;
        } catch (\Throwable $th) {

            return "Error al obtener los datos del propiedad";
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo("crear-lugares-cuerpo")) {
            $count = LugarCuerpo::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            $lugar = new LugarCuerpo();

            $lugar->nombre = $request->nombre;

            $ok = $lugar->save();

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
        if (Auth::user()->isAbleTo("editar-lugares-cuerpo")) {

            $count = LugarCuerpo::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->where("id", "!=", $id)->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            try {
                $lugar = LugarCuerpo::findOrFail($id);

                $lugar->nombre = $request->nombre;

                $ok = $lugar->save();

                if ($ok) {
                    return Response::json([
                        "status" => true,
                        "mensaje" => "Lugar de cuerpo editado con éxito..."
                    ]);
                }
            } catch (\Throwable $th) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Error al actualizar el Lugar de cuerpo."
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
        if (Auth::user()->isAbleTo("borrar-lugares-cuerpo")) {

            try {
                $lugar = LugarCuerpo::findOrFail($request->id);

                $lugar->delete();

                return Response::json([
                    "status" => true,
                    "mensaje" => "Lugar de cuerpo eliminado con éxito."
                ]);
            } catch (\Throwable $th) {
                return Response::json([
                    "status" => true,
                    "mensaje" => "Error al obtener los datos del Propiedad"
                ]);
            }
        }

        return Response::json([
            "status" => false,
            "mensaje" => "No tienes permisos para realizar esta acción",
        ]);
    }
}
