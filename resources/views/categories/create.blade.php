@extends('..layouts.main')

@section('content')
    <form class="mt-4" action="/categories/{{$data->id ?? ''}}" method="POST">
        @csrf
        @isset($data)
            @method('PUT')
        @endisset
        <div class="row">
            <label for="name">NOME</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $data->name ?? '' }}">
            <p class="form-error">{{$errors->first('name')}}</p>
        </div>

        <button class="btn btn-primary row mt-4">ENVIAR</button>
    </form>
@endsection
