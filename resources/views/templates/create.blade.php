@extends('..layouts.main')

@section('content')
    <div class="flex items-center justify-between bg-white p-3 rounded-md">
        <div class="w-full items-stretch justify-center">
            @yield('content-container')
        </div>
    </div>
@endsection
