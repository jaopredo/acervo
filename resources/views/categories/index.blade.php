@extends('..templates.index')

@section ('content-table')
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">
                <div class="actions-container">Ações</div>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $category)
            <tr>
                <td><a class="item-link" href="/categories/{{$category->id}}">{{ $category->name }}</a></td>
                <td>
                    <div class="actions-container">
                        <form style="display: inline-block" action="/categories/{{$category->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">DELETAR</button>
                        </form>
                        <a href="categories/edit/{{$category->id}}" class="btn btn-primary">EDITAR</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
@endsection
