@extends('..layouts.guest')

@section('title', 'Redefinir Senha')

@section ('content')
    <form action="{{route('password.redefine')}}" method="POST" class="container">
        @csrf
        <input type="hidden" name="token" value="{{$token}}">
        <div class="row">
            <div class="mb-1">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
                <p class="form-error">{{$errors->first('email')}}</p>
            </div>
        </div>
        <div class="row">
            <div class="mb-1 col">
                <label for="password">Nova Senha</label>
                <input type="password" name="password" id="password" class="form-control">
                <p class="form-error">{{$errors->first('password')}}</p>
            </div>
            <div class="mb-1 col">
                <label for="password_confirmation">Confirmar Senha</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                <p class="form-error">{{$errors->first('password_confirmation')}}</p>
            </div>
        </div>
        <button class="btn btn-dark">REDEFINIR</button>

        @if ($errors->first('generic'))
            <div class="alert alert-danger d-flex align-items-center justify-content-center">
                {{$errors->first('generic')}}
            </div>
        @endif
    </form>
@endsection
