<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use App\Models\Tramit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $encuesta = new Encuesta();

        $encuesta->fecha = $request->input('fecha');
        $encuesta->atencion = $request->input('atencion');
        $encuesta->asesoria = $request->input('asesoria');
        $encuesta->tiempo = $request->input('tiempo');
        $encuesta->espacios = $request->input('espacios');
        $encuesta->satisfaccion = $request->input('satisfaccion');
        $encuesta->observaciones = $request->input('observaciones');
        $encuesta->funcionario = $request->input('funcionario');
        $encuesta->cedula = $request->input('cedula');
        $encuesta->nombreUsuario = $request->input('nombreUsuario');
        $encuesta->telefono = $request->input('telefono');
        $encuesta->direccion = $request->input('direccion');
        $encuesta->email = $request->input('email');


        $encuesta->save();

        $abogados = DB::table('abogados')->orderBy('profesional')->get();
        $peticiones = DB::table('peticions')->orderBy('peticiones')->get();
        $poblaciones  = DB::table('poblacions')->orderBy('descripcion')->get();

        return view('tramites.listaTramites', compact('abogados', 'peticiones', 'poblaciones'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


        $encuesta = Tramit::find($id);
        $reportes = Encuesta::all();



        $atencion = Encuesta::select('atencion', DB::raw('count(*) as total'), DB::raw('atencion as atencion'))->groupBy('atencion')->get();
        //return $atencion;
        $asesoria = Encuesta::select('asesoria', DB::raw('count(*) as total'), DB::raw('asesoria as asesoria'))->groupBy('asesoria')->get();

        $tiempo = Encuesta::select('tiempo', DB::raw('count(*) as total'), DB::raw('tiempo as tiempo'))->groupBy('tiempo')->get();

        $espacios = Encuesta::select('espacios', DB::raw('count(*) as total'), DB::raw('espacios as espacios'))->groupBy('espacios')->get();

        $satisfaccion = Encuesta::select('satisfaccion', DB::raw('count(*) as total'), DB::raw('satisfaccion as satisfaccion'))->groupBy('satisfaccion')->get();


        return view('tramites.encuestas', compact(
            'encuesta',
            'atencion',
            'asesoria',
            'tiempo',
            'espacios',
            'satisfaccion',

        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
