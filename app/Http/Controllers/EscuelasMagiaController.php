<?php

namespace App\Http\Controllers;

use App\Models\EscuelaMagia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;

class EscuelasMagiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = view("sinpermisos.sinpermisos");

        if (Auth::user()->isAbleTo("acceso-escuelas-magia")) {
            $view = view('configuraciones.escualasmagia.index')->render();
        }

        return $view;
    }

    /**
     * Obtiene los datos de todas Lugares de cuerpo para una Datatble
     */
    public function getDataTable()
    {
        if (Auth::user()->isAbleTo("acceso-escuelas-magia")) {

            $sql = "SELECT id, nombre FROM escuelas_magias WHERE deleted_at IS NULL";
            $datos = DB::select($sql);

            return DataTables::of($datos)
                ->addColumn('action', function ($data) {
                    $botones = "<center>";
                    $botones .= '<button class="btn btn-info btn-sm mr-2 editar" onclick="abrirModal(' . $data->id . ')"><i class="fas fa-edit"></i></button>';
                    $botones .= '<button class="btn btn-danger btn-sm eliminar" onclick="deleteEscuelaMagia(' . $data->id . ')"><i class="fas fa-trash"></i></button>';
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
            $escuela = EscuelaMagia::findOrFail($id);

            return $escuela;
        } catch (\Throwable $th) {

            return "Error al obtener los datos de la escuela de magia";
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo("crear-escuelas-magia")) {
            $count = EscuelaMagia::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            $escuela = new EscuelaMagia();

            $escuela->nombre = $request->nombre;

            $ok = $escuela->save();

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
        if (Auth::user()->isAbleTo("editar-escuelas-magia")) {

            $count = EscuelaMagia::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->where("id", "!=", $id)->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            try {
                $escuela = EscuelaMagia::findOrFail($id);

                $escuela->nombre = $request->nombre;

                $ok = $escuela->save();

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
        if (Auth::user()->isAbleTo("borrar-escuelas-magia")) {

            try {
                $escuela = EscuelaMagia::findOrFail($request->id);

                $escuela->delete();

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
