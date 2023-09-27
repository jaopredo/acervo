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
                <td><a class="item-link" href="{{route('categories.show', $category->id)}}">{{ $category->name }}</a></td>
                <td>
                    <div class="actions-container">
                        <x-action-buttons :id="$category->id" route="categories" />
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
@endsection
