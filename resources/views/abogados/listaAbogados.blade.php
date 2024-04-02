@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de Trámites por Abogados</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h4>Reporte Consolidado de Trámites por Usuario</h4>
            <form action="{{ url('abogado/reporte') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-3"><x-adminlte-input name="fechaInicial" type="date" label="fecha" placeholder="Fecha"
                            label-class="text-lightblue" value="<?php echo date('Y-m-d', time()); ?>">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-3"><x-adminlte-input name="fechaFinal" type="date" label="fecha"
                            placeholder="Fecha" label-class="text-lightblue" value="<?php echo date('Y-m-d', time()); ?>">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>

                </div>
                <x-adminlte-button class="btn-flat" type="submit" label="Reporte" theme="success"
                    icon="fas fa-file-excel" />
            </form>

        </div>

    </div>
    <p>Bienvenido al panel de Trámites por Abogado</p>
    <div class="card">
        <div class="card-body">
            @php
                $heads = [
                    'ID',
                    'Fecha',
                    'CEDULA',
                    'NOMBRES',
                    'TRAMITE',
                    'ABOGADO',
                    'DIRECTRIZ FILTRO',
                    'OBSERVACIONES ABOGADO',
                    'CORREO',
                    ['label' => 'ACTIVO', 'width' => 60],
                    ['label' => 'Actions', 'no-export' => true, 'width' => 10],
                ];

                $btnEdit = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';

                $config = [
                    'language' => [
                        'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                    ],
                ];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table3" :heads="$heads" head-theme="dark" :config="$config" theme="info"
                striped hoverable>

                @foreach ($tramitesA as $tramite)
                    <tr>
                        <td>{{ (int) $tramite->id }} </td>
                        <td>{{ $tramite->fecha }}</td>
                        <td>{{ $tramite->intcedula }}</td>
                        <td>{{ $tramite->strnombres }}</td>
                        <td>{{ $tramite->strpeticion }}</td>
                        <td>{{ $tramite->strprofesional }}</td>
                        <td>{{ $tramite->strobservacionesAbogado }}</td>
                        <td>{{ $tramite->strobservaciones }}</td>
                        <td>{{ $tramite->email }}</td>
                        <td>{{ $tramite->activo }}</td>
                        <td><a href="{{ route('abogado.edit', $tramite->id) }}  " type="submit"
                                class="btn btn-xs btn-default text-success mx-1 shadow bg-dark" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i> Editar
                            </a>
                            <p></p>
                            <a href="{{ route('tramite.edit', $tramite->id) }}  " type="submit"
                                class="btn btn-xs btn-default text-success mx-1 shadow" title="Cambio Abogado">
                                <i class="fa fa-share"></i> Cambio Abogado
                            </a>
                            {{-- <form action="{{ route('tramite.destroy', $tramite->id) }}" method="POST"
                                class="formEliminar">
                                @csrf
                                @method('delete')
                                {!! $btnDelete !!}
                            </form> --}}
                        </td>
                    </tr>
                @endforeach

            </x-adminlte-datatable>
        </div>

        <!--CRITERIO DE BUSQUEDAD-->
        <div class="card">
            <div class="card-body">
                <h3>Criterio de busquedad</h3>
                <div class="row">
                    <div class="col-3"><x-adminlte-input name="" id="iptfecha" type="text" label="Fecha"
                            placeholder="Fecha" label-class="text-lightblue" value="" data-index="2">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-file text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-3"><x-adminlte-input name="" id="iptcedula" type="text" label="Cedula"
                            placeholder="Cedula" label-class="text-lightblue" value="" data-index="3">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-file text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-3"><x-adminlte-input name="" id="iptnombre" type="text" label="Nombre"
                            placeholder="Nombre" label-class="text-lightblue" value="" data-index="4">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-file text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-3"><x-adminlte-input name="" id="iptabogado" type="text" label="Abogado"
                            placeholder="Abogado" label-class="text-lightblue" value="" data-index="5">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-file text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3"><x-adminlte-input name="" id="ipttramite" type="text" label="Trámite"
                            placeholder="Trámite" label-class="text-lightblue" value="" data-index="6">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-file text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-3"><x-adminlte-input name="" id="iptnacionalidad" type="text"
                            label="Nacionalidad" placeholder="Nacionalidad" label-class="text-lightblue" value=""
                            data-index="7">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-file text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-3"><x-adminlte-input name="" id="iptpoblacion" type="text"
                            label="Población" placeholder="Población" label-class="text-lightblue" value=""
                            data-index="8">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-file text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-3"><x-adminlte-input name="" id="iptobservaciones" type="text"
                            label="Observaciones" placeholder="Observaciones" label-class="text-lightblue"
                            value="" data-index="10">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-file text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table id="table6" class="table table-bordered table-striped tramites_table" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="bg-dark">ID</th>
                        <th class="bg-dark">ARCHIVO</th>
                        <th class="bg-dark">FECHA</th>
                        <th class="bg-dark">CEDULA</th>
                        <th class="bg-dark">NOMBRES</th>
                        <th class="bg-dark">ABOGADO</th>
                        <th class="bg-dark">TRAMITE</th>
                        <th class="bg-dark">NACIONALIDAD</th>
                        <th class="bg-dark">POBLACIÓN</th>
                        <th class="bg-dark">OBSERVACIONES ABOGADO</th>
                        <th class="bg-dark">DIRECTRIZ FILTRO</th>
                        <th class="bg-dark">CORREO</th>
                        <th class="bg-dark">ACCIONES</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    @if (session('message'))
        <script>
            $(document).ready(function() {
                let mensaje = "{{ session('message') }}";
                Swal.fire({
                    title: "Resultado",
                    text: mensaje,
                    icon: "success"
                });
            })
        </script>
    @endif


    <script>
        $(document).ready(function() {

            $('.formEliminar').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Esta seguro?",
                    text: "Vas a eliminar un registro!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            })

            let table = $('#table6').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                "ajax": "{{ url('api/tramites1') }}",
                "ordering": true,
                "order": [
                    [0, 'desc']
                ],
                "columns": [{
                        data: 'id'
                    },
                    {
                        data: 'strArchivo'
                    },
                    {
                        data: 'fecha'
                    },
                    {
                        data: 'intcedula'
                    },
                    {
                        data: 'strnombres'
                    },
                    {
                        data: 'strprofesional'
                    },
                    {
                        data: 'strpeticion'
                    },
                    {
                        data: 'strnacionalidad'
                    },
                    {
                        data: 'poblacion'
                    },
                    {
                        data: 'strobservaciones'
                    },
                    {
                        data: 'strobservacionesAbogado'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'btn1'
                    },
                ],
                "language": {
                    "info": "Mostrando _END_ registros de _TOTAL_ Trámites",
                    "search": "Buscar",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": true,
                    "lengthMenu": 'Mostrar <select>' +
                        '<option value="10">10</option>' +
                        '<option value="20">20</option>' +
                        '<option value="50">50</option>' +
                        '<option value="100">100</option>' +
                        '<option value="200">200</option>' +
                        '<option value="400">400</option>' +
                        '<option value="600">600</option>' +
                        '<option value="800">800</option>' +
                        '<option value="1000">1000</option>' +
                        '</select> registros ___',
                    "loadingRecords": "Cargando registros.....",
                    "processing": "Procesando.....",
                    "emptyTable": "No hay datos....",
                    "zeroRecords": "No hay coincidencias.....",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Trámites",
                    "infoFiltered": "(Filtrado de _MAX_ _total_ Trámites)",
                }
            });

            //Eventos criterios de busquedad
            $('#iptfecha').keyup(function() {
                table.columns($(this).data('index')).search(this.value).draw();
            })
            $('#iptcedula').keyup(function() {
                table.columns($(this).data('index')).search(this.value).draw();
            })
            $('#iptnombre').keyup(function() {
                table.columns($(this).data('index')).search(this.value).draw();
            })
            $('#iptabogado').keyup(function() {
                table.columns($(this).data('index')).search(this.value).draw();
            })

            $('#ipttramite').keyup(function() {
                table.columns($(this).data('index')).search(this.value).draw();
            })
            $('#iptnacionalidad').keyup(function() {
                table.columns($(this).data('index')).search(this.value).draw();
            })
            $('#iptpoblacion').keyup(function() {
                table.columns($(this).data('index')).search(this.value).draw();
            })
            $('#iptobservaciones').keyup(function() {
                table.columns($(this).data('index')).search(this.value).draw();
            })

        });
    </script>
@stop
