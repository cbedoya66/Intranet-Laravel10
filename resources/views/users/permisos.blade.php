@extends('adminlte::page')

@section('title', 'IntranetPersoneria')

@section('content_header')
    <h1>Listado de Permisos</h1>
@stop

@section('content')
    <p>Bienvenido al panel de Permisos</p>
    <?php
        if (session()) {
            if (session('message') == 'ok') { ?>

    <x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Registrado" dismissable>
        Rol guardado con exito!
    </x-adminlte-alert>
    <?php
            }
        }
   ?>
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <x-adminlte-button label="Nuevo" theme="success" icon="fas fa-key" class="float-right" data-toggle="modal"
                    data-target="#modalPurple" />
            </div>
            @php
                $heads = ['ID', 'NOMBRE', ['label' => 'Actions', 'no-export' => true, 'width' => 10]];

                $btnEdit = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar Permiso">
                  <i class="fa fa-lg fa-fw fa-trash"></i>Eliminar Permiso
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
            <x-adminlte-datatable id="table6" head-theme="light" theme="dark" :heads="$heads" :config="$config"
                striped hoverable with-footer footer-theme="light" beautify>

                @foreach ($permisos as $permiso)
                    <tr>
                        <td> {{ $permiso->id }} </td>
                        <td>{{ $permiso->name }}</td>
                        <td>
                            <form action="{{ route('permisos.destroy', $permiso) }}" method="POST" class="formEliminar">
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
    {{-- Themed --}}
    <x-adminlte-modal id="modalPurple" title="Adicionar Permiso" theme="success" icon="fas fa-bolt" size='lg'
        disable-animations>
        <form action="{{ route('permisos.store') }}" method="POST">
            @csrf
            <x-adminlte-input name="name" type="text" label="Permiso" label-class="text-success"
                placeholder="Aqui su permiso...">
                <x-slot name="prependSlot" value="">
                    <div class="input-group-text">
                        <i class="fas fa-envelope text-success"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
            <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save" />
        </form>
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
        })
    </script>
@stop
