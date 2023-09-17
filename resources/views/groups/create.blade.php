@extends('..layouts.main')

@section('content')
    <form class="mt-4" action="/groups/{{$data->id ?? ''}}" method="POST" enctype="multipart/form-data">
        @csrf
        @isset($data)
            @method('PUT')
        @endisset
        <div class="row">
            <label for="name">NOME</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $data->name ?? '' }}">
            <p class="form-error">{{$errors->first('name')}}</p>
        </div>
        <div class="row">
            <label for="image">IMAGEM</label>
            <input type="file" name="image" id="image" class="form-control">
            <p class="form-error">{{$errors->first('image')}}</p>
        </div>

        <button class="btn btn-primary row mt-4">ENVIAR</button>
    </form>
@endsection
