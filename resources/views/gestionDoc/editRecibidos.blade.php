@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>RADICADOS RECIBIDOS</h1>
@stop

@section('content')
    <p>Actualización de Radicados Recibidos</p>

    <div class="card">

        <div class="card-body">
            <form action="{{ route('recibido.update', $radRecibidosE) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-4"><x-adminlte-input name="fecha" type="date" label="fecha" placeholder="Fecha"
                            label-class="text-lightblue" value="{{ $radRecibidosE->fecha }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input></div>
                    <div class="col-4"><x-adminlte-input name="nroRadicado" id="nroRadicado" type="text"
                            label="Nro.Radicado Personería" placeholder="Nro.Radicado Personería"
                            label-class="text-lightblue" value="{{ $radRecibidosE->nroRadicado }}" readonly>
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-id-card text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input></div>
                    <div class="col-4"><x-adminlte-input name="nroRadInicial" id="nroRadInicial" type="text"
                            label="Nro.Radicado Relacionado" placeholder="Nro.Radicado Relacionado"
                            label-class="text-lightblue" value="{{ $radRecibidosE->nroRadInicial }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input></div>
                </div>
                {{-- With prepend slot --}}

                <div class="row">
                    <div class="col-2"><x-adminlte-input name="nroRadDocR" id="nroRadDocR" type="text"
                            label="Rad.Dependencia" placeholder="Rad.Dependencia" label-class="text-lightblue"
                            value="{{ $radRecibidosE->nroRadDocR }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-map-marker text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-5"><x-adminlte-input name="dependencia" id="dependencia" type="text"
                            label="Dependencia" placeholder="Dependencia" label-class="text-lightblue"
                            value="{{ $radRecibidosE->dependencia }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-home text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-5"><x-adminlte-input name="encargado" id="encargado" type="text" label="Encargado"
                            placeholder="Encargado" label-class="text-lightblue" value="{{ $radRecibidosE->encargado }}">
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
                            {{ $radRecibidosE->asunto }}
                        </x-adminlte-textarea>

                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <x-adminlte-select2 name="abogado" id="abogado" label="Profesional" label-class="text-lightblue"
                            igroup-size="lg" data-placeholder="Seleccione el Profesional...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text ">
                                    <i class="fa fa-graduation-cap text-lightblue"></i>
                                </div>
                            </x-slot>
                            <option>{{ $radRecibidosE->abogado }}</option>
                            <option>Selecciona el Profesional</option>

                            @foreach ($abogados as $abogado)
                                <option value="{{ $abogado->profesional }}">{{ $abogado->profesional }}</option>
                            @endforeach

                        </x-adminlte-select2>

                    </div>
                    <div class="col-4"><x-adminlte-input name="anexo" id="anexo" type="text" label="Anexo"
                            placeholder="Anexo" label-class="text-lightblue" value="{{ $radRecibidosE->anexo }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-phone text-lightblue"></i>
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
                            <option>{{ $radRecibidosE->rRespuesta }}</option>
                            <option>Selecciona...</option>
                            <option value="1">NO</option>
                            <option value="2">SI</option>
                            <option value="3">RESUELTO</option>
                        </x-adminlte-select2>

                    </div>
                    <div class="col-4">
                        <x-adminlte-input name="radRespuesta" id="radRespuesta" type="text"
                            label="Radicado Respuesta" placeholder="Radicado Respuesta" label-class="text-lightblue">
                            <x-slot name="prependSlot" value="{{ $radRecibidosE->radRespuesta }}">
                                <div class="input-group-text">
                                    <i class="fa fa-heartbeat text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                    </div>
                    <div class="col-4">
                        <x-adminlte-input name="fecRespuesta" id="fecRespuesta" type="text" label="Fecha Respuesta"
                            placeholder="Fecha Respuesta" label-class="text-lightblue"
                            value="{{ $radRecibidosE->fecRespuesta }}">
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
                        <x-adminlte-input name="codbarrec" id="codbarrec" type="text" label="Código de barras"
                            placeholder="Código de barras" label-class="text-lightblue"
                            value="{{ $radRecibidosE->codbarrec }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar-check text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                    </div>
                    <div class="col-6">

                        <x-adminlte-input accept="application/pdf" name="strArchivo" type="file" label="Archivo"
                            label-class="text-lightblue" value="{{ $radRecibidosE->strArchivo }}">
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

@stop
