@extends('..layouts.guest')

@section ('title', 'Login')

@section ('content')
    {{ html()->form('POST', route('login'))->open() }}
        <div class="input-container">
            <label for="email">Email</label>
            <input placeholder="seuemail@dominio.com" id="email" name="email" type="email" class="input">
            <p class="form-error">{{$errors->first('email')}}</p>
        </div>
        <div class="input-container">
            <label for="password">Senha</label>
            <input placeholder="********" id="password" name="password" type="password" class="input">
            <p class="form-error">{{$errors->first('password')}}</p>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="leaf-button">LOGIN</button>
            <a href="/forgot-password" class="text-leaf hover:underline hover:decoration-solid">Esqueci a Senha</a>
        </div>
    {{ html()->form()->close() }}
@endsection
