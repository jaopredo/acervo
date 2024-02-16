@extends('..templates.show')

@php($pend_books = App\Models\Loan::where('expire_date', '<', Carbon\Carbon::today())->get())

@section('content')
    <div class="flex flex-col items-stretch gap-2 h-full">
        <article class="flex items-stretch flex-col w-full">
            <h1 class="text-xl font-bold text-center">Informações do Aluno</h1>
            <div class="flex gap-2 items-center justify-between">
                @if (!$data->image)
                    <div class="flex items-center justify-center flex-grow">
                        <x-bi-person-circle class="w-48 h-48 text-gray-500"/>
                    </div>
                @else
                    <div class="flex items-center justify-center flex-grow">
                    <div
                    class="w-48 h-48 bg-no-repeat bg-center bg-contain rounded-full shadow-md"
                    style="background-image: url('{{route('file', $data->image)}}')"
                    >

                    </div>
                    </div>
                @endif
                <div class="bg-white p-2 rounded-md flex-grow">
                    <table class="table w-full">
                        <tbody>
                            @foreach ($data->response()->getData()->data as $key=>$field)
                                @if (!in_array($key, $data->exclude_show()))
                                    <tr>
                                        <th scope="row" class="text-right">{{__("fields.student.$key")}}</th>
                                        <td>{{$field}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </article>

        <article>
            <h1 class="text-xl font-bold text-center">Livros Pendentes</h1>
            @if (count($pend_books) > 0)
                <div class="bg-white p-3 rounded-md mt-2">
                    <table class="table-fixed border-collapse p-2 table border-b border-slate-200 text-left text-sm font-light">
                        <thead>
                            <th scope="col" class="text-center">NOME</th>
                            <th scope="col" class="text-center">QUANDO PEGOU</th>
                            <th scope="col" class="text-center">QUANDO DEVOLVERIA</th>
                        </thead>
                        <tbody>
                            @foreach ($pend_books as $loan)
                                <tr>
                                    <td class="text-center">{{ $loan->book->name }}</td>
                                    <td class="text-center">{{ Carbon\Carbon::parse($loan->loan_date)->format('d/m/Y') }}</td>
                                    <td class="text-center">{{ Carbon\Carbon::parse($loan->expire_date)->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-success mt-2 text-center font-bold">
                    ESSE ALUNO NÃO TEM NENHUM LIVRO PENDENTE
                </div>
            @endif
        </article>
    </div>
@endsection
