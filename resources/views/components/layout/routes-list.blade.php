<div class="flex items-center justify-start">
    <div class="flex items-center justify-start gap-1 hover:text-leaf-dark">
        <x-bi-house-fill />
        <a href="{{route('dashboard')}}">Início</a>
    </div>
    @if (count($path) > 0)
        @foreach ($path as $item)
            <div class="flex items-center justify-center gap-1">
                <span class="flex items-center justify-start">
                    <x-bi-chevron-double-right width="15" height="15" />
                </span>
                <a href="{{$item['path']}}" class="hover:text-leaf-dark">{{$item['name']}}</a>
            </div>
        @endforeach
    @endif
</div>
