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
        $encuesta->atencionExcelente = $request->input('atencionExcelente');
        $encuesta->atencionBueno = $request->input('atencionBueno');
        $encuesta->atencionRegular = $request->input('atencionRegular');
        $encuesta->atencionMalo = $request->input('atencionMalo');
        $encuesta->asesoriaExcelente = $request->input('asesoriaExcelente');
        $encuesta->asesoriaBueno = $request->input('asesoriaBueno');
        $encuesta->asesoriaRegular = $request->input('asesoriaRegular');
        $encuesta->asesoriaMalo = $request->input('asesoriaMalo');
        $encuesta->tiempoExcelente = $request->input('tiempoExcelente');
        $encuesta->tiempoBueno = $request->input('tiempoBueno');
        $encuesta->tiempoRegular = $request->input('tiempoRegular');
        $encuesta->tiempoMalo = $request->input('tiempoMalo');
        $encuesta->espaciosExcelente = $request->input('espaciosExcelente');
        $encuesta->espaciosBueno = $request->input('espaciosBueno');
        $encuesta->espaciosRegular = $request->input('espaciosRegular');
        $encuesta->espaciosMalo = $request->input('espaciosMalo');
        $encuesta->satisfaccionExcelente = $request->input('satisfaccionExcelente');
        $encuesta->satisfaccionBueno = $request->input('satisfaccionBueno');
        $encuesta->satisfaccionRegular = $request->input('satisfaccionRegular');
        $encuesta->satisfaccionMalo = $request->input('satisfaccionMalo');
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

        return view('tramites.encuestas', compact('encuesta'));
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
