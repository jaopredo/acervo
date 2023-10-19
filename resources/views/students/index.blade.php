@extends('..templates.index')

@section('table-header')
    <th scope="col" class="text-left">Nome</th>
    <th scope="col" class="text-right">
        Ações
    </th>
@endsection

@section('table-content')
    @foreach ($data as $student)
        <tr>
            <td><a href="{{route('students.show', $student->id)}}" class="redirect">{{ $student->name }}</a></td>
            <td>
                <div class="flex items-center justify-end">
                    <x-action-buttons action="table" :id="$student->id" route="students" />
                </div>
            </td>
        </tr>
    @endforeach
@endsection
