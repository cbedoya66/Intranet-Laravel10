@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ADMINISTRACIÓN DE TRÁMITES</h1>
@stop

@section('content')
    <h4>Ingrese la información para el Trámite del usuario nuevo.</h4>
    <?php
        if (session()) {
            if (session('message') == 'ok') { ?>

    <x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Registrado" dismissable>
        Tramite guardado con exito!
    </x-adminlte-alert>
    <?php
            }
        }
   ?>

    <div class="card">

        <div class="card-body">
            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-3"><x-adminlte-input name="fecha" type="date" label="fecha" placeholder="Fecha"
                            label-class="text-lightblue" value="<?php echo date('Y-m-d', time()); ?>">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input></div>
                    <div class="col-3"><x-adminlte-input name="intcedula" id="intcedula" type="text" label="Cédula"
                            placeholder="Cédula" label-class="text-lightblue" value="">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-id-card text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input></div>
                    <div class="col-6"><x-adminlte-input name="strnombres" id="strnombres" type="text" label="Nombre"
                            placeholder="Nombre" label-class="text-lightblue" value="">
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
                    <div class="col-3"><x-adminlte-input name="strsector" id="strsector" type="text" label="Sector"
                            placeholder="Sector" label-class="text-lightblue" value="">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-map-marker text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input></div>
                    <div class="col-2"><x-adminlte-input name="strtelefono" id="strtelefono" type="text"
                            label="Teléfono" placeholder="Teléfono" label-class="text-lightblue" value="">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-phone text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input></div>
                    <div class="col-3"><x-adminlte-select2 name="strnacionalidad" id="strnacionalidad" label="Nacionalidad"
                            label-class="text-lightblue" igroup-size="lg" data-placeholder="Seleccione la Nacionalidad...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text ">
                                    <i class="fa fa-flag text-lightblue"></i>
                                </div>
                            </x-slot>
                            <option>Selecciona la Nacionalidad</option>
                            <option>Colombiano</option>
                            <option>Venezolano</option>
                        </x-adminlte-select2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <x-adminlte-select2 name="strpeticion" id="strpeticion" label="Petición"
                            label-class="text-lightblue" igroup-size="lg" data-placeholder="Seleccione la Peticiónn...">
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
                    <div class="col-4">
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
                    <div class="col-3">
                        <x-adminlte-input name="entidad" id="entidad" type="text" label="Entidad"
                            placeholder="Entidad" label-class="text-lightblue">
                            <x-slot name="prependSlot" value="">
                                <div class="input-group-text">
                                    <i class="fa fa-heartbeat text-lightblue"></i>
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
                </div>


                <div class="row">
                    <div class="col-6">
                        <x-adminlte-textarea name="strobservaciones" id="strobservaciones" label="Observaciones" rows=5
                            label-class="text-lightblue" igroup-size="sm" placeholder="Observaciones...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                                </div>
                            </x-slot>

                        </x-adminlte-textarea>

                    </div>
                    <div class="col-3">
                        <x-adminlte-input name="email" id="email" type="email" label="Email"
                            placeholder="Email" label-class="text-lightblue" value="">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                    </div>
                    <div class="col-3">
                        <x-adminlte-select2 name="poblacion" id="poblacion" label="Población"
                            label-class="text-lightblue" igroup-size="lg" data-placeholder="Seleccione la Población...">
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
                <x-adminlte-button class="btn-flat" type="submit" label="Guardar Trámite" theme="success"
                    icon="fas fa-lg fa-save" />

            </form>
        </div>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop
