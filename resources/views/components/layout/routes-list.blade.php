<div class="links-container d-flex flex-row align-items-center justify-content-start">
    @foreach ($path as $item)
        <div class="d-flex align-items-center justify-content-center gap-1">
            <span class="links-separator d-flex flex-row align-items-center justify-content-start">
                <x-bi-chevron-double-right width="15" height="15" />
            </span>
            <a class="link-path" href="{{$item['path']}}">{{$item['name']}}</a>
        </div>
    @endforeach
</div>
