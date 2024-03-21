<?php

namespace App\Http\Controllers;

use App\Models\Abogado;
use App\Models\Client;
use App\Models\Peticion;
use App\Models\Poblacion;
use App\Models\Tramit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $abogados = DB::table('abogados')->orderBy('profesional')->get();
        $peticiones = DB::table('peticions')->orderBy('peticiones')->get();
        $poblaciones  = DB::table('poblacions')->orderBy('descripcion')->get();

        return view('clientes.listaClientes', compact('abogados', 'peticiones', 'poblaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $abogados = DB::table('abogados')->orderBy('profesional')->get();
        $peticiones = DB::table('peticions')->orderBy('peticiones')->get();
        $poblaciones  = DB::table('poblacions')->orderBy('descripcion')->get();

        return view('clientes.listaClientes', compact('abogados', 'peticiones', 'poblaciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //validación
        $validacion = $request->validate([
            'intcedula' => 'required|max:15',
            'strnombres' => 'required|max:75|string',
            'strdireccion' => 'required|max:75',
            'strsector' => 'required|max:75',
            'strtelefono' => 'required|max:15',
        ]);


        $tramite = new Tramit();

        $cliente = new Client();

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


        $cliente->save();

        $abogados = DB::table('abogados')->orderBy('profesional')->get();
        $peticiones = DB::table('peticions')->orderBy('peticiones')->get();
        $poblaciones  = DB::table('poblacions')->orderBy('descripcion')->get();

        return view('tramites.listaTramites', compact('abogados', 'peticiones', 'poblaciones'));
        //return back()->with('message', 'ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $registro = Client::find($id);

        $abogados = DB::table('abogados')->orderBy('profesional')->get();
        $peticiones = DB::table('peticions')->orderBy('peticiones')->get();
        $poblaciones  = DB::table('poblacions')->orderBy('descripcion')->get();

        return view('tramites.addTramites', compact('registro', 'abogados', 'peticiones', 'poblaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $id;
        $cliente = Client::find($id);

        $cliente->delete();

        return back();
    }

    public function eliminar(string $id)
    {

        $cliente = Client::find($id);

        $cliente->delete();

        return back();
    }
}