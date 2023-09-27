<form style="display: inline-block" action="{{route($route . '.destroy', $id)}}" method="post">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger">DELETAR</button>
</form>
<a href="{{route($route . '.edit', $id)}}" class="btn btn-primary">EDITAR</a>
