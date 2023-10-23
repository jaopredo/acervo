@extends('..layouts.main')

@section('content')
    <div class="flex items-center justify-between bg-white p-3 rounded-md">
        <div class="w-full items-stretch justify-center">
            @if ($errors->any())
                @foreach ($errors as $e)
                    {{$e}}
                @endforeach
            @endif
            @yield('content-container')
        </div>
    </div>
@endsection
