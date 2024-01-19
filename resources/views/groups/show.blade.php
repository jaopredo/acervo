@extends('..templates.show')

@once
    @push('styles')
        @vite('resources/css/groups.css')
    @endpush
    @push('scripts')
        @vite('resources/js/group.js')
    @endpush
@endonce

@section('content')
    <div class="flex items-stretch justify-center gap-2 h-full">
        @if ($data->image)
        <div
            style="background-image: url('{{ env('APP_FULL_URL') . '/api/file/' . $data->image }}')"
            class="flex-grow bg-center bg-contain w-1/2 h-full"
        ></div>
        @endif
        <div class="flex-grow w-1/2">
            <h2 class="text-lg font-bold text-center">Livros do Grupo</h2>
            @if (count($data->books) > 0)
                <div class="p-2 bg-white rounded-2">
                    <table class="table">
                        <thead>
                            <th scope="col" class="text-left">Nome</th>
                            <th scope="col" class="text-left">Editora</th>
                            <th scope="col" class="text-left">Registro</th>
                        </thead>
                        <tbody>
                            @foreach ($data->books as $book)
                                <tr>
                                    <td><a href="{{route('books.show', $book->id)}}" class="redirect">{{$book->name}}</a></td>
                                    <td>{{$book->editor}}</td>
                                    <td>{{$book->register}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="flex items-start justify-center">
                    <div class="alert alert-error text-center">
                        NENHUM LIVRO ESTÁ ASSOCIADO AO GRUPO
                    </div>
                </div>
            @endif
            <section>
                <div class="flex items-center justify-between mt-2">
                    <h2 class="text-md font-bold">Adicionar Livros</h2>
                    <button id="open-button" class="leaf-button-outline toggle-add-book">ADICIONAR</button>
                    <button id="close-button" class="night-button-outline toggle-add-book" style="display: none">CANCELAR</button>
                </div>
                <div id="form-container" style="display: none">
                    {{ html()->modelForm($data, 'PATCH', route('groups.patch-books', $data->id))->acceptsFiles()->open() }}
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
        </div>
    </div>
@endsection
