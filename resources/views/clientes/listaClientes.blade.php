@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de Usuarios</h1>
@stop

@section('content')
    <p>Bienvenido al panel de Usuarios</p>
    <div class="card">

        <div class="card-header">
            <x-adminlte-button label="Trámite para
                cliente nuevo" theme="success" icon="fas fa-key"
                class="float-right" data-toggle="modal" data-target="#modalPurpleA" />
        </div>
        <div class="card-body">

            <table id="example1" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        {{-- <th class="bg-dark">ID</th> --}}
                        <th width="10" class="bg-dark">CEDULA</th>
                        <th class="bg-dark">NOMBRES</th>
                        <th class="bg-dark">TELEFONO</th>
                        <th class="bg-dark">DIRECCIÓN</th>
                        <th class="bg-dark">SECTOR</th>
                        <th class="bg-dark">NACIONALIDAD</th>
                        <th class="bg-dark" width="20">EMAIL</th>
                        <th class="bg-dark">POBLACIÓN</th>
                        <th class="bg-dark">EDAD</th>
                        <th class="bg-dark">ACCIONES</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>

    <!--ADICIONAR CLIENTE NUEVO -->
    <x-adminlte-modal id="modalPurpleA" title="Adicionar Cliente Nuevo" theme="success" icon="fas fa-bolt" size='lg'
        disable-animations>
        <h4>Ingrese la información para el Cliente nuevo.</h4>


        <div class="card">

            <div class="card-body">
                <form action="{{ route('clientes.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-3"><x-adminlte-input name="fecha" type="date" label="fecha"
                                placeholder="Fecha" label-class="text-lightblue" value="<?php echo date('Y-m-d', time()); ?>">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fa fa-calendar text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input></div>
                    </div>
                    <div class="row">
                        <div class="col-3"><x-adminlte-input name="intcedula" id="intcedula" type="text" label="Cédula"
                                placeholder="Cédula" label-class="text-lightblue" value="">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fa fa-id-card text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input></div>
                        <div class="col-9"><x-adminlte-input name="strnombres" id="strnombres" type="text"
                                label="Nombre" placeholder="Nombre" label-class="text-lightblue" value="">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-user text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input></div>
                    </div>
                    {{-- With prepend slot --}}

                    <div class="row">
                        <div class="col-4"><x-adminlte-input name="strdireccion" id="strdireccion" type="text"
                                label="Direccion" placeholder="Dirección" label-class="text-lightblue" value="">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fa fa-home text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input></div>
                        <div class="col-5"><x-adminlte-input name="strsector" id="strsector" type="text" label="Sector"
                                placeholder="Sector" label-class="text-lightblue" value="">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fa fa-map-marker text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                        <div class="col-3"><x-adminlte-input name="strtelefono" id="strtelefono" type="text"
                                label="Teléfono" placeholder="Teléfono" label-class="text-lightblue" value="">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fa fa-phone text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-6">
                            <x-adminlte-input name="email" id="email" type="email" label="Email"
                                placeholder="Email" label-class="text-lightblue" value="">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>

                        <div class="col-2">
                            <x-adminlte-input name="edad" id="edad" type="text" label="Edad"
                                placeholder="Edad" label-class="text-lightblue" value="">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fa fa-calendar-check text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>

                        </div>
                        <div class="col-4">
                            <x-adminlte-input name="entidad" id="entidad" type="text" label="Entidad"
                                placeholder="Entidad" label-class="text-lightblue">
                                <x-slot name="prependSlot" value="">
                                    <div class="input-group-text">
                                        <i class="fa fa-heartbeat text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <x-adminlte-select2 name="strpeticion" id="strpeticion" label="Petición"
                                label-class="text-lightblue" igroup-size="lg"
                                data-placeholder="Seleccione la Peticiónn...">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text ">
                                        <i class="fa fa-file text-lightblue"></i>
                                    </div>
                                </x-slot>

                                @foreach ($peticiones as $peticion)
                                    <option value="{{ $peticion->peticiones }}">{{ $peticion->peticiones }}</option>
                                @endforeach
                            </x-adminlte-select2>

                        </div>
                        <div class="col-6">
                            <x-adminlte-select2 name="strprofesional" id="strprofesional" label="Profesional"
                                label-class="text-lightblue" igroup-size="lg"
                                data-placeholder="Seleccione el Profesional...">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text ">
                                        <i class="fa fa-graduation-cap text-lightblue"></i>
                                    </div>
                                </x-slot>
                                @foreach ($abogados as $abogado)
                                    <option value="{{ $abogado->profesional }}">{{ $abogado->profesional }}</option>
                                @endforeach

                            </x-adminlte-select2>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-5"><x-adminlte-select2 name="strnacionalidad" id="strnacionalidad"
                                label="Nacionalidad" label-class="text-lightblue" igroup-size="lg"
                                data-placeholder="Seleccione la Nacionalidad...">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text ">
                                        <i class="fa fa-flag text-lightblue"></i>
                                    </div>
                                </x-slot>
                                <option>-Sin Nacionalidad</option>
                                <option>Colombiano</option>
                                <option>Venezolano</option>
                            </x-adminlte-select2>
                        </div>


                        <div class="col-7">
                            <x-adminlte-select2 name="poblacion" id="poblacion" label="Población"
                                label-class="text-lightblue" igroup-size="lg"
                                data-placeholder="Seleccione la Población...">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text ">
                                        <i class="fas fa-users text-lightblue"></i>
                                    </div>
                                </x-slot>

                                @foreach ($poblaciones as $poblacion)
                                    <option value="{{ $poblacion->descripcion }}">{{ $poblacion->descripcion }}</option>
                                @endforeach
                            </x-adminlte-select2>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-9">
                            <x-adminlte-textarea name="strobservaciones" id="strobservaciones" label="Observaciones"
                                rows=5 label-class="text-lightblue" igroup-size="sm" placeholder="Observaciones...">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-dark">
                                        <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                                    </div>
                                </x-slot>

                            </x-adminlte-textarea>

                        </div>

                    </div>

                    <x-adminlte-button class="btn-flat" type="submit" label="Guardar Trámite" theme="success"
                        icon="fas fa-lg fa-save" />
                </form>
            </div>
        </div>
    </x-adminlte-modal>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
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

            $('#example1').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                "ordering": true,
                "order": [
                    [1, 'asc']
                ],
                "ajax": "{{ url('api/clientes') }}",
                "columns": [
                    /* {
                        data: 'id'
                    }, */
                    {
                        data: 'id'
                    },
                    {
                        data: 'strnombres'
                    },
                    {
                        data: 'strtelefono'
                    },
                    {
                        data: 'strdireccion'
                    },
                    {
                        data: 'strsector'
                    },
                    {
                        data: 'strnacionalidad'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'poblacion'
                    },
                    {
                        data: 'edad'
                    },
                    {
                        data: 'btn2'
                    }
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
                    "lengthChange": true,
                    "autoWidth": true,
                    "lengthMenu": 'Mostrar <select>' +
                        '<option value="50">50</option>' +
                        '<option value="100">100</option>' +
                        '<option value="500">500</option>' +
                        '<option value="1000">1000</option>' +
                        '<option value="5000">5000</option>' +
                        '</select> registros____',
                    "loadingRecords": "Cargando registros.....",
                    "processing": "Procesando.....",
                    "emptyTable": "No hay datos....",
                    "zeroRecords": "No hay coincidencias.....",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Trámites",
                    "infoFiltered": "(Filtrado de _MAX_ _total_ Trámites)",
                }
            })
        });
    </script>
@stop
