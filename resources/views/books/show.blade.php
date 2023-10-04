@extends('..templates.show')

@once
    @push ('scripts')
        @vite('resources/js/tomb.js')
    @endpush
@endonce

@section ('content')
    <div class="flex items-stretch justify-center gap-2 [&>*]:w-3/6">
        <div
            style="background-image: url('{{ env('APP_FULL_URL') . '/api/file/' . $data->image }}')"
            class="flex-grow bg-center bg-contain"
        >
        </div>
        <div class="bg-white p-1 rounded-md flex-grow">
            <table class="table">
                <tbody>
                    @if (count($data->groups) > 0)
                        <tr>
                            <th scope="row" class="text-right">Agrupamentos</th>
                            <td>
                                @foreach ($data->groups as $group)
                                    {{ $group->name }},
                                @endforeach
                            </td>
                        </tr>
                    @endif
                    @if (count($data->categories) > 0)
                        <tr>
                            <th scope="row" class="text-right">Categorias</th>
                            <td>
                                @foreach ($data->categories as $category)
                                    {{ $category->name }},
                                @endforeach
                            </td>
                        </tr>
                    @endif
                    @foreach($data->response()->getData()->data as $key=>$field)
                        @if (!in_array($key, $data->exclude_show()))
                            <tr>
                                <th scope="row" class="text-right">{{__("fields.book.$key")}}</th>
                                <td>{{$field}}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <x-tombs :book="$data" />
@endsection
