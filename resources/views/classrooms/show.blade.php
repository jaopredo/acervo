@extends('..templates.show')

@once
    @push('styles')
        @vite('resources/css/groups.css')
    @endpush
    @push('scripts')
        @vite('resources/js/group.js')
    @endpush
@endonce

@section('content')
    <div class="flex items-stretch justify-center gap-2 h-full">
        <div class="flex-grow">
            <h2 class="text-lg font-bold text-center">Alunos da Sala</h2>
            @if (count($data->students) > 0)
                <div class="p-2 bg-white rounded-2">
                    <table class="table">
                        <thead>
                            <th scope="col" class="text-left">Nome</th>
                            <th scope="col" class="text-left">Email</th>
                            <th scope="col" class="text-left">Registro</th>
                        </thead>
                        <tbody>
                            @foreach ($data->students as $student)
                                <tr>
                                    <td><a class="redirect" href="{{route('students.show', $student->id)}}">{{$student->name}}</a></td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->registration}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="flex items-start justify-center">
                    <div class="alert alert-error text-center">
                        NENHUM ALUNO ESTÁ ASSOCIADO À ESTA SALA
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
