@extends('..layouts.main')

@once
    @push ('styles')
        @vite(['resources/css/books.css'])
    @endpush
@endonce

@section ('upper-menu')
    <div class="buttons-books-container">
        <a href="/books/edit/{{ $data->id }}" class="btn btn-primary">EDITAR LIVRO</a>
        <form style="display: inline-block" action="/books/{{$data->id}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-primary btn-danger">DELETAR LIVRO</a>
        </form>
    </div>
@endsection

@section ('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col image-container d-flex flex-row align-items-center justify-content-center">
                <img
                    src="{{ env('APP_FULL_URL') . '/api/file/' . $data->image }}"
                    alt="Imagem Teste"
                >
            </div>
            <div class="col bg-white p-1 rounded-2">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Registro</th>
                            <td>{{ $data->register }} </td>
                        </tr>
                        @if ($data->group)
                            <tr>
                                <th scope="row">Agrupamento</th>
                                <td>
                                    {{ $data->group->name }}
                                </td>
                            </tr>
                        @endif
                        @if ($data->categories)
                            <tr>
                                <th scope="row">Categorias</th>
                                <td>
                                    @foreach ($data->categories as $category)
                                        {{ $category->name }},
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <th scope="row">CDD</th>
                            <td>{{ $data->cdd }} </td>
                        </tr>
                        <tr>
                            <th scope="row">ISBN</th>
                            <td>{{ $data->isbn }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Autor</th>
                            <td>{{ $data->author }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Ano de Publicação</th>
                            <td>{{ $data->publication }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Editora</th>
                            <td>{{ $data->editor }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Número de Páginas</th>
                            <td>{{ $data->pages }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Volume</th>
                            <td>{{ $data->volume }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Exemplar</th>
                            <td>{{ $data->example }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Ano de Aquisição</th>
                            <td>{{ $data->aquisition_year }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Método de Aquisição</th>
                            <td>{{ $data->aquisition }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Local de Fabricação</th>
                            <td>{{ $data->local }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            NESTA SEÇÃO IRÁ FICAR A LISTA DOS TOMBAMENTOS
        </div>
    </div>
@endsection
