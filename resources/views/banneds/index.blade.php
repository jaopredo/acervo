@extends('..templates.index')

@section('table-header')
    <th scope="col" class="text-left">Aluno</th>
    <th scope="col" class="text-left">Quando pode voltar</th>
    <th scope="col" class="text-right">
        Ações
    </th>
@endsection

@section('table-content')
    @foreach ($data as $banned)
        <tr>
            <td>
                @if ($banned->student)
                    <a href="{{route('students.show', $banned->student->id)}}" class="redirect">{{ $banned->student->name }}</a>
                @else
                    <p>{{$banned->student_name}}</p>
                @endif
            </td>
            <td>
                {{\Carbon\Carbon::parse($banned->expire_date)->format('d/m/Y')}}
            </td>
            <td>
                <div class="flex items-center justify-end">
                    <x-action-buttons action="table" :id="$banned->id" route="banneds" />
                </div>
            </td>
        </tr>
    @endforeach
@endsection
