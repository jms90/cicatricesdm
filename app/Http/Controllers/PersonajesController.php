<?php

namespace App\Http\Controllers;

use App\Models\Armadura;
use App\Models\Ascendencia;
use App\Models\AtributosFicha;
use App\Models\Clase;
use App\Models\Habilidad;
use App\Models\Personaje;
use App\Models\Talento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;

class PersonajesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = view("sinpermisos.sinpermisos");

        if (Auth::user()->isAbleTo("acceso-personajes")) {
            $view = view('principales.personajes.index')->render();
        }

        return $view;
    }


    public function edit($id){
        $view = view("sinpermisos.sinpermisos");

        if (Auth::user()->isAbleTo("editar-personajes")) {
            $users = User::all();
            $ascendencias = Ascendencia::all();
            $clases = Clase::all();
            $atributos = AtributosFicha::all();
            $talentos = Talento::all();
            $habilidades = Habilidad::all();
            try {
                $modelo = Personaje::findOrFail($id);
            } catch (\Throwable $th) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Error al obtener los datos del personaje"
                ]);
            }

            $view = view('principales.personajes.edit')
                ->with("users", $users)
                ->with("ascendencias", $ascendencias)
                ->with("clases", $clases)
                ->with("atributos", $atributos)
                ->with("talentos", $talentos)
                ->with("habilidades", $habilidades)
                ->with("modelo", $modelo)
                ->render();
        }

        return $view;
    }


    /**
     *
     * Create view
     */
    public function create()
    {
        $view = view("sinpermisos.sinpermisos");

        if (Auth::user()->isAbleTo("crear-personajes")) {
            $users = User::all();
            $ascendencias = Ascendencia::all();
            $clases = Clase::all();
            $atributos = AtributosFicha::all();
            $talentos = Talento::all();
            $habilidades = Habilidad::all();

            $view = view('principales.personajes.edit')
                ->with("users", $users)
                ->with("ascendencias", $ascendencias)
                ->with("clases", $clases)
                ->with("atributos", $atributos)
                ->with("talentos", $talentos)
                ->with("habilidades", $habilidades)
                ->with("modelo", null)
                ->render();
        }

        return $view;
    }

    /**
     * Obtiene los datos de todas Armaduras para una Datatble
     */
    public function getDataTable()
    {
        if (Auth::user()->isAbleTo("acceso-personajes")) {

            $sql = "SELECT
            p.id as id,
            p.nombre as nombre,
            u.name AS jugador,
            c.nombre AS clase
        FROM
            personajes p
            LEFT JOIN users u ON p.user_id = u.id
            LEFT JOIN clases c ON p.clase_id = c.id

        WHERE
            p.deleted_at IS NULL";

            $datos = DB::select($sql);

            return DataTables::of($datos)
                ->addColumn('action', function ($data) {
                    $botones = "<center>";
                    $botones .= '<button class="btn btn-info btn-sm mr-2 editar" onclick="abrirModal(' . $data->id . ')"><i class="fas fa-edit"></i></button>';
                    $botones .= '<button class="btn btn-danger btn-sm eliminar" onclick="deleteArmadura(' . $data->id . ')"><i class="fas fa-trash"></i></button>';
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
            $personaje = Personaje::findOrFail($id);

            return $personaje;
        } catch (\Throwable $th) {
            return "Error al obtener los datos del armadura";
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo("crear-personajes")) {
            $count = Armadura::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            $armadura = new Armadura();
            $armadura->nombre = $request->nombre;
            $armadura->tipo_id = $request->tipo;
            $armadura->proteccion = $request->proteccion;
            $armadura->estorbo = $request->estorbo;
            $armadura->precio = $request->precio;
            $armadura->descripcion = $request->descripcion;

            $ok = $armadura->save();

            if ($ok) {
                if ($request->propiedades) {
                    $armadura->propiedades()->sync($request->propiedades);
                }

                if ($request->lugares) {
                    $armadura->lugaresCuerpo()->sync($request->lugares);
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
        if (Auth::user()->isAbleTo("editar-personajes")) {

            $count = Armadura::where("nombre", "like", trim($request->nombre))->whereNull("deleted_at")->where("id", "!=", $id)->count();

            if ($count > 0) {
                return Response::json([
                    "status" => false,
                    "mensaje" => "Ya hay creado un registro con ese nombre..."

                ]);
            }

            try {
                $armadura = Armadura::findOrFail($id);

                $armadura->nombre = $request->nombre;
                $armadura->tipo_id = $request->tipo;
                $armadura->proteccion = $request->proteccion;
                $armadura->estorbo = $request->estorbo;
                $armadura->precio = $request->precio;
                $armadura->descripcion = $request->descripcion;

                $ok = $armadura->save();


                if ($ok) {
                    $armadura->propiedades()->sync($request->propiedades);

                    $armadura->lugaresCuerpo()->sync($request->lugares);

                    return Response::json([
                        "status" => true,
                        "mensaje" => "armadura editada con éxito..."
                    ]);
                }
            } catch (\Throwable $th) {
                dd($th);
                return Response::json([
                    "status" => false,
                    "mensaje" => "Error al actualizar el armadura."
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
        if (Auth::user()->isAbleTo("borrar-personajes")) {

            try {
                $armadura = Armadura::findOrFail($request->id);

                $armadura->delete();

                return Response::json([
                    "status" => true,
                    "mensaje" => "armadura eliminada con éxito."
                ]);
            } catch (\Throwable $th) {
                return Response::json([
                    "status" => true,
                    "mensaje" => "Error al obtener los datos del armadura"
                ]);
            }
        }

        return Response::json([
            "status" => false,
            "mensaje" => "No tienes permisos para realizar esta acción",
        ]);
    }
}
