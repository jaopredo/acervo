<div class="w-full p-4 flex items-center justify-between">
    <div>Selecione a Página</div>

    <div class="flex items-center justify-end">
        <ul class="flex items-stretch justify-end">
            @foreach ($meta->links as $link)
                @if ($link->label != '...')
                    <li
                        @class([
                            'bg-slate-200',
                            'py-1',
                            'px-2',
                            'flex',
                            'items-center',
                            'justify-center',

                            'hover:bg-slate-300',
                            'hover:cursor-pointer',
                            'active:bg-slate-400',

                            'rounded-l-md' => $link->label == '&laquo;',
                            'rounded-r-md' => $link->label == '&raquo;',

                            'bg-slate-400' => $link->active,
                        ])
                    >
                        <a href="{{ $link->url }}">{!! $link->label !!}</a>
                    </li>
                @else
                    <li class="bg-slate-200 px-6 flex items-center justify-center">
                        {!! $link->label !!}
                    </li>
                @endif
            @endforeach
                </ul>
    </div>
</div>
