<a href="{{ route('clientes.show', $id) }}" class="btn btn-xs btn-default text-success mx-1 shadow" title="Documento">
    <i class="fa fa-lg fa-fw fa-pen"></i> Crear Trámite
</a>


<form action="{{ url('cliente/eliminar', $id) }}" method="get" class="formEliminar">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
        <i class="fa fa-lg fa-fw fa-trash"></i> Eliminar
    </button>
</form>
