@extends('..templates.index')

@section('table-header')
    <th scope="col" class="text-left">Nome</th>
    <th scope="col" class="text-right">
        Ações
    </th>
@endsection

@section('table-content')
    @foreach ($data as $classroom)
        <tr>
            <td><a href="{{route('classrooms.show', $classroom->id)}}" class="redirect">{{ $classroom->name }}</a></td>
            <td>
                <div class="flex items-center justify-end">
                    <x-action-buttons action="table" :id="$classroom->id" route="classrooms" />
                </div>
            </td>
        </tr>
    @endforeach
@endsection
