<div class="flex items-center justify-center gap-2">
    <div class="relative group bg-slate-50 rounded-md text-night-light shadow-md shadow-night-light hover:bg-night hover:text-white transition-all">
        <x-form-button :action="route($route . '.destroy', $id)" method="DELETE"
            class="flex items-center justify-center p-2"
        >
            <x-bi-trash-fill/>
        </x-form-button>

        <span @class([
            'absolute',
            'bg-night-dark',
            'text-white',
            'text-sm',
            'rounded-sm',
            'left-1/2',
            'p-1',
            'z-10',
            '-translate-x-1/2',
            'translate-y-2',
            'opacity-0',
            'pointer-events-none',
            'group-hover:opacity-100',
            'transition-opacity',

            "before:content-['']",
            'before:block',
            'before:absolute',

            'before:left-1/2',
            'before:-top-2',
            'before:-translate-x-1/2',

            'before:w-0',
            'before:h-0',
            'before:border-x-4',
            'before:border-x-transparent',
            'before:border-b-8',
            'before:border-night-dark',
        ])>DELETAR</span>
    </div>

    <div class="relative bg-slate-50 group rounded-md text-night-light shadow-md shadow-night-light hover:bg-night hover:text-white transition-all">
        <a href="{{route($route . '.edit', $id)}}" class="flex items-center justify-center p-2"><x-bi-pencil-square /></a>
        <span @class([
            'absolute',
            'bg-night-dark',
            'text-white',
            'text-sm',
            'rounded-sm',
            'left-1/2',
            'p-1',
            'z-10',
            '-translate-x-1/2',
            'translate-y-2',
            'opacity-0',
            'pointer-events-none',
            'group-hover:opacity-100',
            'transition-opacity',

            "before:content-['']",
            'before:block',
            'before:absolute',

            'before:left-1/2',
            'before:-top-2',
            'before:-translate-x-1/2',

            'before:w-0',
            'before:h-0',
            'before:border-x-4',
            'before:border-x-transparent',
            'before:border-b-8',
            'before:border-night-dark',
        ])>EDITAR</span>
    </div>
</div>
