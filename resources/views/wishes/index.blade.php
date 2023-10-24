@extends('..layouts.main')

@section ('upper-menu')
    <x-index-actions :path="$path[0]['path']" :filters="$filters"/>
@endsection

@section('content')
    <h1>IMPLEMENTAR</h1>
@endsection
