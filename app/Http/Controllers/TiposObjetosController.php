<?php

namespace App\Http\Controllers;

use App\Models\TipoArma;
use App\Models\TipoObjeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;

class TiposObjetosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = view("sinpermisos.sinpermisos");

        if (Auth::user()->isAbleTo("acceso-tipo-objetos")) {
            $view = view('configuraciones.tiposobjetos.index')->render();
        }

        return $view;
    }

    /**
     * Obtiene los datos de todos los tipos de objete para una Datatble 
     */
    public function getData()
    {
        if (Auth::user()->isAbleTo("acceso-tipo-objetos")) {

            $sql = "SELECT id, nombre FROM tipos_objetos WHERE deleted_at IS NULL";
            $datos = DB::select($sql);

            return DataTables::of($datos)
                ->addColumn('action', function ($data) {
                    $botones = "<center>";
                    $botones .= '<button class="btn btn-info btn-sm mr-2 editar" onclick="abrirModal(' . $data->id . ')"><i class="fas fa-edit"></i></button>';
                    $botones .= '<button class="btn btn-danger btn-sm eliminar" onclick="deleteTipo(' . $data->id . ')"><i class="fas fa-trash"></i></button>';
                    $botones .= "</center>";
                    return $botones;
                })
                ->rawColumns(['action'])
                ->make(true);
        } else {
        }
    }

    public function getDataTipo($id)
    {

        try {
            $tipo = TipoObjeto::findOrFail($id);

            return $tipo;
        } catch (\Throwable $th) {

            return "Error al obtener los datos del tipo";
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo("crear-tipo-objetos")) {
            $count = TipoObjeto::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }
            $tipo = new TipoObjeto();

            $tipo->nombre = $request->nombre;

            $ok = $tipo->save();

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
    public function update(Request $request, TipoArma $tipoArma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        if (Auth::user()->isAbleTo("borrar-tipo-objetos")) {

            try {
                $tipo = TipoObjeto::findOrFail($request->id);

                $tipo->delete();

                return Response::json([
                    "status" => true,
                    "mensaje" => "Tipo de objeto eliminado con éxito."
                ]);

            } catch (\Throwable $th) {
                return Response::json([
                    "status" => true,
                    "mensaje" => "Error al obtener los datos del tipo"
                ]);
            }
        }

        return Response::json([
            "status" => false,
            "mensaje" => "No tienes permisos para realizar esta acción",
        ]);
    }
}
