<div class="card">
    <div class="col-4"><a href="{{ route('tramite.edit', $id) }}" class="btn btn-xs btn-default text-success mx-1 shadow"
            title="Documento">
            <i class="fa fa-lg fa-fw fa-pen"></i> Editar
        </a>
    </div>
    <div class="col-4">
        <form action="{{ url('tramite/eliminar', $id) }}" method="get" class="formEliminar">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"
                style="margin: auto">
                <i class="fa fa-lg fa-fw fa-trash"></i> Eliminar
            </button>
        </form>
    </div>
    <div class="col-4"><a href="{{ route('encuestas.show', $id) }}"
            class="btn btn-xs btn-default text-success mx-1 shadow" title="Documento">
            <i class="fa fa-lg fa-fw fa-pen"></i> Encuesta
        </a>
    </div>
</div>


<script>
    $('.formEliminar').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: "Esta seguro?",
            text: "Vas a eliminar un registro!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Eliminalo!"
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
    })
</script>
