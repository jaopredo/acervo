@extends('..templates.show')

@once('scripts')
    @push('styles')
        @vite('resources/css/groups.css')
    @endpush
@endonce

@section('content')
    <div class="mt-3 book-infos-container">
        <div id="group-image-container" class="d-flex align-items-center justify-content-center">
            <img
                src="{{ env('APP_FULL_URL') . '/api/file/' . $data->image }}"
                alt="Imagem"
                class="h-100"
            >
        </div>
        <div id="books-table-container">
            <h2 id="container-title">Livros do Grupo</h2>
            @if (count($data->books) > 0)
                <div class="books-container p-2 bg-white rounded-2">
                    <table class="table">
                        <thead>
                            <th scope="col">Nome</th>
                            <th scope="col">Editora</th>
                            <th scope="col">Registro</th>
                        </thead>
                        <tbody>
                            @foreach ($data->books as $book)
                                <tr>
                                    <td><a class="item-link" href="/books/{{$book->id}}">{{$book->name}}</a></td>
                                    <td>{{$book->editor}}</td>
                                    <td>{{$book->register}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-danger text-center">
                    NENHUM LIVRO ESTÁ ASSOCIADO AO GRUPO
                </div>
            @endif
        </div>
    </div>
@endsection
