<?php

namespace App\Http\Controllers;

use App\Models\Ascendencia;
use App\Models\Talento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;

class AscendenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = view("sinpermisos.sinpermisos");

        if (Auth::user()->isAbleTo("acceso-ascendencias")) {

            $talentos = Talento::all();
            $view = view('configuraciones.ascendencias.index')
                ->with("talentos", $talentos)
                ->render();
        }

        return $view;
    }

    /**
     * Obtiene los datos de todos las ascendencias para una Datatble
     */
    public function getDataTable()
    {
        if (Auth::user()->isAbleTo("acceso-ascendencias")) {

            $sql = 'SELECT
                        a.id,
                        a.nombre,
                        talentos.nombre as dominante,
                        b.nombre as secundaria
                    FROM
                        ascendencias a
                        LEFT JOIN talentos on talentos.id = dominante_id
                        LEFT JOIN talentos b on b.id = secundaria_id
                    WHERE
                    a.deleted_at IS NULL';
            $datos = DB::select($sql);

            return DataTables::of($datos)
                ->addColumn('action', function ($data) {
                    $botones = "<center>";
                    $botones .= '<button class="btn btn-info btn-sm mr-2 editar" onclick="abrirModal(' . $data->id . ')"><i class="fas fa-edit"></i></button>';
                    $botones .= '<button class="btn btn-danger btn-sm eliminar" onclick="deleteAscendencia(' . $data->id . ')"><i class="fas fa-trash"></i></button>';
                    $botones .= "</center>";
                    return $botones;
                })
                ->rawColumns(['action'])
                ->make(true);
        } else {
        }
    }

    public function getData(Ascendencia $ascendencia)
    {
        if (Auth::user()->isAbleTo("acceso-ascendencias")) {

            return $ascendencia;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo("crear-ascendencias")) {
            $count = Ascendencia::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }
            $ascendencia = new Ascendencia();

            $ascendencia->nombre = $request->nombre;
            $ascendencia->descripcion = $request->descripcion;
            $ascendencia->dominante_id = $request->dominante_id;
            $ascendencia->secundaria_id = $request->secundaria_id;

            $ok = $ascendencia->save();

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
        if (Auth::user()->isAbleTo("editar-ascendencias")) {
            $count = Ascendencia::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->where("id", "!=", $id)->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            try {
                $ascendencia = Ascendencia::findOrFail($id);

                $ascendencia->nombre = $request->nombre;
                $ascendencia->descripcion = $request->descripcion;
                $ascendencia->dominante_id = $request->dominante_id;
                $ascendencia->secundaria_id = $request->secundaria_id;

                $ok = $ascendencia->save();

                $ok = $ascendencia->save();

                if ($ok) {
                    return Response::json([
                        "status" => true,
                        "mensaje" => "Ascendencia editada con éxito..."
                    ]);
                }
            } catch (\Throwable $th) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Error al actualizar el Ascendencia."
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
        if (Auth::user()->isAbleTo("borrar-ascendencias")) {

            try {
                $ascendencia = Ascendencia::findOrFail($request->id);

                $ascendencia->delete();

                return Response::json([
                    "status" => true,
                    "mensaje" => "Ascendencia eliminada con éxito."
                ]);
            } catch (\Throwable $th) {
                return Response::json([
                    "status" => true,
                    "mensaje" => "Error al obtener los datos del Ascendencia"
                ]);
            }
        }

        return Response::json([
            "status" => false,
            "mensaje" => "No tienes permisos para realizar esta acción",
        ]);
    }
}
