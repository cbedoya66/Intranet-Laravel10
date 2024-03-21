<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Encuesta;
use App\Models\Tramit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysqli;
use Yajra\DataTables\DataTables;

class TramiteController extends Controller
{

    public function __construct()
    {
        //$this->middleware('can: crear tramite')->only('create'); //restringir metodo create desde url
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        return view('tramites.listaTramites');
    }

    public function create()
    {


        $abogados = DB::table('abogados')->orderBy('profesional')->get();
        $peticiones = DB::table('peticions')->orderBy('peticiones')->get();
        $poblaciones  = DB::table('poblacions')->orderBy('descripcion')->get();

        return view('tramites.addTramitesSU', compact('abogados', 'peticiones', 'poblaciones'));
    }


    public function store(Request $request)
    {

        $cedula = $request->input('intcedula');

        //validación
        $validacion = $request->validate([
            'intcedula' => 'required|max:15',
            'strnombres' => 'required|max:75|string',
            'strdireccion' => 'required|max:75',
            'strsector' => 'required|max:75',
            'strtelefono' => 'required|max:15',
        ]);


        $tramite = new Tramit();

        $cliente = Client::find($cedula);

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
        $tramite->strobservacionesAbogado = $request->input('strobservaciones');
        $tramite->email = $request->input('email');
        $tramite->poblacion = $request->input('poblacion');
        $tramite->activo = 1;

        $tramite->save();


        $cliente->id = $request->input('intcedula');
        $cliente->strnombres = $request->input('strnombres');
        $cliente->strdireccion = $request->input('strdireccion');
        $cliente->strsector = $request->input('strsector');
        $cliente->strtelefono = $request->input('strtelefono');
        $cliente->strnacionalidad = $request->input('strnacionalidad');
        $cliente->edad = $request->input('edad');
        $cliente->email = $request->input('email');
        $cliente->poblacion = $request->input('poblacion');


        $cliente->update();

        $abogados = DB::table('abogados')->orderBy('profesional')->get();
        $peticiones = DB::table('peticions')->orderBy('peticiones')->get();
        $poblaciones  = DB::table('poblacions')->orderBy('descripcion')->get();

        return view('tramites.listaTramites', compact('abogados', 'peticiones', 'poblaciones'));

        //return back()->with('message', 'ok');
    }


    public function show(Request $request, $id)
    {
    }


    public function edit(string $id)
    {
        $tramites = Tramit::find($id);
        $abogados = DB::table('abogados')->orderBy('profesional')->get();
        $peticiones = DB::table('peticions')->orderBy('peticiones')->get();
        $poblaciones  = DB::table('poblacions')->orderBy('descripcion')->get();


        return view('tramites.editTramites', compact('tramites', 'abogados', 'peticiones', 'poblaciones'));
    }


    public function update(Request $request, string $id)
    {


        $tramites = Tramit::find($id);

        $tramites->fecha = $request->input('fecha');
        $tramites->intcedula = $request->input('intcedula');
        $tramites->strnombres = $request->input('strnombres');
        $tramites->strdireccion = $request->input('strdireccion');
        $tramites->strsector = $request->input('strsector');
        $tramites->strtelefono = $request->input('strtelefono');
        $tramites->strnacionalidad = $request->input('strnacionalidad');
        $tramites->strpeticion = $request->input('strpeticion');
        $tramites->strprofesional = $request->input('strprofesional');
        $tramites->entidad = $request->input('entidad');
        $tramites->edad = $request->input('edad');
        $tramites->strobservacionesAbogado = $request->input('strobservaciones');
        $tramites->activo = '1';
        $tramites->email = $request->input('email');
        $tramites->poblacion = $request->input('poblacion');

        $tramites->update();

        $abogados = DB::table('abogados')->orderBy('profesional')->get();
        $peticiones = DB::table('peticions')->orderBy('peticiones')->get();
        $poblaciones  = DB::table('poblacions')->orderBy('descripcion')->get();


        return view('tramites.listaTramites', compact('tramites', 'abogados', 'peticiones', 'poblaciones'));
    }


    public function destroy(string $id)
    {
    }

    public function eliminar(string $id)
    {

        $tramite = Tramit::find($id);

        $tramite->delete();

        return back();
    }

    public function reporteU(Request $request)
    {
        $fechaInicial = $request->input('fechaInicial');
        $fechaFinal = $request->input('fechaFinal');

        $reportes = DB::select("SELECT tAtencion ,count(tAtencion) as total FROM tramits WHERE fecha Between ' $fechaInicial' AND ' $fechaFinal'  GROUP BY tAtencion ORDER BY total asc");

        return view('tramites.reporteU', compact('reportes'));
    }

    public function reporteP(Request $request)
    {
        $fechaInicial = $request->input('fechaInicial');
        $fechaFinal = $request->input('fechaFinal');

        $reportes = DB::select("SELECT poblacion ,count(poblacion) as total FROM tramits WHERE fecha Between ' $fechaInicial' AND ' $fechaFinal' AND poblacion IS NOT NULL GROUP BY poblacion ORDER BY total ASC");

        return view('tramites.reporteP', compact('reportes'));
    }

    public function reporteE(Request $request)
    {
        $fechaInicial = $request->input('fechaInicial');
        $fechaFinal = $request->input('fechaFinal');

        $reportes = DB::select("SELECT * FROM encuestas WHERE encuestas.fecha Between ' $fechaInicial' AND ' $fechaFinal'  ");

        return view('tramites.reporteE', compact('reportes'));
    }

    public function encuesta($id)
    {
        return $id;
        return view('tramites.encuestas');
    }
}
