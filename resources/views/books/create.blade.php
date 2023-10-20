@extends('..templates.create')

@once
    @push ('scripts')
        @vite(['resources/js/bookForm.js'])
    @endpush
@endonce

@section ('content-container')
    @isset($data)
        {{ html()->modelForm($data, 'PUT', route('books.update', $data->id))->acceptsFiles()->open() }}
    @else
        {{ html()->form('POST', route('books.save'))->acceptsFiles()->open() }}
    @endisset
        <div class="input-group">
            <div class="input-container">
                <x-search-select
                    label="GRUPOS"
                    id="groups"
                    :values="$data->groups ?? []"
                    :endpoint="route('groups.api.all')"
                    multiple
                />
            </div>

            <div class="input-container">
                <x-search-select
                    label="CATEGORIAS"
                    id="categories"
                    :values="$data->categories ?? []"
                    :endpoint="route('categories.api.all')"
                    multiple
                />
            </div>
        </div>

        <div class="input-group">
            <div class="input-container">
                <label for="register">REGISTRO DO LIVRO</label>
                <input type="text" id="register" name="register" class="input" value="{{ $data->register ?? '' }}">
                <p class="form-error">{{$errors->first('register')}}</p>
            </div>

            <div class="input-container">
                <label for="isbn">ISBN</label>
                <input type="text" id="isbn" name="isbn" class="input" value="{{ $data->isbn ?? '' }}">
                <p class="form-error">{{$errors->first('isbn')}}</p>
            </div>

            <div class="input-container">
                <label for="cdd">CDD</label>
                <input type="text" id="cdd" name="cdd" class="input" value="{{ $data->cdd ?? '' }}">
                <p class="form-error">{{$errors->first('cdd')}}</p>
            </div>
        </div>

        <div class="input-group">
            <div class="input-container">
                <label for="name">NOME DO LIVRO</label>
                <input type="text" id="name" name="name" class="input" value="{{ $data->name ?? '' }}">
                <p class="form-error">{{$errors->first('name')}}</p>
            </div>

            <div class="input-container">
                <label for="author">AUTOR</label>
                <input type="text" id="author" name="author" class="input" value="{{ $data->author ?? '' }}">
                <p class="form-error">{{$errors->first('author')}}</p>
            </div>
        </div>

        <div class="input-group">
            <div class="input-container">
                <label for="volume">VOLUME</label>
                <input type="number"name="volume" id="volume" class="input" value="{{ $data->volume ?? '' }}">
                <p class="form-error">{{$errors->first('volume')}}</p>
            </div>

            <div class="input-container">
                <label for="pages">PÁGINAS</label>
                <input type="number" name="pages" id="pages" class="input" value="{{ $data->pages ?? '' }}">
                <p class="form-error">{{$errors->first('pages')}}</p>
            </div>
        </div>

        <div class="input-group">
            <div class="input-container">
                <label for="aquisition-year">ANO DE AQUISIÇÃO</label>
                <input value="{{ $data->aquisition_year ?? '' }}" type="number" max="{{ date("Y") }}" name="aquisition_year" id="aquisition-year" class="input">
                <p class="form-error">{{$errors->first('aquisition_year')}}</p>
            </div>

            <div class="input-container">
                <label for="publication">ANO DE PUBLICAÇÃO</label>
                <input value="{{ $data->publication ?? '' }}" type="number" max="{{ date("Y") }}" name="publication" id="publication" class="input">
                <p class="form-error">{{$errors->first('publication')}}</p>
            </div>

            <div class="input-container">
                <label for="example">EXEMPLAR</label>
                <input value="{{ $data->example ?? '' }}" type="number" name="example" id="example" class="input">
                <p class="form-error">{{$errors->first('example')}}</p>
            </div>
        </div>

        <div class="input-container">
            <label for="editor">EDITORA</label>
            <input value="{{ $data->editor ?? '' }}" type="text" name="editor" id="editor" class="input">
            <p class="form-error">{{$errors->first('editor')}}</p>
        </div>

        <div class="input-container">
            <label for="aquisition">MÉTODO DE AQUISIÇÃO</label>
            <input value="{{ $data->aquisition ?? '' }}" type="text" name="aquisition" id="aquisition" class="input">
            <p class="form-error">{{$errors->first('aquisition')}}</p>
        </div>

        <div class="input-group">
            <div class="input-container">
                <label for="local">LOCAL</label>
                <input value="{{ $data->local ?? '' }}" type="text" name="local" id="local" class="input">
                <p class="form-error">{{$errors->first('local')}}</p>
            </div>
            <x-file-upload id="image"/>
        </div>

        <div class="input-container">
            <label for="description">DESCRIÇÃO</label>
            <textarea name="description" id="description" class="input">{{$data->description ?? ''}}</textarea>
        </div>

        <button class="leaf-button w-full">ENVIAR</button>
    {{ html()->form()->close() }}
@endsection
