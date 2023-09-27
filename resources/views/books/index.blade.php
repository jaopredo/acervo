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
                <td><a class="item-link" href="{{route('books.show', $book->id)}}">{{ $book->name }}</a></td>
                <td>{{ $book->cdd }}</td>
                <td>{{ $book->register }}</td>
                <td>{{ $book->editor }}</td>
                <td>
                    <x-action-buttons :id="$book->id" route="books" />
                </td>
            </tr>
        @endforeach
    </tbody>
@endsection
