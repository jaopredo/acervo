@extends('..templates.index')

@section ('content-table')
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">CDD</th>
            <th scope="col">Registro</th>
            <th scope="col">Editora</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $book)
            <tr>
                <td><a class="item-link" href="/books/{{$book->id}}">{{ $book->name }}</a></td>
                <td>{{ $book->cdd }}</td>
                <td>{{ $book->register }}</td>
                <td>{{ $book->editor }}</td>
                <td>
                    <form style="display: inline-block" action="/books/{{$book->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">DELETAR</button>
                    </form>
                    <a href="books/edit/{{$book->id}}" class="btn btn-primary">EDITAR</a>
                </td>
            </tr>
        @endforeach
    </tbody>
@endsection
