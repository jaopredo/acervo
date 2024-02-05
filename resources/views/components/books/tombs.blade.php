<div class="flex flex-col items-stretch jusify-center mt-4 w-full">
    <div class="flex items-center justify-between mb-2">
        <h2 class="text-lg font-bold">REVISÕES DE TOMBAMENTO</h2>
        <button id="show-tomb-form-button" class="leaf-button-outline">ADICIONAR</button>
        <button id="hide-tomb-form-button" style="display: none" class="night-button-outline">CANCELAR</button>
    </div>
    <div class="mb-2" id="tomb-form" style="display: none">
        <form class="flex items-stretch justify-between gap-3 flex-col" id="tomb-form-form" action="/tombs" method="POST">
            @csrf
            <section class="flex items-stretch gap-2 mt-2">
                <div class="form-group">
                    <label for="tomb">DATA</label>
                    <input class="input" name="tomb" id="tomb" type="date">
                    <p class="form-error">{{$errors->first('tomb')}}</p>
                </div>
                <div class="form-group">
                    <label class="hover:cursor-pointer" for="state">CONDIÇÃO DO LIVRO</label>
                    <select class="input w-full !min-h-fit" name="state" id="state">
                        <option value="great">ÓTIMA</option>
                        <option value="good">BOM</option>
                        <option value="ok">OK</option>
                        <option value="bad">RUIM</option>
                        <option value="critic">CRÍTICA</option>
                    </select>
                    <p class="form-error">{{$errors->first('state')}}</p>
                </div>
                <div class="form-group">
                    <label class="hover:cursor-pointer">DISPONÍVEL</label>
                    <div class="flex items-center gap-2">
                        <div class="flex items-center gap-1">
                            <input class="input !outline-none" value="1" name="available" id="available" type="radio">
                            <label for="available">SIM</label>
                        </div>
                        <div class="flex items-center gap-1">
                            <input class="input !outline-none" value="0" name="available" id="notavailable" type="radio">
                            <label for="notavailable">NÃO</label>
                        </div>
                    </div>
                    <p class="form-error">{{$errors->first('available')}}</p>
                </div>
                <input type="hidden" name="book_id" id="book_id" value="{{$book->id}}">
            </section>
            <section class="w-full">
                <div class="form-group flex flex-col justify-stretch">
                    <label for="description">DESCRIÇÃO</label>
                    <textarea name="description" id="description" rows="3" class="input"></textarea>
                    <p class="form-error">{{$errors->first('description')}}</p>
                </div>
            </section>
            <button class="elevated-button">CRIAR</button>
        </form>
    </div>
    @if (count($book->tombs) > 0)
        <div class="rounded-md bg-white p-2">
            <table class="table">
                <thead>
                    <tr>
                        <th>DATA</th>
                        <th>CONDIÇÃO</th>
                        <th>DISPONÍVEL</th>
                        <th>DESCRIÇÃO</th>
                        <th>AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($book->tombs as $tomb)
                        <tr id="tomb-{{$tomb->id}}" class="tomb">
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($tomb->tomb)->format('d/m/Y') }}
                            </td>
                            <td class="text-center">
                                @switch($tomb->state)
                                    @case('great')
                                        ÓTIMA
                                        @break
                                    @case('good')
                                        BOA
                                        @break
                                    @case('ok')
                                        OK
                                        @break
                                    @case('bad')
                                        RUIM
                                        @break
                                    @default
                                        CRÍTICO
                                @endswitch
                            </td>
                            <td class="text-center">
                                @if ($tomb->available)
                                    SIM
                                @else
                                    NÃO
                                @endif
                            </td>
                            <td class="text-center">
                                {{ $tomb->description }}
                            </td>
                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        aria-valuenow="{{$tomb->id}}"
                                        class="night-button-outline edit-tomb-button"
                                        id="edit-tomb-button-{{$tomb->id}}"
                                    ><x-bi-pencil-square /> EDITAR</button>
                                    <form action="/tombs/{{$tomb->id}}" method="post" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="night-button-outline"><x-bi-trash/> DELETAR</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr style="display: none" id="edit-tomb-{{$tomb->id}}">
                            <form action="/tombs/{{$tomb->id}}" method="post">
                                @csrf
                                @method('PUT')
                                <td>
                                    <div class="flex items-center justify-center">
                                        <input type="date" class="input" value="{{$tomb->tomb}}" name="tomb">
                                    </div>
                                </td>
                                <td>
                                    <div class="flex items-center justify-center">
                                        <select class="input w-full !min-h-fit" name="state" id="state">
                                            <option @checked($tomb->state == 'great') value="great">ÓTIMA</option>
                                            <option @checked($tomb->state == 'good') value="good">BOM</option>
                                            <option @checked($tomb->state == 'ok') value="ok">OK</option>
                                            <option @checked($tomb->state == 'bad') value="bad">RUIM</option>
                                            <option @checked($tomb->state == 'critic') value="critic">CRÍTICA</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex items-center gap-2">
                                        <div class="flex items-center gap-1">
                                            <input @checked($tomb->available) class="input !outline-none" value="1" name="available" id="available" type="radio">
                                            <label for="available">SIM</label>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            <input @checked(!$tomb->available) class="input !outline-none" value="0" name="available" id="notavailable" type="radio">
                                            <label for="notavailable">NÃO</label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex items-center justify-center">
                                        <textarea class="input" name="description" id="description">{{ $tomb->description }}</textarea>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="leaf-button-outline">ALTERAR</button>
                                        <button
                                            aria-valuenow="{{$tomb->id}}"
                                            class="night-button-outline edit-hide-tomb"
                                            id="edit-tomb-hide-{{$tomb->id}}"
                                            style="display: none;"
                                            type="button"
                                        >CANCELAR</button>
                                    </div>
                                </td>
                                <input type="hidden" value="{{$book->id}}" name="book_id">
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div id="tomb-error" class="alert alert-error mt-4 w-full text-center">
            NENHUM TOMBAMENTO FOI REGISTRADO
        </div>
    @endif
</div>
