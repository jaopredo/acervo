<div id="filter-container" data-activated="0"
class="delete-confirmation absolute top-1/2 w-1/2 left-1/2 z-20 bg-neutral-100 shadow-lg -translate-x-1/2 -translate-y-1/2 rounded-md
flex items-stretch justify-center gap-2 flex-col"
style="display: none"
>
    <div class="flex justify-center gap-3 p-6">
        <div class="flex flex-col w-10 items-center">
            <div class="p-2 rounded-full bg-rose-300 flex items-center justify-center">
                <x-bi-exclamation-triangle class="text-rose-700 text-xl" />
            </div>
        </div>
        <div class="flex flex-col justify-between">
            <h1 class="font-bold text-lg">Tem certeza?</h1>
            <p>Você escolheu deletar este registro, se for um erro, clique em cancelar, caso contrário, confirme, por favor</p>
        </div>
    </div>
    <div class="flex items-center justify-end bg-neutral-200 p-3 gap-2 rounded-b-md">
        <button
            class="delete-cancel button bg-slate-300 text-black hover:bg-slate-400 active:bg-slate-500"
        >CANCELAR</button>
        <form id="delete-button" method="POST">
            @csrf
            @method('DELETE')
            <button
                class="delete-confirmation button bg-rose-600 text-white hover:bg-rose-700 active:bg-rose-800"
            >
                CONFIRMAR
            </button>
        </form>
    </div>
</div>
