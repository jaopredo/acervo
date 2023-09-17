@extends('..layouts.main')

@once
    @push ('styles')
        @vite(['resources/css/books.css'])
    @endpush
    @push ('scripts')
        @vite('resources/js/tomb.js')
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
                        @if (count($data->categories) > 0)
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
        <div class="row d-flex flex-column align-items-center jusify-content-center mt-4">
            <div class="d-flex flex-row align-items-center justify-content-between">
                <h2>REVISÕES DE TOMBAMENTO</h2>
                <button id="show-tomb-form-button" class="btn btn-outline-success">ADICIONAR</button>
                <button id="hide-tomb-form-button" class="btn btn-outline-danger" style="display: none">CANCELAR</button>
            </div>
            <div class="mb-2" id="tomb-form" style="display: none">
                <form id="tomb-form-form" class="container-fluid" action="/tombs" method="POST">
                    @csrf
                    <section class="row">
                        <div class="mb-3 col">
                            <label for="tomb">DATA DE TOMBAMENTO</label>
                            <input class="form-control" name="tomb" id="tomb" type="date">
                        </div>
                        <input type="hidden" name="book_id" id="book_id" value="{{$data->id}}">
                        <button class="btn btn-primary">CRIAR</button>
                    </section>
                </form>
            </div>
            @if (count($data->tombs) > 0)
                <div class="rounded-2 bg-white pt-2">
                    <table class="table">
                        <tbody>
                            @foreach ($data->tombs as $tomb)
                                <tr>
                                    <td>
                                        <div id="tomb-{{$tomb->id}}" class="tomb">
                                            {{ \Carbon\Carbon::parse($tomb->tomb)->format('d/m/Y') }}
                                        </div>
                                        <form style="display: none" id="edit-tomb-{{$tomb->id}}" action="/tombs/{{$tomb->id}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="d-flex flex-row align-items center justify-content-center gap-2">
                                                <input type="date" class="form-control" value="{{$tomb->tomb}}" name="tomb">
                                                <input type="hidden" value="{{$data->id}}" name="book_id">
                                                <button class="btn btn-outline-success">ALTERAR</button>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-row align-items-center justify-content-end gap-2">
                                            <button
                                                aria-valuenow="{{$tomb->id}}"
                                                class="btn btn-info edit-tomb-button"
                                                id="edit-tomb-button-{{$tomb->id}}"
                                            >EDITAR</button>
                                            <button
                                                aria-valuenow="{{$tomb->id}}"
                                                class="btn btn-outline-warning edit-hide-tomb"
                                                id="edit-tomb-hide-{{$tomb->id}}"
                                                style="display: none;"
                                            >CANCELAR</button>
                                            <form action="/tombs/{{$tomb->id}}" method="post" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">DELETAR</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div id="tomb-error" class="alert alert-danger text-center">
                    NENHUM TOMBAMENTO FOI REGISTRADO
                </div>
            @endif
        </div>
    </div>
@endsection
