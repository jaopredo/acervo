@extends('..templates.index')

@section('table-header')
    <th scope="col" class="text-left">Nome</th>
    <th scope="col" class="text-left">Email</th>
    <th scope="col" class="text-left">Permissão</th>
    <th scope="col" class="text-center">Ações</th>
@endsection

@section ('table-content')
    @foreach ($data as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>[Implementar]</td>
            <td class="text-center">
                @if ($user->id == auth()->user()->id)
                    <p>Você Mesmo!</p>
                @else
                    <x-action-buttons action="table" :id="$user->id" route="admin" />
                @endif
            </td>
        </tr>
    @endforeach
@endsection
