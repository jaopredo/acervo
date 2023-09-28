<div class="d-flex align-items-center justify-content-center gap-2">
    <x-form-button
        :action="route($route . '.destroy', $id)"
        method="DELETE"
        class="d-inline btn btn-danger d-flex align-items-center justify-content-center"
    >
        <x-bi-trash-fill />
    </x-form-button>

    <a href="{{route($route . '.edit', $id)}}" class="btn btn-primary d-flex align-items-center justify-content-center"><x-bi-pencil-square /></a>
</div>
