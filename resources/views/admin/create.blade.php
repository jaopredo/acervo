@extends('..layouts.main')

@section('content')
    <h1 class="mt-2">
        @isset($data)
            Minha Conta
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
    method="POST" class="bg-white rounded-2 p-4">
        @csrf

        <div class="row mt-2 mb-2">
            <div class="col">
                <label for="name">Nome</label>
                <input type="text" @disabled($data->name ?? false) class="form-control" name="name" value="{{$data->name ?? ''}}">
            </div>
            <div class="col">
                <label for="email">Email</label>
                <input type="email" @isset($data) readonly @endisset class="form-control disabled" name="email" value="{{$data->email ?? ''}}">
                <p class="form-error">{{$errors->first('email')}}</p>
            </div>
        </div>
        <hr>
        <div class="row mt-2 mb-4">
            @isset($data)
                <div class="col">
                    <label for="old_password">Antiga Senha</label>
                    <input type="password" class="form-control" id="old_password" name="old_password">
                    <p class="form-error">{{$errors->first('old_password')}}</p>
                </div>
            @endisset
            <div class="col">
                <label for="password">Nova Senha</label>
                <input type="password" class="form-control" id="password" name="password">
                <p class="form-error">{{$errors->first('password')}}</p>
            </div>
            <div class="col">
                <label for="password_confirmation">Confirmar Senha</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                <p class="form-error">{{$errors->first('password_confirmation')}}</p>
            </div>
        </div>
        <button class="mt-2 btn btn-primary">ENVIAR</button>
    </form>
@endsection
