@extends('adminlte::page')

@section('title', 'IntranetPersoneria')

@section('content_header')
    <h1>PERSONERIA MUNICIPAL DE SABANETA</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <img src="{{ asset('img/fondo_pantalla.jpg') }}" alt="" srcset="" style="width: 100%">
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
