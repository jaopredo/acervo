@extends('..layouts.main')

@once
    @push ('styles')
        @vite(['resources/css/books.css'])
    @endpush
    @push ('scripts')
        @vite(['resources/js/contentLoader.js'])
    @endpush
@endonce

@section ('upper-menu')
    <div class="buttons-container">
        <a href="/books/remove" class="btn btn-primary btn-dark">FILTRO</a>
        <a href="/books/create" class="btn btn-primary btn-success">CRIAR</a>
    </div>
@endsection

@section ('content')
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Registro</th>
                <th scope="col">Editora</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $book)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td><a href="/books/{{$book->id}}">{{ $book->name }}</a></td>
                    <td>{{ $book->register }}</td>
                    <td>{{ $book->editor }}</td>
                    <td class="d-flex flex-row" style="gap: 10px">
                        <form action="/books/{{$book->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">DELETAR</button>
                        </form>
                        <a href="books/edit/{{$book->id}}" class="btn btn-primary">EDITAR</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">Selecione a Página</td>
                <td colspan="3">
                    <div class="p-links-container d-flex flex-row align-items-center justify-content-end">
                        @foreach ($meta->links as $link)
                            @if ($link->label != '...')
                                <a
                                    href="{{ $link->url }}"
                                    class="pagination-link {{ $link->active?'pagination-link-active':'' }}"
                                >{!! $link->label !!}</a>
                            @else
                                <span>
                                    {!! $link->label !!}
                                </span>
                            @endif
                        @endforeach
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
@endsection
