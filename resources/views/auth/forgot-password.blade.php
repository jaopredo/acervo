@extends('..layouts.guest')

@section('title', 'Esqueci a Senha')

@section('content')
    <form action="{{route('password.email')}}" method="POST">
        @csrf
        <p class="block mb-2 text-center text-sm">
            Olá! Aparentemente você esqueceu sua senha. Não se preocupe! Informe seu email e, daqui uns segundos, nós lhe enviaremos um link para alterar sua senha!
        </p>
        <div class="input-container">
            <label for="email">Informe seu email</label>
            <input type="email" name="email" id="email" class="input">
            <p class="form-error">{{$errors->first('email')}}</p>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="night-button">ENVIE-ME UM EMAIL</button>
            <a href="/login" class="hover:underline hover:decoration-solid">Fazer Login</a>
        </div>

        @if (session('msg'))
        <div class="alert alert-success text-center mt-3">
            {{session('msg')}} Se ele não tiver chegado, tente novamente enviar o email.
        </div>
    @endif
    </form>
@endsection
