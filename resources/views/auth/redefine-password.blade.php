@extends('..layouts.guest')

@section('title', 'Redefinir Senha')

@section ('content')
    {{ html()->form('POST', route('password.redefine'))->open() }}
        <input type="hidden" name="token" value="{{$token}}">
        <div class="input-container">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="input">
            <p class="form-error">{{$errors->first('email')}}</p>
        </div>
        <div class="input-group">
            <div class="input-container">
                <label for="password">Nova Senha</label>
                <input type="password" name="password" id="password" class="input">
                <p class="form-error">{{$errors->first('password')}}</p>
            </div>
            <div class="input-container">
                <label for="password_confirmation">Confirmar Senha</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="input">
                <p class="form-error">{{$errors->first('password_confirmation')}}</p>
            </div>
        </div>
        <button class="night-button">REDEFINIR</button>

        @if ($errors->first('generic'))
            <div class="alert alert-error text-center mt-2">
                {{$errors->first('generic')}}
            </div>
        @endif
    {{ html()->form()->close() }}
@endsection
