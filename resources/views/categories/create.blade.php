@extends('..layouts.main')

@section('content')
    @isset($data)
        {{ html()->modelForm($data, 'PUT', route('categories.update', $data->id))->open() }}
    @else
        {{ html()->form('POST', route('categories.save'))->open() }}
    @endisset
        <div class="input-container">
            <label for="name">NOME</label>
            <input type="text" id="name" name="name" class="input" value="{{ $data->name ?? '' }}">
            <p class="form-error">{{$errors->first('name')}}</p>
        </div>

        <x-submit-button class="leaf-button w-full">ENVIAR</x-submit-button>
    {{ html()->form()->close() }}
@endsection
