@extends('..templates.index')

@section ('upper-menu')
    <select id="loan-type-selection" class="input !min-h-fit !p-2">
        <option value="" selected disabled>Filtre pelo Estado</option>
        <option value="0">Válidos</option>
        <option value="1">Para Vencer</option>
        <option value="2">Vencidos</option>
    </select>
    <x-index-actions :path="$path[0]['path']" :filters="$filters"/>
@endsection

@section('table-header')
    <th scope="col" class="text-left">Aluno</th>
    <th scope="col" class="text-left">Livro</th>
    <th scope="col" class="text-left">Data</th>
    <th scope="col" class="text-left">Vencimento</th>
    <th scope="col" class="text-center">Estado</th>
    <th scope="col" class="text-center">Sala</th>
    <th scope="col" class="text-right">
        Ações
    </th>
@endsection

@section('table-content')
    @foreach ($data as $loan)
        <tr>
            <td>
                @if ($loan->student)
                    <a href="{{route('students.show', $loan->student->id)}}" class="redirect">{{ $loan->student->name }}</a>
                @else
                    {{$loan->student_name}}
                @endif
            </td>
            <td><a href="{{route('books.show', $loan->book->id)}}" class="redirect">{{ $loan->book->name }}</a></td>
            <td>{{\Carbon\Carbon::parse($loan->loan_date)->format('d/m/Y')}}</td>
            <td>{{\Carbon\Carbon::parse($loan->expire_date)->format('d/m/Y')}}</td>
            <td><div class="flex items-center justify-center relative">
                <x-loan-state :date="$loan->expire_date" />
            </div></td>
            <td class="text-center">
                {{ $loan->classroom_name }}
            </td>
            <td>
                <div class="flex items-center justify-end">
                    <x-action-buttons action="table" :id="$loan->id" route="loans" />
                </div>
            </td>
        </tr>
    @endforeach
@endsection

@once
    @push('scripts')
        @vite('resources/js/loans.js')
    @endpush
@endonce
