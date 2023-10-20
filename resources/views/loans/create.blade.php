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
        <div class="input-group" style="align-items: stretch;">
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
                <div id="student-id-container" class="input-container !mb-0" style="display: none">
                    <x-search-select
                        id="student_id"
                        :endpoint="route('students.api.all')"
                        label="ESCOLHA O ALUNO"
                    />
                    <p class="form-error">{{$errors->first('student_id')}}</p>
                </div>
                <div id="student-name-container" class="input-container !mb-0">
                    <label for="student_name">INSIRA O NOME COMPLETO DO ESTUDANTE</label>
                    <input type="text" class="input" name="student_name" id="student_name">
                    <p class="form-error">{{$errors->first('student_name')}}</p>
                </div>
            </div>
            <div class="input-container justify-end">
                <x-search-select
                    id="book_id"
                    endpoint="{{route('books.api.all')}}"
                    label="ESCOLHA O LIVRO"
                />
                <p class="form-error">{{$errors->first('book_id')}}</p>
                <input type="hidden" name="book_name" id="book_name">
            </div>
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
