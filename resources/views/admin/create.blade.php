@extends('..layouts.main')

@section('content')
    <h1 class="mt-2 text-lg font-bold">
        @isset($data)
            Conta
        @else
            Criar Administrador
        @endisset
    </h1>
    <form
        @isset($data)
            action="{{route('password.update')}}"
        @else
            action="/register"
        @endisset
    method="POST" class="bg-white rounded-md p-4">
        @csrf

        <div class="input-group">
            <div class="input-container">
                <label for="name">Nome</label>
                <input type="text" @disabled($data->name ?? false) class="input" name="name" value="{{$data->name ?? ''}}">
            </div>
            <div class="input-container">
                <label for="email">Email</label>
                <input type="email" @isset($data) readonly @endisset class="input disabled" name="email" value="{{$data->email ?? ''}}">
                <p class="form-error">{{$errors->first('email')}}</p>
            </div>
        </div>
        <hr>
        <div class="input-group">
            @isset($data)
                <div class="input-container">
                    <label for="old_password">Antiga Senha</label>
                    <input type="password" class="input" id="old_password" name="old_password">
                    <p class="form-error">{{$errors->first('old_password')}}</p>
                </div>
            @endisset
            <div class="input-container">
                <label for="password">Nova Senha</label>
                <input type="password" class="input" id="password" name="password">
                <p class="form-error">{{$errors->first('password')}}</p>
            </div>
            <div class="input-container">
                <label for="password_confirmation">Confirmar Senha</label>
                <input type="password" class="input" id="password_confirmation" name="password_confirmation">
                <p class="form-error">{{$errors->first('password_confirmation')}}</p>
            </div>
        </div>
        <button class="leaf-button">ENVIAR</button>
    </form>
@endsection
