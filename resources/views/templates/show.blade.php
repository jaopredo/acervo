@extends('..layouts.main')

@section ('upper-menu')
    <div class="buttons-books-container">
        <a href="{{$path[0]['path']}}/edit/{{ $data->id }}" class="btn btn-primary">EDITAR LIVRO</a>
        <form style="display: inline-block" action="{{$path[0]['path']}}/{{$data->id}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-primary btn-danger">DELETAR LIVRO</a>
        </form>
    </div>
@endsection
