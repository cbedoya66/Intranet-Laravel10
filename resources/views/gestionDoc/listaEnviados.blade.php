@extends('adminlte::page')

@section('title', 'IntranetPersoneria')

@section('content_header')
    <h1 style="text-align: center">Rádicados Enviados</h1>
@stop

@php
    //cALCULAR LA FECHA SI EL RADICADO REQUIERE RESPUESTA

    $Segundos = 0;

    //Esta pequeña funcion me crea una fecha de entrega sin sabados ni domingos
    $fechaInicial = date('Y-m-d'); //obtenemos la fecha de hoy, solo para usar como referencia al usuario

    $MaxDias = 10; //Cantidad de dias maximo para la respuesta, este sera util para crear el for

    //Creamos un for desde 0 hasta 10
    for ($i = 0; $i < $MaxDias; $i++) {
        //Acumulamos la cantidad de segundos que tiene un dia en cada vuelta del for
        $Segundos = $Segundos + 86400;

        //Obtenemos el dia de la fecha, aumentando el tiempo en N cantidad de dias, segun la vuelta en la que estemos
        $caduca = date('D', time() + $Segundos);

        $caduca1 = date('Y-m-d', time() + $Segundos);

        //Comparamos si estamos en sabado o domingo, si es asi restamos una vuelta al for, para brincarnos el o los dias...
        if ($caduca == 'Sat') {
            $i--;
        } elseif ($caduca == 'Sun') {
            $i--;
        } else {
            $consulta_fecha = '';
        }
        $consulta_fecha = $caduca1;

        foreach ($festivos as $festivo) {
            if ($festivos == $consulta_fecha) {
                $i--;
            } else {
                //Si no es sabado o domingo, y el for termina y nos muestra la nueva fecha
                $FechaFinal = date('Y-m-d', time() + $Segundos);
            }
        }
    }

