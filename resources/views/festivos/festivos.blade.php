@extends('adminlte::page')

@section('title', 'Festivos')

@section('content_header')
    <h1>Listado de días festivos del año</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h4>Adicionar Festivo</h4>
            <form action="{{ route('festivos.store') }}" method="post" id="form-eliminar">
                @csrf
                <div class="row">
                    <div class="col-6"><x-adminlte-input name="fecha" type="date" label="fecha" placeholder="Fecha"
                            label-class="text-lightblue" value="<?php echo date('Y-m-d', time()); ?>">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>

                </div>
                <x-adminlte-button class="btn-flat" type="submit" label="Adicionar Festivo" theme="success"
                    icon="fa fa-plus-circle" />
            </form>


        </div>

    </div>
    <p>Bienvenido al panel de Festivos del año</p>
    <div class="card">
        <div class="card-body">
            @php
                $heads = ['ID', 'Fecha', ['label' => 'Opciones', 'no-export' => true, 'width' => 10]];

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

                @foreach ($festivos as $festivo)
                    <tr>
                        <td>{{ (int) $festivo->id }} </td>
                        <td>{{ $festivo->fecha }}</td>
                        <td>
                            <form action="{{ route('festivos.destroy', $festivo->id) }}" method="POST"
                                class="formEliminar">
                                @csrf
                                @method('delete')
                                {!! $btnDelete !!}
                            </form>
                        </td>
                    </tr>
                @endforeach

            </x-adminlte-datatable>
        </div>


    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


@stop
