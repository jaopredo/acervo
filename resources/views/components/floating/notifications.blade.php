<div id="notification-container"
class="floating-container transition-all scale-0 opacity-0 !right-20
w-1/4">
    <div class="flex items-stretch gap-4 mb-5">
        <h2 class="font-bold flex items-center justify-center m-0">Notificações</h2>

        @if (count(auth()->user()->unreadNotifications) > 0)
            <div class="flex items-center justify-center bg-night-light text-white w-8 rounded-md">
                {{count(auth()->user()->unreadNotifications)}}
            </div>
        @endif
    </div>
    <ul class="flex flex-col items-stretch max-h-80 overflow-y-auto scrollable">
        @foreach (auth()->user()->notifications as $notification)
            {{$notification->markAsRead()}}
            <li class="flex items-stretch justify-center gap-3 p-3 border-t">
                <x-bi-lock class="w-10 h-10"/>
                {{-- Se eu criar uma notificação de Reserva --}}
                @if ($notification->type == "App\Notifications\ReserveCreated")
                    <div class="flex flex-col justify-center">
                        <h3>Livro Reservado!</h3>
                        <p class="text-sm text-gray-500">
                            O Livro <a class="redirect underline"
                                href="{{route('books.show', $notification->data['book']['id'])}}"
                            >{{$notification->data['book']['name']}}</a>
                            foi reservado para amanhã pelo(a) aluno(a)
                            <a class="redirect underline"
                                href="{{route('students.show', $notification->data['student']['id'])}}"
                            >{{$notification->data['student']['name']}}</a>
                        </p>
                        <div class="flex items-center justify-between">
                            @if (!$notification->read_at)
                                <div class="text-sm mt-2 bg-rose-300 text-red-900 p-1 rounded-xl w-fit">Não Lido</div>
                            @else
                                <div class="text-sm mt-2 bg-emerald-300 text-emerald-900 p-1 rounded-xl w-fit">Lido</div>
                            @endif
                        </div>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
</div>