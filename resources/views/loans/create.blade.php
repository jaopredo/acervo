@extends('..layouts.main')

@once
    @push('scripts')
        @vite('resources/js/loans.js')
    @endpush
@endonce

@section('content')
    @isset($data)
        {{ html()->modelForm($data, 'PUT', route('loans.update', $data->id))->acceptsFiles()->open() }}
    @else
        {{ html()->form('POST', route('loans.save'))->acceptsFiles()->open() }}
    @endisset
        @foreach ($errors->all() as $e)

{{$e}}

        @endforeach
        <div class="input-container">
            <div>
                <h2>O ALUNO JÁ POSSUI UM CADASTRO?</h2>
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center gap-2">
                        <x-radio-input name="has_register" id="yes" label="Sim"/>
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <x-radio-input name="has_register" :checked="true" id="no" label="Não"/>
                    </div>
                </div>
            </div>

            <div id="student-id-container" class="input-container" style="display: none">
                <label for="student_id">ESCOLHA O ALUNO</label>
                <select name="student_id" id="student_id" class="input">
                    <option value="">NENHUM</option>
                    @foreach ($relationships['students'] as $student)
                        <option value="{{$student->id}}">{{$student->name}}</option>
                    @endforeach
                </select>
            </div>

            <div id="student-name-container" class="input-container">
                <label for="student_name">INSIRA O NOME COMPLETO DO ESTUDANTE</label>
                <input type="text" class="input" name="student_name" id="student_name">
            </div>
        </div>

        <div class="input-container">
            <label for="book_id">LIVRO ESCOLHIDO</label>
            <select class="input" name="book_id" id="book_id">
                <option value="">NENHUM</option>
                @foreach ($relationships['books'] as $book)
                    <option value="{{$book->id}}">{{$book->name}}</option>
                @endforeach
            </select>
            <p class="form-error">{{$errors->first('book_id')}}</p>

            <input type="hidden" name="book_name" id="book_name">
        </div>

        <div class="input-container">
            <label for="loan_date">DIA DO EMPRÉSTIMO</label>
            <input type="date" name="loan_date" id="loan_date" class="input">
            <p class="form-error">{{$errors->first('loan_date')}}</p>

        </div>

        <div class="input-container">
            <label for="expire_selection">QUANDO O EMPRÉSTIMO VAI EXPIRAR?</label>
            <select name="expire_selection" id="expire_selection" class="input">
                <option value="7">1 semana</option>
                <option value="14">2 semanas</option>
                <option value="21">3 semanas</option>
                <option value="0">Personalizado</option>
            </select>
            <p class="form-error">{{$errors->first('expire_date')}}</p>

            <div id="expire-days-form" class="input-container" style="display: none">
                <label for="expire_days">Informe em quantos <strong>DIAS</strong> o empréstimo irá expirar</label>
                <input type="number" id="expire_days" name="expire_days" class="input" min="7" max="30" value="7">
            </div>

            <input type="date" class="hidden" name="expire_date" id="expire_date">
        </div>

        <button class="leaf-button w-full">ENVIAR</button>
    {{ html()->form()->close() }}
@endsection
