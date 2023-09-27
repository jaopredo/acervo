@extends('..layouts.guest')

@section('title', 'Esqueci a Senha')

@section('content')
    <form action="{{route('password.email')}}" method="POST">
        @csrf
        <p class="d-block mb-2 text-center">
            Olá! Aparentemente você esqueceu sua senha. Não se preocupe! Informe seu email e, daqui uns segundos, nós lhe enviaremos um link para alterar sua senha!
        </p>
        <div class="mb-2">
            <label for="email">Informe seu email</label>
            <input type="email" name="email" id="email" class="form-control">
            <p class="form-error">{{$errors->first('email')}}</p>
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <button type="submit" class="btn btn-dark fw-bold">ENVIE-ME UM EMAIL</button>
            <a href="/login">Fazer Login</a>
        </div>
    </form>

    @if (session('msg'))
        <div class="alert mt-2 alert-success">
            {{session('msg')}} Se ele não tiver chegado, tente novamente enviar o email.
        </div>
    @endif
@endsection
