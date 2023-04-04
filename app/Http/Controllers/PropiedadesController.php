<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;

class PropiedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = view("sinpermisos.sinpermisos");

        if (Auth::user()->isAbleTo("acceso-propiedad-objetos")) {
            $view = view('configuraciones.propiedadesobjetos.index')->render();
        }

        return $view;
    }

    /**
     * Obtiene los datos de todas propiedades de objetos para una Datatble
     */
    public function getDataTable()
    {
        if (Auth::user()->isAbleTo("acceso-propiedad-objetos")) {

            $sql = "SELECT id, nombre,descripcion, concat('+ ', bonificador, '/ - ', penalizador) as bonificadorPenalizador FROM propiedades WHERE deleted_at IS NULL";
            $datos = DB::select($sql);

            return DataTables::of($datos)
                ->addColumn('action', function ($data) {
                    $botones = "<center>";
                    $botones .= '<button class="btn btn-info btn-sm mr-2 editar" onclick="abrirModal(' . $data->id . ')"><i class="fas fa-edit"></i></button>';
                    $botones .= '<button class="btn btn-danger btn-sm eliminar" onclick="deletePropiedad(' . $data->id . ')"><i class="fas fa-trash"></i></button>';
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
            $propiedad = Propiedades::findOrFail($id);

            return $propiedad;
        } catch (\Throwable $th) {

            return "Error al obtener los datos del propiedad";
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo("crear-propiedad-objetos")) {
            $count = Propiedad::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            $propiedad = new Propiedad();

            $propiedad->nombre = $request->nombre;
            $propiedad->descripcion = $request->descripcion;
            $propiedad->bonificador = $request->bonificador;
            $propiedad->penalizador = $request->penalizador;

            $ok = $propiedad->save();

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
        if (Auth::user()->isAbleTo("editar-propiedad-objetos")) {

            $count = Propiedad::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->where("id", "!=", $id)->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            try {
                $propiedad = Propiedad::findOrFail($id);

                $propiedad->nombre = $request->nombre;
                $propiedad->descripcion = $request->descripcion;
                $propiedad->bonificador = $request->bonificador;
                $propiedad->penalizador = $request->penalizador;


                $ok = $propiedad->save();

                if ($ok) {
                    return Response::json([
                        "status" => true,
                        "mensaje" => "propiedad de Objeto editado con éxito..."
                    ]);
                }
            } catch (\Throwable $th) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Error al actualizar el propiedad de objeto."
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
        if (Auth::user()->isAbleTo("borrar-propiedad-objetos")) {

            try {
                $propiedad = Propiedad::findOrFail($request->id);

                $propiedad->delete();

                return Response::json([
                    "status" => true,
                    "mensaje" => "Propiedad de objeto eliminado con éxito."
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
