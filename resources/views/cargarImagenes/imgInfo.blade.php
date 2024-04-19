@extends('adminlte::page')

@section('title', 'IntranetPersoneria')

@section('content_header')
    <h1>Carga Imagen Informativa</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('imgInfo.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-6">
                        <h6>Carga Imagen con el nombre y la extención siguiente "fondo1.jpg"</h6>
                        <x-adminlte-input accept="image/*" name="strArchivo" type="file" label="Archivo"
                            label-class="text-lightblue" value="">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-file text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        @error('strArchivo')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <x-adminlte-button class="btn-flat" type="submit" label="Guardar Imagen" theme="success"
                    icon="fas fa-lg fa-save" />
            </form>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
