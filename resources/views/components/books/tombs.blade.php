<div class="flex flex-col items-stretch jusify-center mt-4 w-full">
    <div class="flex items-center justify-between mb-2">
        <h2 class="text-lg font-bold">REVISÕES DE TOMBAMENTO</h2>
        <button id="show-tomb-form-button" class="leaf-button-outline">ADICIONAR</button>
        <button id="hide-tomb-form-button" class="night-button-outline" style="display: none">CANCELAR</button>
    </div>
    <div class="mb-2" id="tomb-form" style="display: none">
        <form id="tomb-form-form" action="/tombs" method="POST">
            @csrf
            <section class="flex items-center justify-between mt-2">
                <div class="form-group">
                    <label for="tomb">DATA DE TOMBAMENTO</label>
                    <input class="input" name="tomb" id="tomb" type="date">
                    <p class="form-error">{{$errors->first('tomb')}}</p>
                </div>
                <input type="hidden" name="book_id" id="book_id" value="{{$book->id}}">
                <button class="elevated-button">CRIAR</button>
            </section>
        </form>
    </div>
    @if (count($book->tombs) > 0)
        <div class="rounded-md bg-white p-2">
            <table class="table">
                <tbody>
                    @foreach ($book->tombs as $tomb)
                        <tr>
                            <td>
                                <div id="tomb-{{$tomb->id}}" class="tomb">
                                    {{ \Carbon\Carbon::parse($tomb->tomb)->format('d/m/Y') }}
                                </div>
                                <form style="display: none" id="edit-tomb-{{$tomb->id}}" action="/tombs/{{$tomb->id}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="flex items-center justify-start gap-2">
                                        <input type="date" class="input" value="{{$tomb->tomb}}" name="tomb">
                                        <input type="hidden" value="{{$book->id}}" name="book_id">
                                        <button class="leaf-button-outline">ALTERAR</button>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        aria-valuenow="{{$tomb->id}}"
                                        class="night-button-outline edit-tomb-button"
                                        id="edit-tomb-button-{{$tomb->id}}"
                                    ><x-bi-pencil-square /> EDITAR</button>
                                    <button
                                        aria-valuenow="{{$tomb->id}}"
                                        class="night-button-outline edit-hide-tomb"
                                        id="edit-tomb-hide-{{$tomb->id}}"
                                        style="display: none;"
                                    >CANCELAR</button>
                                    <form action="/tombs/{{$tomb->id}}" method="post" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="night-button-outline"><x-bi-trash/> DELETAR</button>
                                    </form>
                                </div>
                            </td>
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
