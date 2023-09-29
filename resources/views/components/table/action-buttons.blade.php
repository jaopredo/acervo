<div class="d-flex align-items-center justify-content-center gap-2">
    <div class="action position-relative">
        <x-form-button
            :action="route($route . '.destroy', $id)"
            method="DELETE"
            class="d-inline btn btn-danger d-flex align-items-center justify-content-center"
        >
            <x-bi-trash-fill />
        </x-form-button>

        <span class="action-button-label position-absolute">DELETAR</span>
    </div>

    <div class="action position-relative">
        <a href="{{route($route . '.edit', $id)}}" class="btn btn-primary d-flex align-items-center justify-content-center"><x-bi-pencil-square /></a>
        <span class="action-button-label position-absolute">EDITAR</span>
    </div>
</div>
