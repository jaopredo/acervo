@extends('..templates.index')

@section('table-header')
    <th scope="col" class="text-left">Nome</th>
    <th scope="col" class="text-right">
        Ações
    </th>
@endsection

@section('table-content')
    @foreach ($data as $group)
        <tr>
            <td><a class="item-link" href="{{route('groups.show', $group->id)}}">{{ $group->name }}</a></td>
            <td>
                <div class="flex items-center justify-end">
                    <x-action-buttons :id="$group->id" route="groups" />
                </div>
            </td>
        </tr>
    @endforeach
@endsection
