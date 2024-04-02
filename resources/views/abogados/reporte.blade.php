@extends('adminlte::page')

@section('title', 'IntranetPersoneria')

@section('content_header')
    <h1>Listado de Trámites</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <h4>Reporte Consolidado de Trámites por Usuario</h4>
        </div>
        <div class="card">
            <div class="card-body">
                @php
                    $heads = ['PETICION', ['label' => 'TOTAL', 'width' => 10]];

                    $config = [
                        'language' => [
                            'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                        ],
                    ];
                @endphp

                {{-- Minimal example / fill data using the component slot --}}
                <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
                    bordered compressed>

                    @foreach ($reportes as $reporte)
                        <tr>
                            <td>{{ $reporte->tAtencion }}</td>
                            <td>{{ $reporte->total }}</td>
                        </tr>
                    @endforeach

                </x-adminlte-datatable>
            </div>

        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {



        });
    </script>

@stop
