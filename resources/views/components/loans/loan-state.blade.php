@if (\Carbon\Carbon::parse($date)->greaterThan(\Carbon\Carbon::today()))
    <x-bi-check-circle-fill class="state-icon text-leaf w-5 h-5"/>

    <span class="state-message">NO PRAZO</span>
@elseif (\Carbon\Carbon::parse($date)->equalTo(\Carbon\Carbon::today()))
    <x-bi-exclamation-triangle-fill class="state-icon text-orange-400 w-5 h-5" />

    <span class="state-message">PARA VENCER</span>
@else
    <x-phosphor-warning-circle-bold class="state-icon text-red-500 w-5 h-5" />

    <span class="state-message">VENCIDO</span>
@endif

@once
    @push('styles')
        @vite('resources/css/components/loanState.scss')
    @endpush
@endonce