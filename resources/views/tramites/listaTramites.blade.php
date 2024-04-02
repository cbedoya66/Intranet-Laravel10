@extends('adminlte::page')

@section('title', 'IntranetPersoneria')

@section('content_header')
    <h1>Listado de Trámites</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h4>Reporte Consolidado de Trámites por Usuario</h4>
                    <form action="{{ url('tramite/reporteU') }}" method="post" id="form-eliminar">
                        @csrf
                        <div class="row">
                            <div class="col-6"><x-adminlte-input name="fechaInicial" type="date" label="fecha"
                                    placeholder="Fecha" label-class="text-lightblue" value="<?php echo date('Y-m-d', time()); ?>">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                            </div>
                            <div class="col-6"><x-adminlte-input name="fechaFinal" type="date" label="fecha"
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
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h4>Reporte Consolidado por Población</h4>
                    <form action="{{ url('tramite/reporteP') }}" method="post" id="form-eliminar">
                        @csrf
                        <div class="row">
                            <div class="col-6"><x-adminlte-input name="fechaInicial" type="date" label="fecha"
                                    placeholder="Fecha" label-class="text-lightblue" value="<?php echo date('Y-m-d', time()); ?>">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                            </div>
                            <div class="col-6"><x-adminlte-input name="fechaFinal" type="date" label="fecha"
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
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h4>Reporte Consolidado Encuestas</h4>
                    <form action="{{ url('tramite/reporteE') }}" method="post" id="form-eliminar">
                        @csrf
                        <div class="row">
                            <div class="col-6"><x-adminlte-input name="fechaInicial" type="date" label="fecha"
                                    placeholder="Fecha" label-class="text-lightblue" value="<?php echo date('Y-m-d', time()); ?>">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                            </div>
                            <div class="col-6"><x-adminlte-input name="fechaFinal" type="date" label="fecha"
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
        </div>
    </div>


    <!--CRITERIO DE BUSQUEDAD-->
    <div class="card">
        <div class="card-body">
            <h3>Criterio de busquedad</h3>
            <div class="row">
                <div class="col-3"><x-adminlte-input name="" id="iptfecha" type="text" label="Fecha"
                        placeholder="Fecha" label-class="text-lightblue" value="" data-index="1">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-3"><x-adminlte-input name="" id="iptcedula" type="text" label="Cedula"
                        placeholder="Cedula" label-class="text-lightblue" value="" data-index="2">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-3"><x-adminlte-input name="" id="iptnombre" type="text" label="Nombre"
                        placeholder="Nombre" label-class="text-lightblue" value="" data-index="3">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-3"><x-adminlte-input name="" id="iptabogado" type="text" label="Abogado"
                        placeholder="Abogado" label-class="text-lightblue" value="" data-index="4">
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
                        placeholder="Trámite" label-class="text-lightblue" value="" data-index="5">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-3"><x-adminlte-input name="" id="iptnacionalidad" type="text"
                        label="Nacionalidad" placeholder="Nacionalidad" label-class="text-lightblue" value=""
                        data-index="6">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-3"><x-adminlte-input name="" id="iptpoblacion" type="text" label="Población"
                        placeholder="Población" label-class="text-lightblue" value="" data-index="7">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-3"><x-adminlte-input name="" id="iptobservaciones" type="text"
                        label="Observaciones" placeholder="Observaciones" label-class="text-lightblue" value=""
                        data-index="8">
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
    <p>Bienvenido al panel de Trámites</p>
    <div class="card">
        <div class="card-body">

            <table id="table6" class="table table-bordered table-striped tramites_table" style="width: 100%;">
                <thead>
                    <tr>
                        <th width="10" class="bg-dark">ID</th>
                        <th class="bg-dark">FECHA</th>
                        <th class="bg-dark">CEDULA</th>
                        <th class="bg-dark">NOMBRES</th>
                        <th class="bg-dark">ABOGADO</th>
                        <th class="bg-dark">TRAMITE</th>
                        <th class="bg-dark">NACIONALIDAD</th>
                        <th class="bg-dark">POBLACIÓN</th>
                        <th class="bg-dark">OBSERVACIONES</th>
                        <th class="bg-dark">OBSERVACIONES FILTRO</th>
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



    <script>
        $('#formEliminar').on('click', function(e) {
            console.log('hola');
            alert('entre aqui');
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

        $(document).ready(function() {


            let table = $('#table6').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                "ordering": true,
                "order": [
                    [0, 'desc']
                ],
                "ajax": "{{ url('api/tramites') }}",
                "columns": [{
                        data: 'id'
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
                        data: 'btn'
                    },
                ],
                "language": {
                    "info": "Mostrando  _END_ registros de _TOTAL_ Trámites",
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
                        '<option value="2000">2000</option>' +
                        '<option value="5000">5000</option>' +
                        '</select> registros____    ',
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
