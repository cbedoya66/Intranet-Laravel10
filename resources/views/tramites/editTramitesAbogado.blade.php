@extends('adminlte::page')

@section('title', 'IntranetPersoneria')

@section('content_header')
    <h1>ADMINISTRACIÓN DE TRÁMITES</h1>
@stop

@section('content')
    <p>Actualización del Trámite.</p>

    <div class="card">

        <div class="card-body">
            <form action="{{ route('abogado.update', $tramites) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-2"><x-adminlte-input name="id" type="text" label="Id"
                            label-class="text-lightblue" value="{{ $tramites->id }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-address-card text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-2"><x-adminlte-input name="fecha" type="date" label="fecha"
                            label-class="text-lightblue" value="{{ $tramites->fecha }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-3"><x-adminlte-input name="intcedula" type="text" label="Cédula"
                            label-class="text-lightblue" value="{{ $tramites->intcedula }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-id-card text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input></div>
                    <div class="col-5"><x-adminlte-input name="strnombres" type="text" label="Nombre"
                            placeholder="Nombre" label-class="text-lightblue" value="{{ $tramites->strnombres }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input></div>
                </div>
                {{-- With prepend slot --}}

                <div class="row">
                    <div class="col-4"><x-adminlte-input name="strdireccion" type="text" label="Direccion"
                            label-class="text-lightblue" value="{{ $tramites->strdireccion }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-home text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-3"><x-adminlte-input name="strsector" type="text" label="Sector"
                            label-class="text-lightblue" value="{{ $tramites->strsector }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-map-marker text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input></div>
                    <div class="col-2"><x-adminlte-input name="strtelefono" type="text" label="Teléfono"
                            label-class="text-lightblue" value="{{ $tramites->strtelefono }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-phone text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input></div>
                    <div class="col-3"><x-adminlte-select2 name="strnacionalidad" label="Nacionalidad"
                            label-class="text-lightblue" igroup-size="lg">
                            <x-slot name="prependSlot">
                                <div class="input-group-text ">
                                    <i class="fa fa-flag text-lightblue"></i>
                                </div>
                            </x-slot>
                            <option value="{{ $tramites->strnacionalidad }}">{{ $tramites->strnacionalidad }}</option>
                            <option>Seleccione la Nacionalidad...</option>
                            <option>Colombiano</option>
                            <option>Venezolano</option>
                        </x-adminlte-select2></div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <x-adminlte-select2 name="strpeticion" label="Petición" label-class="text-lightblue"
                            igroup-size="lg">
                            <x-slot name="prependSlot">
                                <div class="input-group-text ">
                                    <i class="fa fa-file text-lightblue"></i>
                                </div>
                            </x-slot>
                            <option value="{{ $tramites->strpeticion }}">{{ $tramites->strpeticion }}</option>
                            @foreach ($peticiones as $peticion)
                                <option value="{{ $peticion->peticiones }}">{{ $peticion->peticiones }}</option>
                            @endforeach
                        </x-adminlte-select2>

                    </div>
                    <div class="col-3">
                        <x-adminlte-select2 name="strAsistencia" label="Asistencia" label-class="text-lightblue"
                            igroup-size="lg">
                            <x-slot name="prependSlot">
                                <div class="input-group-text ">
                                    <i class="fa fa-file text-lightblue"></i>
                                </div>
                            </x-slot>
                            <option value="NO">SELECCIONA LA ASISTENCIA...</option>
                            <option value="ASISTENCIAL">ASISTENCIAL</option>
                            <option value="VIRTUAL">VIRTUAL</option>

                        </x-adminlte-select2>
                    </div>
                    <div class="col-5">
                        <x-adminlte-select2 name="strprofesional" label="Profesional" label-class="text-lightblue"
                            igroup-size="lg">
                            <x-slot name="prependSlot">
                                <div class="input-group-text ">
                                    <i class="fa fa-graduation-cap text-lightblue"></i>
                                </div>
                            </x-slot>
                            <option value="{{ $tramites->strprofesional }}">{{ $tramites->strprofesional }}</option>
                            @foreach ($abogados as $abogado)
                                <option value="{{ $abogado->profesional }}">{{ $abogado->profesional }}</option>
                            @endforeach
                        </x-adminlte-select2>

                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <x-adminlte-input name="entidad" type="text" label="Entidad" label-class="text-lightblue"
                            value="{{ $tramites->entidad }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-heartbeat text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                    </div>
                    <div class="col-1">
                        <x-adminlte-input name="edad" type="text" label="Edad" label-class="text-lightblue"
                            value="{{ $tramites->edad }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar-check text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                    </div>
                    <div class="col-4">
                        <x-adminlte-input name="email" type="email" label="Email" label-class="text-lightblue"
                            value="{{ $tramites->email }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-4">
                        <x-adminlte-select2 name="poblacion" label="Población" label-class="text-lightblue"
                            igroup-size="lg">
                            <x-slot name="prependSlot">
                                <div class="input-group-text ">
                                    <i class="fas fa-users text-lightblue"></i>
                                </div>
                            </x-slot>
                            <option value="{{ $tramites->poblacion }}">{{ $tramites->poblacion }}</option>
                            @foreach ($poblaciones as $poblacion)
                                <option value="{{ $poblacion->descripcion }}">{{ $poblacion->descripcion }}</option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>
                </div>


                <div class="row">
                    <div class="col-6">
                        <x-adminlte-textarea name="strobservacionesAbogado" label="Directriz Filtro" rows=5
                            label-class="text-lightblue" igroup-size="sm" placeholder="Observaciones..." readonly>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                                </div>
                            </x-slot>
                            {{ $tramites->strobservacionesAbogado }}
                        </x-adminlte-textarea>

                    </div>
                    <div class="col-6">
                        <x-adminlte-textarea name="strobservaciones" label="Observaciones Abogado" rows=5
                            label-class="text-lightblue" igroup-size="sm" placeholder="Observaciones..."
                            value="{{ old('strobservaciones') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                                </div>
                            </x-slot>
                            {{ $tramites->strobservaciones }}
                        </x-adminlte-textarea>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">

                        <x-adminlte-input accept="application/pdf" name="strArchivo" type="file" label="Archivo"
                            label-class="text-lightblue" value="{{ $tramites->strArchivo }}">
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

    @if (session('message'))
        <script>
            $(document).ready(function() {
                let mensaje = "{{ session('message') }}";
                /* Swal.fire({
                    title: "Resultado",
                    text: mensaje,
                    icon: "success"
                }); */

                Swal.fire({
                    icon: "question",
                    title: "Oops...",
                    text: mensaje,
                });


            })
        </script>
    @endif

@stop
