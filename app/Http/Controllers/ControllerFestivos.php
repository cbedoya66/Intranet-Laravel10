<?php

namespace App\Http\Controllers;

use App\Models\Festivo;
use Illuminate\Http\Request;

class ControllerFestivos extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $festivos = Festivo::all();

        return view('festivos.festivos', compact('festivos'));
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
        $festivo = new Festivo();

        $festivo->fecha = $request->input('fecha');

        $festivo->save();

        return back();
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
        $festivo = Festivo::find($id);

        $festivo->delete();

        return back();
    }
}
