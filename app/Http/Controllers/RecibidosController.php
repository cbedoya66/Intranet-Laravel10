<?php

namespace App\Http\Controllers;

use App\Models\Festivo;
use App\Models\Received;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecibidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //$registro = Received::all()->last();
        $registro = Received::orderBy('nroRadicado', 'desc')->get()->first();

        //obtener fechas
        $festivos = Festivo::all('fecha');


        $nroRadicado = $registro->nroRadicado;

        $abogados = DB::table('abogados')->orderBy('profesional')->get();


        return view('gestionDoc.listaRecibidos', compact('abogados', 'nroRadicado', 'festivos'));
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

        $radicado = new Received();


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
        $radicado->codbarrec = $request->input('codbarrec');
        $radicado->strArchivo = $request->input('strArchivo');


        $radicado->save();

        return back()->with('message', 'Radicado guardado con exito !');
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
        $radRecibidosE = Received::find($id);

        $abogados = DB::table('abogados')->orderBy('profesional')->get();

        return view('gestionDoc.editRecibidos', compact('radRecibidosE', 'abogados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $radRecibidosE = Received::find($id);

        $radRecibidosE->fecha = $request->input('fecha');
        $radRecibidosE->nroRadicado = $request->input('nroRadicado');
        $radRecibidosE->nroRadInicial = $request->input('nroRadInicial');
        $radRecibidosE->nroRadDocR = $request->input('nroRadDocR');
        $radRecibidosE->dependencia = $request->input('dependencia');
        $radRecibidosE->encargado = $request->input('encargado');
        $radRecibidosE->asunto = $request->input('asunto');
        $radRecibidosE->abogado = $request->input('abogado');
        $radRecibidosE->anexo = $request->input('anexo');
        $radRecibidosE->rRespuesta = $request->input('respuesta');
        $radRecibidosE->radRespuesta = $request->input('radRespuesta');
        $radRecibidosE->fecRespuesta = $request->input('fecRespuesta');
        $radRecibidosE->codbarrec = $request->input('codbarrec');
        $radRecibidosE->strArchivo = $request->input('strArchivo');

        $request->validate([
            'strArchivo' => 'mimes:pdf'
        ]);

        //Almacenar archivo
        if ($request->hasFile('strArchivo')) {
            $name = $request->file('strArchivo')->getClientOriginalName();
            $request->file('strArchivo')->move(public_path('recibidos'), $name);
            //return $request->file('strArchivo')->move(public_path('Archivos_abogados'), $name);
            $radRecibidosE->strArchivo =  $name;
        }


        $radRecibidosE->update();

        $abogados = DB::table('abogados')->orderBy('profesional')->get();
        $message = 'Actualizado Correctamente !';
        return view('gestionDoc.editRecibidos', compact('message', 'radRecibidosE', 'abogados'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }

    public function eliminar(String $id)
    {

        $radicado = Received::find($id);


        $radicado->delete();

        return back();
    }

    public function reporte(Request $request)
    {
        $fechaInicial = $request->input('fechaInicial');
        $fechaFinal = $request->input('fechaFinal');

        $reportes = DB::select("SELECT * FROM receiveds WHERE fecha Between ' $fechaInicial' AND ' $fechaFinal'  ORDER BY fecha asc");

        return view('gestionDoc.reporte', compact('reportes'));
    }

    public function reporteAbogado(Request $request)
    {
        $abogado = $request->input('abogado');
        $fechaInicial = $request->input('fechaInicial');
        $fechaFinal = $request->input('fechaFinal');

        $reportes = DB::select("SELECT * FROM receiveds WHERE fecha Between ' $fechaInicial' AND ' $fechaFinal' AND abogado = '$abogado' ORDER BY fecha desc");

        return view('gestionDoc.reporteAbogado', compact('reportes'));
    }

    public function codBarras(Request $request)
    {
        // $codigo = ['codigo' => $request->input('codbarrec')];

        return view('gestionDoc.codBarraRecibido', ['codigo' => $request->input('codbarrec')]);

        //$codBarras = Received::where('codbarrec', $codigo)->get();


    }
}
