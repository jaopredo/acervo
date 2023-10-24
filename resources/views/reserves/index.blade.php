@extends('..templates.index')

@section('table-header')
    <th scope="col" class="text-left">Aluno</th>
    <th scope="col" class="text-left">Livro</th>
    <th scope="col" class="text-left">Data</th>
    <th scope="col" class="text-right">
        Ações
    </th>
@endsection

@section('table-content')
    @foreach ($data as $reserve)
        <tr>
            <td>
                @if ($reserve->student)
                    <a href="{{route('students.show', $reserve->student->id)}}" class="redirect">{{ $reserve->student->name }}</a>
                @else
                    <p>{{$reserve->student_name}}</p>
                @endif
            </td>
            <td>
                @if ($reserve->book)
                    <a href="{{route('books.show', $reserve->book->id)}}" class="redirect">{{ $reserve->book->name }}</a>
                @else
                    <p>{{$reserve->student_name}}</p>
                @endif
            </td>
            <td>
                {{\Carbon\Carbon::parse($reserve->expire_date)->format('d/m/Y')}}
            </td>
            <td>
                <div class="flex items-center justify-end">
                    <x-action-buttons action="table" :id="$reserve->id" route="reserves" />
                </div>
            </td>
        </tr>
    @endforeach
@endsection
