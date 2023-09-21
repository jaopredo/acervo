@extends('..layouts.guest')

@section ('title', 'Login')

@section ('content')
    <form action="/login" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email">Email</label>
            <input placeholder="seuemail@dominio.com" id="email" name="email" type="email" class="form-control">
            <p class="form-error">{{$errors->first('email')}}</p>
        </div>
        <div class="mb-3">
            <label for="password">Senha</label>
            <input placeholder="********" id="password" name="password" type="password" class="password form-control">
            <p class="form-error">{{$errors->first('password')}}</p>
        </div>

        <div class="d-flex align-items-center justify-content-between">
            <button type="submit" class="btn btn-dark fw-bold">LOGIN</button>
            <a href="/forgot-password">Esqueci a Senha</a>
        </div>
    </form>
@endsection
