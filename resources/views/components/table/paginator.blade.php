<div class="w-100 px-4 pb-2 d-flex align-items-center justify-content-between">
    <div>Selecione a Página</div>
    <div>
        <div class="p-links-container d-flex flex-row align-items-center justify-content-end">
            <div class="d-flex flex-row align-items-center justify-content-end p-links-container-container">
                @foreach ($meta->links as $link)
                    @if ($link->label != '...')
                        <a
                            href="{{ $link->url }}"
                            class="pagination-link {{ $link->active?'pagination-link-active':'' }}"
                        >{!! $link->label !!}</a>
                    @else
                        <span class="pagination-link-separator">
                            {!! $link->label !!}
                        </span>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
