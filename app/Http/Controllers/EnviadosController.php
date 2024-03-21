<?php

namespace App\Http\Controllers;

use App\Models\Festivo;
use App\Models\Sent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EnviadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //$registro = Received::all()->last();
        $registro = Sent::orderBy('nroRadicado', 'desc')->get()->first();

        //obtener fechas
        $festivos = Festivo::all('fecha');


        $nroRadicado = $registro->nroRadicado;

        $abogados = DB::table('abogados')->orderBy('profesional')->get();


        return view('gestionDoc.listaEnviados', compact('abogados', 'nroRadicado', 'festivos'));
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

        $radicado = new Sent();


        $radicado->fecha = $request->input('fecha');
        $radicado->nroRadicado = $request->input('nroRadicado');
        $radicado->nroRadInicial = $request->input('nroRadInicial');
        $radicado->nroRadDocR = $request->input('nroRadDocR');
        $radicado->dependencia = $request->input('dependencia');
        $radicado->encargado = $request->input('encargado');
        $radicado->asunto = $request->input('asunto');
        $radicado->abogado = $request->input('abogado');
        $radicado->anexo = $request->input('anexo');
        if ($request->input('respuesta') == 1) {
            $radicado->rRespuesta = 'NO';
        } elseif ($request->input('respuesta') == 2) {
            $radicado->rRespuesta = 'SI';
        } else {
            $radicado->rRespuesta = 'RESUELTO';
        }
        $radicado->radRespuesta = $request->input('radRespuesta');
        $radicado->fecRespuesta = $request->input('fecRespuesta');
        $radicado->codbarenv = $request->input('codbarenv');
        $radicado->strArchivo = $request->input('strArchivo');


        $radicado->save();

        return back()->with('message', 'ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $radEnviadosE = Sent::find($id);

        $abogados = DB::table('abogados')->orderBy('profesional')->get();

        return view('gestionDoc.editEnviados', compact('radEnviadosE', 'abogados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $radEnviadosE = Sent::find($id);

        $radEnviadosE->fecha = $request->input('fecha');
        $radEnviadosE->nroRadicado = $request->input('nroRadicado');
        $radEnviadosE->nroRadInicial = $request->input('nroRadInicial');
        $radEnviadosE->nroRadDocR = $request->input('nroRadDocR');
        $radEnviadosE->dependencia = $request->input('dependencia');
        $radEnviadosE->encargado = $request->input('encargado');
        $radEnviadosE->asunto = $request->input('asunto');
        $radEnviadosE->abogado = $request->input('abogado');
        $radEnviadosE->anexo = $request->input('anexo');
        $radEnviadosE->rRespuesta = $request->input('respuesta');
        $radEnviadosE->radRespuesta = $request->input('radRespuesta');
        $radEnviadosE->fecRespuesta = $request->input('fecRespuesta');
        $radEnviadosE->codbarenv = $request->input('codbarenv');


        $request->validate([
            'strArchivo' => 'mimes:pdf'
        ]);

        //Almacenar archivo
        if ($request->hasFile('strArchivo')) {
            $name = $request->file('strArchivo')->getClientOriginalName();
            $request->file('strArchivo')->move(public_path('enviados'), $name);
            //return $request->file('strArchivo')->move(public_path('Archivos_abogados'), $name);
            $radEnviadosE->strArchivo =  $name;
        }

        $radEnviadosE->update();

        $abogados = DB::table('abogados')->orderBy('profesional')->get();
        $message = 'Actualizado Correctamente !';
        return view('gestionDoc.editEnviados', compact('message', 'radEnviadosE', 'abogados'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }

    public function eliminar(String $id)
    {

        $radicado = Sent::find($id);


        $radicado->delete();

        return back();
    }

    public function reporte(Request $request)
    {
        $fechaInicial = $request->input('fechaInicial');
        $fechaFinal = $request->input('fechaFinal');

        $reportes = DB::select("SELECT * FROM sents WHERE fecha Between ' $fechaInicial' AND ' $fechaFinal'  ORDER BY fecha asc");

        return view('gestionDoc.reporte', compact('reportes'));
    }

    public function reporteAbogado(Request $request)
    {
        $abogado = $request->input('abogado');
        $fechaInicial = $request->input('fechaInicial');
        $fechaFinal = $request->input('fechaFinal');

        $reportes = DB::select("SELECT * FROM sents WHERE fecha Between ' $fechaInicial' AND ' $fechaFinal' AND abogado = '$abogado' ORDER BY fecha desc");

        return view('gestionDoc.reporteAbogado', compact('reportes'));
    }

    public function codBarras(Request $request)
    {
        // $codigo = ['codigo' => $request->input('codbarrec')];

        return view('gestionDoc.codBarraEnviado', ['codigo' => $request->input('codbarenv')]);

        //$codBarras = Received::where('codbarrec', $codigo)->get();


    }
}
