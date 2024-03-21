<?php

namespace App\Http\Controllers;


use App\Models\Tramit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\Concat;
use Barryvdh\DomPDF\Facade\Pdf;

class AbogadoController extends Controller
{

    private $disk = 'public';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $abogado = auth()->user()->name;
        $activo = "1";
        //$tramitesA = DB::table('tramits')->where('activo', $activo)->where('strprofesional', $abogado)->orderBy('id', 'desc')->get();
        $tramitesA = Tramit::where('activo',  $activo)->where('strprofesional',  $abogado)->orderBy('id', 'desc')->get();

        return view('abogados.listaAbogados', compact('tramitesA'));
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
        //
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

        $tramites = Tramit::find($id);
        $abogados = DB::table('abogados')->orderBy('profesional')->get();
        $peticiones = DB::table('peticions')->orderBy('peticiones')->get();
        $poblaciones  = DB::table('poblacions')->orderBy('descripcion')->get();


        return view('tramites.editTramitesAbogado', compact('tramites', 'abogados', 'peticiones', 'poblaciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        //$request->file('strArchivo')->store('abogados');
        $tramite = Tramit::find($id);

        $tramite->fecha = $request->input('fecha');
        $tramite->intcedula = $request->input('intcedula');
        $tramite->strnombres = $request->input('strnombres');
        $tramite->strdireccion = $request->input('strdireccion');
        $tramite->strsector = $request->input('strsector');
        $tramite->strtelefono = $request->input('strtelefono');
        $tramite->strnacionalidad = $request->input('strnacionalidad');
        $tramite->strpeticion = $request->input('strpeticion');
        $tramite->strprofesional = $request->input('strprofesional');
        $tramite->entidad = $request->input('entidad');
        $tramite->edad = $request->input('edad');
        $tramite->strobservacionesAbogado = $request->input('strobservacionesAbogado');
        $tramite->strobservaciones = $request->input('strobservaciones');
        $tramite->activo = '0';
        $tramite->email = $request->input('email');
        $tramite->poblacion = $request->input('poblacion');
        $tramite->strArchivo = $request->input('strArchivo');


        $request->validate([
            'strArchivo' => 'mimes:pdf'
        ]);

        //Almacenar archivo
        if ($request->hasFile('strArchivo')) {
            $name = $request->file('strArchivo')->getClientOriginalName();
            $request->file('strArchivo')->move(public_path('Archivos_abogados'), $name);
            //return $request->file('strArchivo')->move(public_path('Archivos_abogados'), $name);
            $tramite->strArchivo =  $name;
        }


        $tramite->update();

        $abogado = auth()->user()->name;
        $activo = "1";
        $tramitesA = DB::table('tramits')->where('activo', $activo)->where('strprofesional', $abogado)->get();

        $message = 'Actualizado Correctamente !';
        return view('abogados.listaAbogados', compact('message', 'tramitesA'));

        //return back()->with('message', 'Actualizado Correctamente !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }

    public function reporte(Request $request)
    {
        $fechaInicial = $request->input('fechaInicial');
        $fechaFinal = $request->input('fechaFinal');
        $profesional = auth()->user()->name;

        $reportes = DB::select("SELECT tAtencion ,count(tAtencion) as total FROM tramits WHERE fecha Between ' $fechaInicial' AND ' $fechaFinal'  AND strprofesional = '$profesional' GROUP BY tAtencion ORDER BY total desc");

        return view('abogados.reporte', compact('reportes'));
    }
}