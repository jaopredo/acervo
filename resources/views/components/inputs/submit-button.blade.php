@once
    @push("scripts")
        @vite('resources/js/components/submit.js')
    @endpush
@endonce

@props(['class' => ""])

<button type="submit" class="{{ $class }} submit-button">
    {{$slot}} <x-lucide-loader-2 class="loader animate-spin w-5 h-5" style="display: none" />
</button>
