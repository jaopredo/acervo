@extends('..layouts.main')

@php($pend_loans = App\Models\Loan::where('expire_date', '<', Carbon\Carbon::today())->get())

@section('content')

<div class="bg-white rounded-md p-2 min-h-full">
    @if (count($pend_loans) == 0)
        <div class="alert alert-success text-center">
            NÃO HÁ NINGUÉM COM LIVRO PENDENTE NO MOMENTO
        </div>
    @endif
</div>

@endsection
