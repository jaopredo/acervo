@extends('..templates.index')

@section('table-header')
    <th scope="col" class="text-left">Nome</th>
    <th scope="col" class="text-left">CDD</th>
    <th scope="col" class="text-left">Registro</th>
    <th scope="col" class="text-left">Editora</th>
    <th scope="col" class="text-center">Ações</th>
@endsection

@section ('table-content')
    @foreach ($data as $book)
        <tr>
            <td><a href="{{route('books.show', $book->id)}}" class="redirect">{{ $book->name }}</a></td>
            <td>{{ $book->cdd }}</td>
            <td>{{ $book->register }}</td>
            <td>{{ $book->editor }}</td>
            <td>
                <x-action-buttons action="table" :id="$book->id" route="books" />
            </td>
        </tr>
    @endforeach
@endsection
