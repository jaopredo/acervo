@extends('..layouts.main')

@section('content')
    @isset($data)
        {{ html()->modelForm($data, 'PUT', route('classrooms.update', $data->id))->acceptsFiles()->open() }}
    @else
        {{ html()->form('POST', route('classrooms.save'))->acceptsFiles()->open() }}
    @endisset
        <div class="input-container">
            <label for="name">NOME</label>
            <input type="text" id="name" name="name" class="input" value="{{ $data->name ?? '' }}">
            <p class="form-error">{{$errors->first('name')}}</p>
        </div>
        <div class="input-container">
            <label for="email">EMAIL</label>
            <input type="email" id="email" name="email" class="input" value="{{ $data->email ?? '' }}">
            <p class="form-error">{{$errors->first('email')}}</p>
        </div>
        <div class="input-container">
            <label for="name">CPF</label>
            <input type="text" id="name" name="name" class="input" value="{{ $data->name ?? '' }}">
            <p class="form-error">{{$errors->first('name')}}</p>
        </div>

        <button class="leaf-button w-full">ENVIAR</button>
    {{ html()->form()->close() }}
@endsection
