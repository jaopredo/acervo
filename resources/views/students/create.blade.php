@extends('..layouts.main')

@once
    @push ('scripts')
        @vite(['resources/js/studentForm.js'])
    @endpush
@endonce

@section('content')
    @isset($data)
        {{ html()->modelForm($data, 'PUT', route('students.update', $data->id))->acceptsFiles()->open() }}
    @else
        {{ html()->form('POST', route('students.save'))->acceptsFiles()->open() }}
    @endisset
        <div class="input-container">
            <label for="name">NOME</label>
            <input type="text" id="name" name="name" class="input" value="{{ $data->name ?? '' }}">
            <p class="form-error">{{$errors->first('name')}}</p>
        </div>

        <div class="input-group">
            <div class="input-container">
                <label for="email">EMAIL</label>
                <input type="email" id="email" name="email" class="input" value="{{ $data->email ?? '' }}">
                <p class="form-error">{{$errors->first('email')}}</p>
            </div>
            <div class="input-container">
                <label for="phone">TELEFONE</label>
                <input type="phone" id="phone" name="phone" class="input" value="{{ $data->phone ?? '' }}">
                <p class="form-error">{{$errors->first('phone')}}</p>
            </div>
        </div>

        <div class="input-group">
            <div class="input-container">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" class="input" value="{{ $data->cpf ?? '' }}">
                <p class="form-error">{{$errors->first('cpf')}}</p>
            </div>
            <div class="input-container">
                <label for="registration">MATRÍCULA</label>
                <input type="text" id="registration" name="registration" class="input" value="{{ $data->registration ?? '' }}">
                <p class="form-error">{{$errors->first('registration')}}</p>
            </div>
        </div>

        <div class="input-container">
            <x-search-select
                :endpoint="route('api.classrooms.all')"
                :values="[
                    'label' => $data->classroom->name ?? '',
                    'id' => $data->classroom->id ?? ''
                ]"

                label="SALA DO ALUNO"
                id="classroom_id"
            />
            <p class="form-error">{{$errors->first('classroom_id')}}</p>
        </div>

        <div class="input-container">
            <x-file-upload id='image' />
            <p class="form-error">{{$errors->first('classroom_id')}}</p>
        </div>

        <button class="leaf-button w-full">ENVIAR</button>
    {{ html()->form()->close() }}
@endsection
