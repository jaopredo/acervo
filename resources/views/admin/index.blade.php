@extends('..templates.index')

@section ('content-table')
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Permissão</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $user)
            <tr>
                <td><a class="item-link" href="/admin/{{$user->id}}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>[Implementar]</td>
                <td>
                    @if ($user->id == auth()->user()->id)
                        <p>Você Mesmo!</p>
                    @else
                        <form style="display: inline-block" action="/admin/{{$user->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">DELETAR</button>
                        </form>
                        <a href="admin/edit/{{$user->id}}" class="btn btn-primary">EDITAR</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
@endsection
