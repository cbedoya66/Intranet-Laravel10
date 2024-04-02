@extends('adminlte::page')

@section('title', 'IntranetPersoneria')

@section('content_header')
    <h1>Reporte Consolidado de Radicados Recibidos</h1>
@stop

@section('content')

    <div class="card">

        <div class="card">
            <div class="card-body">
                @php
                    $heads = ['FECHA', 'NRO.RADICADO', 'DEPENDENCIA', ['label' => 'ASUNTO', 'width' => 10]];

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
                            <td>{{ $reporte->fecha }}</td>
                            <td>{{ $reporte->nroRadicado }}</td>
                            <td>{{ $reporte->dependencia }}</td>
                            <td>{{ $reporte->asunto }}</td>
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
