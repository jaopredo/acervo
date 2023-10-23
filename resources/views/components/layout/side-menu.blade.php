<aside id="side" class="bg-neutral-50 scrollable overflow-y-auto">
    <nav>
        <menu class="p-4 flex flex-col items-center justify-start gap-4">
            @foreach (side_menu() as $groupament => $items)
                <ul class="flex flex-col items-stretch justify-center gap-2 w-full border-b p-1 border-slate-300">
                    <h3 class="text-sm font-bold">{{$groupament}}</h3>

                    @foreach ($items as $item)
                        <li>
                            <a href="{{$item['path']}}" @class([
                                'flex',
                                'items-center',
                                'justify-start',
                                'gap-2',
                                'p-2',
                                'pl-6',
                                'font-light',
                                'rounded-md',
                                'transition-colors',
                                'text-md',

                                'hover:bg-leaf-lighter',
                                'hover:text-leaf',

                                'bg-leaf-lighter' => $actual==$item['path'],
                                'text-leaf' => $actual==$item['path'],
                            ])>
                                @svg($item['icon'], 'text-black')
                                <p @class([
                                    "ml-3",
                                    "capitalize",
                                    'font-bold' => $actual==$item['path']
                                ])>{{$item['name']}}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endforeach
        </menu>
    </nav>
</aside>
