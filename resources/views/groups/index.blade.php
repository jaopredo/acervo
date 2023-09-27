@extends('..templates.index')

@section('content-table')
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">
                <div class="actions-container">Ações</div>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $group)
            <tr>
                <td><a class="item-link" href="{{route('groups.show', $group->id)}}">{{ $group->name }}</a></td>
                <td>
                    <div class="actions-container">
                        <x-action-buttons :id="$group->id" route="groups" />
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
@endsection
