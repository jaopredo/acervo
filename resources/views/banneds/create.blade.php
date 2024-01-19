@extends('..layouts.main')

@once
    @push('scripts')
        @vite('resources/js/loans.js')
    @endpush
@endonce

@section('content')
    @isset($data)
        {{ html()->modelForm($data, 'PUT', route('banneds.update', $data->id))->acceptsFiles()->open() }}
    @else
        {{ html()->form('POST', route('banneds.save'))->acceptsFiles()->open() }}
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
                        :endpoint="route('api.students.all')"
                        label="ESCOLHA O ALUNO"
                        :values="[
                            'id' => $data->student->id ?? '',
                            'label' => $data->student->name ?? ''
                        ]"
                    />
                    <p class="form-error">{{$errors->first('student_id')}}</p>
                    @isset ($data)
                        @if ($data->student_id && !$data->student)
                            <p class="form-error">O aluno informado não existe mais!</p>
                        @endif
                    @endisset
                </div>
                <div id="student-name-container" class="input-container !mb-0">
                    <label for="student_name">INSIRA O NOME COMPLETO DO ESTUDANTE</label>
                    <input value="{{$data->student_name ?? ''}}" type="text" class="input" name="student_name" id="student_name">
                    <p class="form-error">{{$errors->first('student_name')}}</p>
                </div>
            </div>
        </div>

        <div class="input-container">
            <label for="expire_date">ATÉ QUANDO O ALUNO FICARÁ BANIDO?</label>
            <input type="date" value="{{\Carbon\Carbon::now()->addDays(7)->format('Y-m-d')}}" class="input" name="expire_date" id="expire_date">
            <p class="form-error">{{$errors->first('expire_date')}}</p>
        </div>

        <button class="leaf-button w-full">ENVIAR</button>
    {{ html()->form()->close() }}
@endsection
