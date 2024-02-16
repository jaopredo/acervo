@extends('..layouts.main')

@section('content')
    @isset($data)
        {{ html()->modelForm($data, 'PUT', route('groups.update', $data->id))->acceptsFiles()->open() }}
    @else
        {{ html()->form('POST', route('groups.save'))->acceptsFiles()->open() }}
    @endisset
        <div class="input-container">
            <label for="name">NOME</label>
            <input type="text" id="name" name="name" class="input" value="{{ $data->name ?? '' }}">
            <p class="form-error">{{$errors->first('name')}}</p>
        </div>

        <div class="input-container">
            <x-search-select
                label="LIVROS"
                id="books"
                :values="$data['books'] ?? []"
                :endpoint="route('api.books.all')"
                multiple
            />
        </div>

        <x-file-upload id="image"/>

        <x-submit-button class="leaf-button w-full">ENVIAR</x-submit-button>
    {{ html()->form()->close() }}
@endsection