@endphp
@section('content')

    <div class="card">
        <div class="card-header">
            <x-adminlte-button label="Nuevo Radicado Enviado" theme="success" icon="fas fa-key" class="float-right"
                data-toggle="modal" data-target="#modalPurpleA" />
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h4>Reporte Consolidado</h4>
                    <form action="{{ url('enviado/reporte') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-3"><x-adminlte-input name="fechaInicial" type="date" label="fecha"
                                    placeholder="Fecha" label-class="text-lightblue" value="<?php echo date('Y-m-d', time()); ?>">
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
            </br>
            <div class="row">
                <div class="col-12">
                    <h4>Reporte por Abogado</h4>
                    <form action="{{ url('enviado/reporteAbogado') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-4"><x-adminlte-input name="fechaInicial" type="date" label="fecha"
                                    placeholder="Fecha" label-class="text-lightblue" value="<?php echo date('Y-m-d', time()); ?>">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                            </div>
                            <div class="col-4"><x-adminlte-input name="fechaFinal" type="date" label="fecha"
                                    placeholder="Fecha" label-class="text-lightblue" value="<?php echo date('Y-m-d', time()); ?>">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                            </div>
                            <div class="col-4">
                                <x-adminlte-select2 name="abogado" id="abogado" label="Profesional"
                                    label-class="text-lightblue" igroup-size="lg"
                                    data-placeholder="Seleccione el Profesional...">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text ">
                                            <i class="fa fa-graduation-cap text-lightblue"></i>
                                        </div>
                                    </x-slot>
                                    <option>Selecciona el Profesional</option>

                                    @foreach ($abogados as $abogado)
                                        <option value="{{ $abogado->profesional }}">{{ $abogado->profesional }}</option>
                                    @endforeach

                                </x-adminlte-select2>

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
                        placeholder="Fecha" label-class="text-lightblue" value="" data-index="2">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-3"><x-adminlte-input name="" id="iptdependencia" type="text" label="Dependencia"
                        placeholder="Dependencia" label-class="text-lightblue" value="" data-index="3">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-3"><x-adminlte-input name="" id="iptencargado" type="text" label="Encargado"
                        placeholder="Encargado" label-class="text-lightblue" value="" data-index="4">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-3"><x-adminlte-input name="" id="iptasunto" type="text" label="Asunto"
                        placeholder="Asunto" label-class="text-lightblue" value="" data-index="6">
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

    <p>Bienvenido al panel de Rádicados Enviados</p>
    <div class="card">
        <div class="card-body">
            <table id="table6" class="table table-bordered table-striped tramites_table" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="bg-dark " style=" width:10%;">ID</th>
                        <th class="bg-dark " style=" width:10%;">Rad.Personería</th>
                        <th class="bg-dark " style=" width:10%;">FECHA</th>
                        <th class="bg-dark " style=" width:10%;">DEPENDENCIA</th>
                        <th class="bg-dark " style=" width:10%;">ENCARGADO</th>
                        <th class="bg-dark " style=" width:10%;">ABOGADO</th>
                        <th class="bg-dark " style=" width:10%;">ASUNTO</th>
                        <th class="bg-dark">RAD.DOC.REC</th>
                        <th class="bg-dark">REQUIERE RPTA</th>
                        <th class="bg-dark">RAD.RPTA</th>
                        <th class="bg-dark">FECHA RPTA</th>
                        <th class="bg-dark">ARCHIVO</th>
                        <th class="bg-dark">RAD.RELACIONADO</th>
                        <th class="bg-dark">COD.BARRAS</th>
                        <th class="bg-dark">OPCIONES</th>

                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!--ADICIONAR RADICADOS -->
    <x-adminlte-modal id="modalPurpleA" title="Adicionar Radicado Enviado" theme="success" icon="fas fa-bolt"
        size='lg' disable-animations>
        <form action="{{ route('enviado.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4"><x-adminlte-input name="fecha" type="date" label="fecha" placeholder="Fecha"
                        label-class="text-lightblue" value="<?php echo date('Y-m-d', time()); ?>">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-calendar text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-4"><x-adminlte-input name="nroRadicado" id="nroRadicado" type="text"
                        label="Nro.Radicado Personería" placeholder="Nro.Radicado Personería"
                        label-class="text-lightblue" value="{{ $nroRadicado + 1 }}" readonly>
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-4"><x-adminlte-input name="nroRadInicial" id="nroRadInicial" type="text"
                        label="Nro.Radicado Relacionado" placeholder="Nro.Radicado Relacionado"
                        label-class="text-lightblue" value="">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
            </div>
            {{-- With prepend slot --}}

            <div class="row">
                <div class="col-2"><x-adminlte-input name="nroRadDocR" id="nroRadDocR" type="text"
                        label="Rad.Dependencia" placeholder="Rad.Dependencia" label-class="text-lightblue"
                        value="">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-5"><x-adminlte-input name="dependencia" id="dependencia" type="text"
                        label="Dependencia" placeholder="Dependencia" label-class="text-lightblue" value="">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-home text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-5"><x-adminlte-input name="encargado" id="encargado" type="text" label="Encargado"
                        placeholder="Encargado" label-class="text-lightblue" value="">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-home text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <x-adminlte-textarea name="asunto" id="asunto" label="Asunto" rows=5
                        label-class="text-lightblue" igroup-size="sm" placeholder="Asunto">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                            </div>
                        </x-slot>

                    </x-adminlte-textarea>

                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <x-adminlte-select2 name="strprofesional" id="strprofesional" label="Profesional"
                        label-class="text-lightblue" igroup-size="lg" data-placeholder="Seleccione el Profesional...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text ">
                                <i class="fa fa-graduation-cap text-lightblue"></i>
                            </div>
                        </x-slot>
                        <option>Selecciona el Profesional</option>

                        @foreach ($abogados as $abogado)
                            <option value="{{ $abogado->profesional }}">{{ $abogado->profesional }}</option>
                        @endforeach

                    </x-adminlte-select2>

                </div>
                <div class="col-4"><x-adminlte-input name="anexo" id="anexo" type="text" label="Anexo"
                        placeholder="Anexo" label-class="text-lightblue" value="">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-plus-circle text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
            </div>


            <div class="row">
                <div class="col-4">
                    <x-adminlte-select2 name="respuesta" id="respuesta" label="Requiere Respuesta"
                        label-class="text-lightblue" igroup-size="lg" data-placeholder="Requiere Respuesta"
                        onchange="selecOp()">
                        <x-slot name="prependSlot">
                            <div class="input-group-text ">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                        <option>Selecciona...</option>
                        <option value="1">NO</option>
                        <option value="2">SI</option>
                        <option value="3">RESUELTO</option>
                    </x-adminlte-select2>

                </div>
                <div class="col-4">
                    <x-adminlte-input name="radRespuesta" id="radRespuesta" type="text" label="Radicado Respuesta"
                        placeholder="Radicado Respuesta" label-class="text-lightblue">
                        <x-slot name="prependSlot" value="">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                </div>
                <div class="col-4">
                    <x-adminlte-input name="fecRespuesta" id="fecRespuesta" type="text" label="Fecha Respuesta"
                        placeholder="Fecha Respuesta" label-class="text-lightblue" value="">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-calendar-check text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                </div>

            </div>
            <div class="row">
                <div class="col-6">
                    <x-adminlte-input name="codbarenv" id="codbarenv" type="text" label="Código de barras"
                        placeholder="Código de barras" label-class="text-lightblue"
                        value="<?php echo date('YmdHi'); ?>{{ $nroRadicado + 1 }}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-barcode text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                </div>
                <div class="col-6">

                    <x-adminlte-input accept="application/pdf" name="strArchivo" type="file" label="Archivo"
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
            <x-adminlte-button class="btn-flat" type="submit" label="Guardar Radicado Recibido" theme="success"
                icon="fas fa-lg fa-save" />
        </form>
        </br>
        <div class="card">
            <div class="card-body">
                <form action="{{ url('enviado/codBarras') }}" method="post" target="_blank">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <x-adminlte-input name="codbarenv" id="codbarenv" type="text"
                                placeholder="Código de barras" label-class="text-lightblue"
                                value="<?php echo date('YmdHi'); ?>{{ $nroRadicado + 1 }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fa fa-barcode text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                        <div class="col-6">
                            <x-adminlte-button class="btn-flat" type="submit" label="Imprimir Código Barras"
                                theme="success" icon="fa fa-print" />
                        </div>
                    </div>

                </form>
            </div>

        </div>


    </x-adminlte-modal>


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

    <!--Fecha Semaforo-->
    <script>
        function selecOp() {
            var op = document.getElementById("respuesta");
            var tt = document.getElementById("fecRespuesta");
            if (op.selectedIndex == 1) tt.value = "";
            if (op.selectedIndex == 2) tt.value = "<?php echo $FechaFinal; ?>";
            if (op.selectedIndex == 3) tt.value = "";


        }

        function selecOpE() {
            var op = document.getElementById("respuestaE");
            var tt = document.getElementById("fecRespuestaE");
            if (op.selectedIndex == 0) tt.value = "";
            if (op.selectedIndex == 1) tt.value = "<?php echo $fechaInicial; ?>";
            if (op.selectedIndex == 2) tt.value = "<?php echo $FechaFinal; ?>";
            if (op.selectedIndex == 3) tt.value = "<?php echo $fechaInicial; ?>";

        }
    </script>


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
                    [1, 'desc']
                ],
                "ajax": "{{ url('api/enviados') }}",
                "columns": [{
                        data: 'id'
                    }, {
                        data: 'nroRadicado'
                    },
                    {
                        data: 'fecha'
                    },
                    {
                        data: 'dependencia'
                    },
                    {
                        data: 'Encargado'
                    },
                    {
                        data: 'nroRadDocR'
                    },
                    {
                        data: 'asunto'
                    },
                    {
                        data: 'rRespuesta'
                    },
                    {
                        data: 'radRespuesta'
                    },
                    {
                        data: 'fecRespuesta'
                    },
                    {
                        data: 'abogado'
                    },
                    {
                        data: 'strArchivo'
                    },
                    {
                        data: 'nroRadInicial'
                    },
                    {
                        data: 'codbarenv'
                    },
                    {
                        data: 'btnE'
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
            $('#iptdependencia').keyup(function() {
                table.columns($(this).data('index')).search(this.value).draw();
            })
            $('#iptencargado').keyup(function() {
                table.columns($(this).data('index')).search(this.value).draw();
            })
            $('#iptasunto').keyup(function() {
                table.columns($(this).data('index')).search(this.value).draw();
            })
        });
    </script>

@stop
