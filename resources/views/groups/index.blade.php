@extends('..templates.index')

@section('content-table')
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">
                <div class="actions-container">Ações</div>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $group)
            <tr>
                <td><a class="item-link" href="/groups/{{$group->id}}">{{ $group->name }}</a></td>
                <td>
                    <div class="actions-container">
                        <form style="display: inline-block" action="/groups/{{$group->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">DELETAR</button>
                        </form>
                        <a href="groups/edit/{{$group->id}}" class="btn btn-primary">EDITAR</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
@endsection
