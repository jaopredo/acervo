<aside id="side">
    <nav>
        <menu class="navbar-nav mb-2 mb-lg-0 flex-column">
            @foreach (side_menu() as $groupament => $items)
                <ul class="menu-section d-flex flex-column align-items-stretch justify-content-center gap-1">
                    <h3>{{$groupament}}</h3>

                    @foreach ($items as $item)
                        <li class="nav-item menu-item">
                            <a href="{{$item['path']}}" @class([
                                'nav-link',
                                'active' => $actual==$item['path']
                            ])>
                                @svg($item['icon'])
                                {{$item['name']}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endforeach
        </menu>
    </nav>
</aside>
