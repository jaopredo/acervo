@extends('..templates.index')

@section ('table-header')
    <th scope="col" class="text-left">Nome</th>
    <th scope="col" class="text-right">
        Ações
    </th>
@endsection

@section ('table-content')
    @foreach ($data as $category)
        <tr>
            <td><a class="item-link" href="{{route('categories.show', $category->id)}}">{{ $category->name }}</a></td>
            <td>
                <div class="flex items-center justify-end">
                    <x-action-buttons :id="$category->id" route="categories" />
                </div>
            </td>
        </tr>
    @endforeach
@endsection
