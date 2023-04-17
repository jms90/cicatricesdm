<?php

namespace App\Http\Controllers;

use App\Models\Atributo;
use App\Models\AtributoClase;
use App\Models\Clase;
use App\Models\Petrecho;
use App\Models\Talento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;

class ClasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = view("sinpermisos.sinpermisos");

        if (Auth::user()->isAbleTo("acceso-clases")) {
            $atributos = Atributo::all();
            $talentos = Talento::all();
            $petrechos = Petrecho::all();
            $view = view('principales.clases.index')
                ->with("talentos", $talentos)
                ->with("petrechos", $petrechos)
                ->with("atributos", $atributos)->render();
        }

        return $view;
    }

    /**
     * Obtiene los datos de todas Clases para una Datatble
     */
    public function getDataTable()
    {
        if (Auth::user()->isAbleTo("acceso-clases")) {

            $sql = "SELECT
                id,
                nombre
                FROM
                    clases
                WHERE
                    deleted_at IS NULL";

            $datos = DB::select($sql);

            return DataTables::of($datos)
                ->addColumn('action', function ($data) {
                    $botones = "<center>";
                    $botones .= '<button class="btn btn-info btn-sm mr-2 editar" onclick="abrirModal(' . $data->id . ')"><i class="fas fa-edit"></i></button>';
                    $botones .= '<button class="btn btn-danger btn-sm eliminar" onclick="deleteClase(' . $data->id . ')"><i class="fas fa-trash"></i></button>';
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
            $clase = Clase::findOrFail($id);
            $atributos = AtributoClase::where("clase_id", $clase->id)->get();
            $clase->atributos = $atributos;
            $equipoInicial = $clase->equipoInicial()->get();
            $clase->equipoInicial = $equipoInicial;
            return $clase;
        } catch (\Throwable $th) {
            return "Error al obtener los datos de la clase";
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo("crear-clases")) {
            $count = Clase::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            $clase = new Clase();
            $clase->nombre = $request->nombre;
            $clase->talento_id = $request->talento_id;
            $clase->descripcion = $request->descripcion;

            $ok = $clase->save();

            if ($ok) {
                if ($request->atributos) {
                    foreach ($request->atributos as $atributo_id => $niveles) {
                        foreach ($niveles as $nivel => $cantidad) {

                            // Crear el registro en la tabla intermedia
                            $atributo_clase = new AtributoClase([
                                'atributo_id' => $atributo_id,
                                'clase_id' => $clase->id,
                                'nivel' => $nivel,
                                'cantidad_nivel' => $cantidad
                            ]);
                            $atributo_clase->save();
                        }
                    }
                }


                if ($request->objetos) {
                    $sync_data = [];
                    foreach ($request->objetos as $objeto) {
                        $sync_data[$objeto['equipoId']] = [
                            'cantidad' => $objeto['cantidad'],
                            'descripcion' => $objeto['descripcion'],
                        ];
                    }

                    $clase->equipoInicial()->sync($sync_data);
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
        if (Auth::user()->isAbleTo("editar-clases")) {

            $count = Clase::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->where("id", "!=", $id)->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            try {
                $clase = Clase::findOrFail($id);

                $clase->nombre = $request->nombre;
                $clase->talento_id = $request->talento_id;
                $clase->descripcion = $request->descripcion;

                $ok = $clase->save();

                if ($ok) {


                    foreach ($request->atributos as $atributo_id => $niveles) {
                        foreach ($niveles as $nivel => $cantidad) {
                            $atributo_clase = AtributoClase::where('atributo_id', $atributo_id)
                                ->where('clase_id', $clase->id)
                                ->where('nivel', $nivel)
                                ->first();

                            if ($atributo_clase) {
                                $atributo_clase->cantidad_nivel = $cantidad;
                                $atributo_clase->save();
                            } else {
                                $atributo_clase = new AtributoClase([
                                    'atributo_id' => $atributo_id,
                                    'clase_id' => $clase->id,
                                    'nivel' => $nivel,
                                    'cantidad_nivel' => $cantidad
                                ]);
                                $atributo_clase->save();
                            }
                        }
                    }

                    if ($request->objetos) {
                        $sync_data = [];
                        foreach ($request->objetos as $objeto) {
                            $sync_data[$objeto['equipoId']] = [
                                'cantidad' => $objeto['cantidad'],
                                'descripcion' => $objeto['descripcion'],
                            ];
                        }

                        $clase->equipoInicial()->sync($sync_data);
                    }
                    return Response::json([
                        "status" => true,
                        "mensaje" => "clase editada con éxito..."
                    ]);
                }
            } catch (\Throwable $th) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Error al actualizar el clase."
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
        if (Auth::user()->isAbleTo("borrar-clases")) {

            try {
                $clase = Clase::findOrFail($request->id);

                $clase->delete();

                return Response::json([
                    "status" => true,
                    "mensaje" => "clase eliminada con éxito."
                ]);
            } catch (\Throwable $th) {
                return Response::json([
                    "status" => true,
                    "mensaje" => "Error al obtener los datos del clase"
                ]);
            }
        }

        return Response::json([
            "status" => false,
            "mensaje" => "No tienes permisos para realizar esta acción",
        ]);
    }
}
