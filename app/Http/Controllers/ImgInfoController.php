<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImgInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('/cargarImagenes/imgInfo');
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
        $request->validate([
            'strArchivo' => 'mimetypes:image/jpeg,image/png,image/jpg'
        ]);



        //Almacenar archivo
        if ($request->hasFile('strArchivo')) {
            $name = $request->file('strArchivo')->getClientOriginalName();
            $request->file('strArchivo')->move(public_path('img'), $name);
        }

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
        //
    }
}
