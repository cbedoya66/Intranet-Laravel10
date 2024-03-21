@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de Trámites</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <h4>Reporte Consolidado de Encuesta</h4>
        </div>
        <div class="card">
            <div class="card-body">
                @php
                    $heads = [
                        'CÉDULA',
                        'NOMBRES',
                        'ABOGADO',
                        'OBS',
                        'ATENCIÓN',
                        'ASESORÍA',
                        'TIEMPO',
                        'ESPACIO',

                        ['label' => 'SATISFACCIÓN', 'width' => 5],
                    ];

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
                        @php
                            if ($reporte->atencionExcelente != '') {
                                $atencion = $reporte->atencionExcelente;
                            }
                            if ($reporte->atencionBueno != '') {
                                $atencion = $reporte->atencionBueno;
                            }
                            if ($reporte->atencionRegular != '') {
                                $atencion = $reporte->atencionRegular;
                            }
                            if ($reporte->atencionMalo != '') {
                                $atencion = $reporte->atencionMalo;
                            }
                            //Asesoría
                            if ($reporte->asesoriaExcelente != '') {
                                $asesoria = $reporte->asesoriaExcelente;
                            }
                            if ($reporte->asesoriaBueno != '') {
                                $asesoria = $reporte->asesoriaBueno;
                            }
                            if ($reporte->asesoriaRegular != '') {
                                $asesoria = $reporte->asesoriaRegular;
                            }
                            if ($reporte->asesoriaMalo != '') {
                                $asesoria = $reporte->asesoriaMalo;
                            }

                            //Tiempo
                            if ($reporte->tiempoExcelente != '') {
                                $tiempo = $reporte->tiempoExcelente;
                            }
                            if ($reporte->tiempoBueno != '') {
                                $tiempo = $reporte->tiempoBueno;
                            }
                            if ($reporte->tiempoRegular != '') {
                                $tiempo = $reporte->tiempoRegular;
                            }
                            if ($reporte->tiempoMalo != '') {
                                $tiempo = $reporte->tiempoMalo;
                            }

                            //Espaacio
                            if ($reporte->espaciosExcelente != '') {
                                $espacios = $reporte->espaciosExcelente;
                            }
                            if ($reporte->espaciosBueno != '') {
                                $espacios = $reporte->espaciosBueno;
                            }
                            if ($reporte->espaciosRegular != '') {
                                $espacios = $reporte->espaciosRegular;
                            }
                            if ($reporte->espaciosMalo != '') {
                                $espacios = $reporte->espaciosMalo;
                            }

                            //Satisfacción
                            if ($reporte->satisfaccionExcelente != '') {
                                $satisfaccion = $reporte->satisfaccionExcelente;
                            }
                            if ($reporte->satisfaccionBueno != '') {
                                $satisfaccion = $reporte->satisfaccionBueno;
                            }
                            if ($reporte->satisfaccionRegular != '') {
                                $satisfaccion = $reporte->satisfaccionRegular;
                            }
                            if ($reporte->satisfaccionMalo != '') {
                                $satisfaccion = $reporte->satisfaccionMalo;
                            }
                        @endphp

                        <tr>
                            <td>{{ $reporte->cedula }}</td>
                            <td>{{ $reporte->nombreUsuario }}</td>
                            <td>{{ $reporte->funcionario }}</td>
                            <td>{{ $reporte->observaciones }}</td>
                            <td>{{ $atencion }}</td>
                            <td>{{ $asesoria }}</td>
                            <td>{{ $tiempo }}</td>
                            <td>{{ $espacios }}</td>
                            <td>{{ $satisfaccion }}</td>


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
