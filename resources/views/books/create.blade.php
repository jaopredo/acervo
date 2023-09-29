@extends('..layouts.main')

@once
    @push ('styles')
        @vite(['resources/css/books.css'])
    @endpush
    @push ('scripts')
        @vite(['resources/js/bookForm.js'])
    @endpush
@endonce

@section ('content')
    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach
    @isset($data)
        {{ html()->modelForm($data, 'PUT', route('books.update', $data->id))->acceptsFiles()->open() }}
    @else
        {{ html()->form('POST', route('books.save'))->acceptsFiles()->open() }}
    @endisset
        <div class="row">
            <div class="mb-3 col" style="flex-basis: content">
                <x-multiple-select label="GRUPOS" id="groups" :values="$data['groups'] ?? []" :options="$relationships['groups']" />
            </div>

            <div class="mb-3 col">
                <x-multiple-select label="CATEGORIAS" id="categories" :values="$data['categories'] ?? []" :options="$relationships['categories']" />
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col">
                <label for="register">REGISTRO DO LIVRO</label>
                <input type="text" id="register" name="register" class="form-control" value="{{ $data->register ?? '' }}">
                <p class="form-error">{{$errors->first('register')}}</p>
            </div>

            <div class="mb-3 col">
                <label for="isbn">ISBN</label>
                <input type="text" id="isbn" name="isbn" class="form-control" value="{{ $data->isbn ?? '' }}">
                <p class="form-error">{{$errors->first('isbn')}}</p>
            </div>

            <div class="mb-3 col">
                <label for="cdd">CDD</label>
                <input type="text" id="cdd" name="cdd" class="form-control" value="{{ $data->cdd ?? '' }}">
                <p class="form-error">{{$errors->first('cdd')}}</p>
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col">
                <label for="name">NOME DO LIVRO</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $data->name ?? '' }}">
                <p class="form-error">{{$errors->first('name')}}</p>
            </div>

            <div class="mb-3 col">
                <label for="author">AUTOR</label>
                <input type="text" id="author" name="author" class="form-control" value="{{ $data->author ?? '' }}">
                <p class="form-error">{{$errors->first('author')}}</p>
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col">
                <label for="volume">VOLUME</label>
                <input type="number"name="volume" id="volume" class="form-control" value="{{ $data->volume ?? '' }}">
                <p class="form-error">{{$errors->first('volume')}}</p>
            </div>

            <div class="mb-3 col">
                <label for="pages">PÁGINAS</label>
                <input type="number" name="pages" id="pages" class="form-control" value="{{ $data->pages ?? '' }}">
                <p class="form-error">{{$errors->first('pages')}}</p>
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col">
                <label for="aquisition-year">ANO DE AQUISIÇÃO</label>
                <input value="{{ $data->aquisition_year ?? '' }}" type="number" max="{{ date("Y") }}" name="aquisition_year" id="aquisition-year" class="form-control">
                <p class="form-error">{{$errors->first('aquisition_year')}}</p>
            </div>

            <div class="mb-3 col">
                <label for="publication">ANO DE PUBLICAÇÃO</label>
                <input value="{{ $data->publication ?? '' }}" type="number" max="{{ date("Y") }}" name="publication" id="publication" class="form-control">
                <p class="form-error">{{$errors->first('publication')}}</p>
            </div>

            <div class="mb-3 col">
                <label for="example">EXEMPLAR</label>
                <input value="{{ $data->example ?? '' }}" type="number" name="example" id="example" class="form-control">
                <p class="form-error">{{$errors->first('example')}}</p>
            </div>
        </div>

        <div class="mb-3">
            <label for="editor">EDITORA</label>
            <input value="{{ $data->editor ?? '' }}" type="text" name="editor" id="editor" class="form-control">
            <p class="form-error">{{$errors->first('editor')}}</p>
        </div>

        <div class="mb-3">
            <label for="description">DESCRIÇÃO</label>
            <textarea name="description" id="description" class="form-control">{{$data->description ?? ''}}</textarea>
        </div>

        <div class="mb-3">
            <label for="aquisition">MÉTODO DE AQUISIÇÃO</label>
            <input value="{{ $data->aquisition ?? '' }}" type="text" name="aquisition" id="aquisition" class="form-control">
            <p class="form-error">{{$errors->first('aquisition')}}</p>
        </div>

        <div class="mb-3">
            <label for="local">LOCAL</label>
            <input value="{{ $data->local ?? '' }}" type="text" name="local" id="local" class="form-control">
            <p class="form-error">{{$errors->first('local')}}</p>
        </div>

        <div class="mb-3">
            <label for="image">IMAGEM</label>
            <input type="file" name="image" id="image" class="form-control">
            <p class="form-error">{{$errors->first('image')}}</p>
        </div>

        <button class="btn btn-primary">ENVIAR</button>
    {{ html()->form()->close() }}
@endsection
