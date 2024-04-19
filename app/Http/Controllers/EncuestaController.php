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

        $atencionExcelente = 0;
        $atencionBueno = 0;
        $atencionRegular = 0;
        $atencionMalo = 0;

        $asesoriaExcelente = 0;
        $asesoriaBueno = 0;
        $asesoriaRegular = 0;
        $asesoriaMalo = 0;

        $tiempoExcelente = 0;
        $tiempoBueno = 0;
        $tiempoRegular = 0;
        $tiempoMalo = 0;

        $espaciosExcelente = 0;
        $espaciosBueno = 0;
        $espaciosRegular = 0;
        $espaciosMalo = 0;

        $satisfaccionExcelente = 0;
        $satisfaccionBueno = 0;
        $satisfaccionRegular = 0;
        $satisfaccionMalo = 0;

        $encuesta = Tramit::find($id);
        $reportes = Encuesta::all();

        /*  foreach ($reportes as $reporte) {
            if ($reporte->atencionExcelente != '') {
                $atencionExcelente = $atencionExcelente + 1;
            }
            if ($reporte->atencionBueno != '') {
                $atencionBueno = $atencionBueno + 1;
            }
            if ($reporte->atencionRegular != '') {
                $atencionRegular = $atencionRegular + 1;
            }
            if ($reporte->atencionMalo != '') {
                $atencionMalo = $atencionMalo + 1;
            }
            //Asesoría
            if ($reporte->asesoriaExcelente != '') {
                $asesoriaExcelente = $asesoriaExcelente + 1;
            }
            if ($reporte->asesoriaBueno != '') {
                $asesoriaBueno = $asesoriaBueno + 1;
            }
            if ($reporte->asesoriaRegular != '') {
                $asesoriaRegular = $asesoriaRegular + 1;
            }
            if ($reporte->asesoriaMalo != '') {
                $asesoriaMalo = $asesoriaMalo + 1;
            }

            //Tiempo
            if ($reporte->tiempoExcelente != '') {
                $tiempoExcelente = $tiempoExcelente + 1;
            }
            if ($reporte->tiempoBueno != '') {
                $tiempoBueno = $tiempoBueno + 1;
            }
            if ($reporte->tiempoRegular != '') {
                $tiempoRegular = $tiempoRegular + 1;
            }
            if ($reporte->tiempoMalo != '') {
                $tiempoMalo = $tiempoMalo + 1;
            }

            //Espaacio
            if ($reporte->espaciosExcelente != '') {
                $espaciosExcelente = $espaciosExcelente + 1;
            }
            if ($reporte->espaciosBueno != '') {
                $espaciosBueno = $espaciosBueno + 1;
            }
            if ($reporte->espaciosRegular != '') {
                $espaciosRegular = $espaciosRegular + 1;
            }
            if ($reporte->espaciosMalo != '') {
                $espaciosMalo = $espaciosMalo + 1;
            }

            //Satisfacción
            if ($reporte->satisfaccionExcelente != '') {
                $satisfaccionExcelente = $satisfaccionExcelente + 1;
            }
            if ($reporte->satisfaccionBueno != '') {
                $satisfaccionBueno = $satisfaccionBueno + 1;
            }
            if ($reporte->satisfaccionRegular != '') {
                $satisfaccionRegular = $satisfaccionRegular + 1;
            }
            if ($reporte->satisfaccionMalo != '') {
                $satisfaccionMalo = $satisfaccionMalo + 1;
            }
        } */

        $atencionExcelente = Encuesta::select('atencionExcelente', DB::raw('count(*) as total'), DB::raw('atencionExcelente as atencion'))->groupBy('atencionExcelente')->get();
        $atencionBueno = Encuesta::select('atencionBueno', DB::raw('count(*) as total'), DB::raw('atencionBueno as atencion'))->groupBy('atencionBueno')->get();
        $atencionRegular = Encuesta::select('atencionRegular', DB::raw('count(*) as total'), DB::raw('atencionRegular as atencion'))->groupBy('atencionRegular')->get();
        $atencionMalo = Encuesta::select('atencionMalo', DB::raw('count(*) as total'), DB::raw('atencionMalo as atencion'))->groupBy('atencionMalo')->get();

        $asesoriaExcelente = Encuesta::select('asesoriaExcelente', DB::raw('count(*) as total'))->groupBy('asesoriaExcelente')->get();
        $asesoriaBueno = Encuesta::select('asesoriaBueno', DB::raw('count(*) as total'))->groupBy('asesoriaBueno')->get();
        $asesoriaRegular = Encuesta::select('asesoriaRegular', DB::raw('count(*) as total'))->groupBy('asesoriaRegular')->get();
        $asesoriaMalo = Encuesta::select('asesoriaMalo', DB::raw('count(*) as total'))->groupBy('asesoriaMalo')->get();

        $tiempoExcelente = Encuesta::select('tiempoExcelente', DB::raw('count(*) as total'))->groupBy('tiempoExcelente')->get();
        $tiempoBueno = Encuesta::select('tiempoBueno', DB::raw('count(*) as total'))->groupBy('tiempoBueno')->get();
        $tiempoRegular = Encuesta::select('tiempoRegular', DB::raw('count(*) as total'))->groupBy('tiempoRegular')->get();
        $tiempoMalo = Encuesta::select('tiempoMalo', DB::raw('count(*) as total'))->groupBy('tiempoMalo')->get();

        $espaciosExcelente = Encuesta::select('espaciosExcelente', DB::raw('count(*) as total'))->groupBy('espaciosExcelente')->get();
        $espaciosBueno = Encuesta::select('espaciosBueno', DB::raw('count(*) as total'))->groupBy('espaciosBueno')->get();
        $espaciosRegular = Encuesta::select('espaciosRegular', DB::raw('count(*) as total'))->groupBy('espaciosRegular')->get();
        $espaciosMalo = Encuesta::select('espaciosMalo', DB::raw('count(*) as total'))->groupBy('espaciosMalo')->get();

        $satisfaccionExcelente = Encuesta::select('satisfaccionExcelente', DB::raw('count(*) as total'))->groupBy('satisfaccionExcelente')->get();
        $satisfaccionBueno = Encuesta::select('satisfaccionBueno', DB::raw('count(*) as total'))->groupBy('satisfaccionBueno')->get();
        $satisfaccionRegular = Encuesta::select('satisfaccionRegular', DB::raw('count(*) as total'))->groupBy('satisfaccionRegular')->get();
        $satisfaccionMalo = Encuesta::select('satisfaccionMalo', DB::raw('count(*) as total'))->groupBy('satisfaccionMalo')->get();



        return view('tramites.encuestas', compact(
            'encuesta',
            'atencionExcelente',
            'atencionBueno',
            'atencionRegular',
            'atencionMalo',
            'asesoriaExcelente',
            'asesoriaBueno',
            'asesoriaRegular',
            'asesoriaMalo',
            'tiempoExcelente',
            'tiempoBueno',
            'tiempoRegular',
            'tiempoMalo',
            'espaciosExcelente',
            'espaciosBueno',
            'espaciosRegular',
            'espaciosMalo',
            'satisfaccionExcelente',
            'satisfaccionBueno',
            'satisfaccionRegular',
            'satisfaccionMalo'

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
