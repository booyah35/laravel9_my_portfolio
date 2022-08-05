<x-app-layout>
    <h1 class="text-center pt-4">こちらはイベントの詳細確認ページです</h1>
    <div class="flex justify-center pt-3">
        <table class="bg-red-100 border-separate border-2 border-gray-500 w-3/5 rounded-md">
            <tr><th class="w-2/6 border border-gray-400 py-2">項目</th><th class="w-4/6 border border-gray-400">内容</th></tr>
            <tr><th class="border border-gray-400 py-2">イベント名</th><td class="border border-gray-400"><p class="text-center">{{ $event->name }}</p></td></tr>
            <tr>
                <th class="border border-gray-400 py-2">主催者</th>
                <td class="border border-gray-400">
                    <div class="flex place-content-center">
                        <a href="/show_host_profile/host/{{ $event->host->id }}" class="pt-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ $event->host->name }}</a>
                        @if ($event->host->users()->find(Auth::id()))
                            <form action="/unfollow_host/{{ $event->host->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="フォローを解除" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-1.5 text-center mt-2 ml-5 mb-2"/>
                            </form>
                        @else
                            <form action="/follow_host/{{ $event->host->id }}" method="POST">
                                @csrf
                                <input type="submit" value="フォローする" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-3 py-1.5 text-center mt-2 ml-5 mb-2"/>
                            </form>
                        @endif
                    </div>
                </td>
           </tr>
            <tr><th class="border border-gray-400 py-2">スポーツ名</th><td class="border border-gray-400"><p class="text-center">{{ $event->sport->name }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">レベル</th><td class="border border-gray-400"><p class="text-center">{{ $event->level->name }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">開催地</th><td class="border border-gray-400"><p class="text-center">{{ $event->address }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">日程</th><td class="border border-gray-400"><p class="text-center">{{ $event->event_date }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">開始時間</th><td class="border border-gray-400"><p class="text-center">{{ substr($event->start_time, 0, 5) }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">終了時間</th><td class="border border-gray-400"><p class="text-center">{{ substr($event->finish_time, 0, 5) }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">参加定員</th><td class="border border-gray-400"><p class="text-center">{{ $event->capacity }}人（{{ $event->users()->count()}}人参加登録済み）</p></td></tr>
            <tr><th class="border border-gray-400 py-2">概要</th><td class="border border-gray-400"><p class="text-center">{{ $event->outline }}</p></td></tr>
        </table>
    </div>
    @if ($date > $event->event_date)
        <h1 class="text-blue-600 text-center pt-4">注意！：このイベントはすでに終了しています</h1>
    @else
        <div class="">
            @if ($event->users()->find(Auth::id()))
                <h1 class="text-blue-600 text-center pt-4">注意！：参加登録済みです</h1>
                <div class="flex justify-center pt-2">
                    <form action="/cancel_join_event/event/{{ $event->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="参加をキャンセルする" class="content-center text-white bg-rose-500 from-teal-400 via-teal-500 to-teal-600 hover:bg-rose-700 focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-2 mx-2"/>
                    </form>
                </div>
            @elseif ($event->users()->count() >= $event->capacity)
                <h1 class="text-blue-600 text-center pt-4">注意！：定員が埋まっているため、参加できません</h1>
            @else
                <div class="flex justify-center pt-5">
                    <form action="/join_event/{{ $event->id }}" method="POST">
                        @csrf
                        <input type="submit" value="参加登録する" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"/>
                    </form>
                </div>
            @endif
        </div>
    @endif
    
    <h1 class="text-center pt-6">Google Map</h1>
    <div class="flex justify-center pt-2 pb-12">
        <iframe id='gmap' class="w-3/5 h-96 border-solid border-2 border-black rounded-xl content-center" frameborder='0' src='https://www.google.com/maps/embed/v1/place?key={{ config('services.googlemap.key') }}&q={{ $event->address }}'></iframe>
    </div>
</x-app-layout>