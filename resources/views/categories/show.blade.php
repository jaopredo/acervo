@extends('..templates.show')

@once
    @push('scripts')
        @vite('resources/js/group.js')
    @endpush
@endonce

@section('content')
    <h2 class="text-lg font-bold text-center">Livros desta Categoria</h2>
    @if (count($data->books) > 0)
        <div class="books-container p-2 bg-white rounded-md">
            <table class="table">
                <thead>
                    <th scope="col" class="text-left">Nome</th>
                    <th scope="col" class="text-left">Editora</th>
                    <th scope="col" class="text-left">Registro</th>
                    <th scope="col">Ações</th>
                </thead>
                <tbody>
                    @foreach ($data->books as $book)
                        <tr>
                            <td><a class="redirect" href="{{route('books.show', $book->id)}}">{{$book->name}}</a></td>
                            <td>{{$book->editor}}</td>
                            <td>{{$book->register}}</td>
                            <td>
                                <x-action-buttons action="table" :id="$book->id" route="books" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-error text-center">
            NENHUM LIVRO POSSUI ESTA CATEGORIA
        </div>
    @endif
    <section>
        <div class="flex items-center justify-between mt-2">
            <h2 class="text-md font-bold">Adicionar Livros</h2>
            <button id="open-button" class="leaf-button-outline toggle-add-book">ADICIONAR</button>
            <button id="close-button" class="night-button-outline toggle-add-book" style="display: none">CANCELAR</button>
        </div>
        <div id="form-container" style="display: none">
            {{ html()->modelForm($data, 'PATCH', route('categories.patch-books', $data->id))->acceptsFiles()->open() }}
                <div class="flex align-items justify-between">
                    <div class="input-container">
                        <x-search-select
                            label=""
                            id="books"
                            :values="[]"
                            :endpoint="route('api.books.all')"
                            multiple
                        />
                        <button type="submit" class="leaf-button-outline">ENVIAR</button>
                    </div>
                </div>
            {{ html()->form()->close() }}
        </div>
    </section>
@endsection
