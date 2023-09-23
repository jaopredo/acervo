@extends('..layouts.main')

@section('content')
    <h1 class="mt-2">Informações sobre a conta</h1>
    <form action="/change_password" method="POST" class="bg-white rounded-2 p-2">
        <div class="row mt-2">
            <div class="col">
                <label for="name">Nome</label>
                <input type="text" disabled class="form-control" value="{{$user->name}}">
            </div>
            <div class="col">
                <label for="email">Email</label>
                <input type="email" disabled class="form-control" value="{{$user->email}}">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <label for="old_password">Antiga Senha</label>
                <input type="password" class="form-control" id="old_password" name="old_password">
            </div>
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
