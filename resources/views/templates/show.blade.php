@extends('..layouts.main')

@section ('upper-menu')
    <div class="buttons-books-container">
        <x-action-buttons :id="$data->id" :route="str_replace('/', '', $path[0]['path'])" />
    </div>
@endsection
