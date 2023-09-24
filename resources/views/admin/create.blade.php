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
            action="/change_password"
        @else
            action="/register"
        @endisset
    method="POST" class="bg-white rounded-2 p-2">
        @csrf

        @foreach ($errors->all() as $err)
            {{ $err }}
        @endforeach

        <div class="row mt-2">
            <div class="col">
                <label for="name">Nome</label>
                <input type="text" @disabled($data->name ?? false) class="form-control" name="name" value="{{$data->name ?? ''}}">
            </div>
            <div class="col">
                <label for="email">Email</label>
                <input type="email" @isset($data) readonly @endisset class="form-control disabled" name="email" value="{{$data->email ?? ''}}">
            </div>
        </div>
        <div class="row mt-2">
            @isset($data)
                <div class="col">
                    <label for="old_password">Antiga Senha</label>
                    <input type="password" class="form-control" id="old_password" name="old_password">
                </div>
            @endisset
            <div class="col">
                <label for="password">Nova Senha</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="col">
                <label for="password_confirmation">Confirmar Senha</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
        </div>
        <button class="mt-2 btn btn-primary">ENVIAR</button>
    </form>
@endsection
