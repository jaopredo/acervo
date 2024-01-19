@extends('..templates.show')

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
        </article>

        <article>
            <h1 class="text-xl font-bold text-center">Desempenho Particular</h1>
        </article>
    </div>
@endsection
