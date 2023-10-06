@extends ('layouts.main')

@section ('content')
    <div class="bg-white rounded-md min-h-full p-3 flex flex-col gap-1 items-stretch justify-start">
        <h1 class="text-2xl font-bold text-center text-leaf">BEM-VINDO AO MULTIMEIOS</h1>
        <h2 class="text-lg text-center font-semibold text-night-light">O que você gostaria de ver?</h2>
        <section class="flex items-stretch flex-wrap justify-items-stretch justify-around mt-2 gap-4">
            @foreach (side_menu() as $group => $items)
                <section
                    class="border border-leaf-light p-2 rounded-md relative flex-grow"
                    style="flex-basis: 40%;"
                >
                    <h3 class="absolute top-0 left-3 bg-white p-1 -translate-y-1/2 ">{{$group}}</h3>
                    <ul class="mt-2 w-full">
                        @foreach ($items as $item)
                            <li class="redirect rounded-sm p-2 hover:bg-leaf-lighter">
                                <a class="gap-1 flex items-center justify-center" href="{{$item['path']}}">
                                    @svg($item['icon']) {{ $item['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </section>
            @endforeach
        </section>
    </div>
@endsection
