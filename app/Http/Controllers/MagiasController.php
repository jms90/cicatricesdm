<?php

namespace App\Http\Controllers;


use App\Models\EscuelaMagia;
use App\Models\Magia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;

class MagiasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = view("sinpermisos.sinpermisos");

        if (Auth::user()->isAbleTo("acceso-magias")) {
            $escuelas = EscuelaMagia::all();
            $view = view('principales.magias.index')
                ->with("escuelas", $escuelas)
                ->render();
        }

        return $view;
    }

    /**
     * Obtiene los datos de todas Arma para una Datatble
     */
    public function getDataTable()
    {
        if (Auth::user()->isAbleTo("acceso-magias")) {

            $sql = "SELECT
                    m.id AS id,
                    m.nombre AS nombre,
                    e.nombre as escuela,
                    m.nivel AS nivel,
                    m.objetivo AS objetivo,
                    m.coste as coste,
                    m.duracion as duracion
                FROM
                    magias m
                    LEFT JOIN escuelas_magias e ON e.id = m.escuela_id AND e.deleted_at is null
                WHERE
                    m.deleted_at IS NULL";

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

        try {
            $magia = Magia::findOrFail($id);

            return $magia;
        } catch (\Throwable $th) {

            return "Error al obtener los datos del magia";
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo("crear-magias")) {
            $count = Magia::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            $magia = new Magia();
            $magia->nombre = $request->nombre;
            $magia->escuela_id = $request->escuela;
            $magia->nivel = $request->nivel;
            $magia->objetivo = $request->objetivo;
            $magia->coste = $request->coste;
            $magia->duracion = $request->duracion;
            $magia->requisitos = $request->requisitos;
            $magia->descripcion = $request->descripcion;
            $magia->critico = $request->critico;


            $ok = $magia->save();

            if ($ok) {
                if ($request->propiedades) {
                    $magia->propiedades()->sync($request->propiedades);
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
        if (Auth::user()->isAbleTo("editar-magias")) {

            $count = Magia::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->where("id", "!=", $id)->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            try {
                $magia = Magia::findOrFail($id);

                $magia->nombre = $request->nombre;
                $magia->escuela_id = $request->escuela;
                $magia->nivel = $request->nivel;
                $magia->objetivo = $request->objetivo;
                $magia->coste = $request->coste;
                $magia->duracion = $request->duracion;
                $magia->requisitos = $request->requisitos;
                $magia->descripcion = $request->descripcion;
                $magia->critico = $request->critico;

                $ok = $magia->save();


                if ($ok) {

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
        if (Auth::user()->isAbleTo("borrar-magias")) {

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
