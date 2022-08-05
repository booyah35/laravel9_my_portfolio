<x-app-layout>
    <h1 class="text-center pt-2">こちらは作成したイベントの詳細確認ページです</h1>
    <div class="flex justify-center pt-3">
        <table class="bg-red-100 border-separate border-2 border-gray-500 w-3/5 rounded-md">
            <tr><th class="w-2/6 border border-gray-400 py-2">項目</th><th class="w-4/6 border border-gray-400">内容</th></tr>
            @if ($date > $event->event_date)
                <tr><th class="border border-gray-400 py-2">イベント名</th><td class="border border-gray-400"><p class="text-center">＜募集終了＞{{ $event->name }}</p></td></tr>
            @else
                <tr><th class="border border-gray-400 py-2">イベント名</th><td class="border border-gray-400"><p class="text-center">{{ $event->name }}</p></td></tr>
            @endif
            @if ($event->host()->find(Auth::id()))
                <tr><th class="border border-gray-400 py-2">主催者</th><td class="border border-gray-400"><p class="text-center">{{ $event->host->name }}</p></td></tr>
            @else
                <tr><th class="border border-gray-400 py-2">主催者</th><td class="border border-gray-400"><div class="flex justify-center"><a href="/host/show_other_host_profile/host/{{ $event->host->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ $event->host->name }}</a></div></td></tr>
            @endif
            <tr><th class="border border-gray-400 py-2">スポーツ名</th><td class="border border-gray-400"><p class="text-center">{{ $event->sport->name }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">レベル</th><td class="border border-gray-400"><p class="text-center">{{ $event->level->name }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">開催地</th><td class="border border-gray-400"><p class="text-center">{{ $event->address }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">日程</th><td class="border border-gray-400"><p class="text-center">{{ $event->event_date }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">開始時間</th><td class="border border-gray-400"><p class="text-center">{{ substr($event->start_time, 0, 5) }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">終了時間</th><td class="border border-gray-400"><p class="text-center">{{ substr($event->finish_time, 0, 5) }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">参加定員</th><td class="border border-gray-400"><p class="text-center">{{ $event->capacity }}人（{{ $event->users()->count() }}人参加登録済み）</p></td></tr>
            <tr><th class="border border-gray-400 py-2">概要</th><td class="border border-gray-400"><p class="">{{ $event->outline }}</p></td></tr>
            @if ($event->host()->find(Auth::id()))
                <tr><th class="border border-gray-400 py-2">参加者名</th><td class="border border-gray-400">@foreach ($users as $user)<a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="/host/show_user_profile/user/{{$user->id }}">{{ $user->name }}</a>、@endforeach</td></tr>
            @else
            @endif
        </table>
    </div>
    @if ($date > $event->event_date)
        @if($event->host()->find(Auth::id()))
            <h1 class="text-blue-600 text-center pt-5 pb-4">注意！：募集期間が終了したため取り消しや修正はできません</h1>
        @else
            <h1 class="text-blue-600 text-center pt-5 pb-4">注意！：ホストアカウントのためイベントの参加登録はできません</h1>
        @endif
    @else
        @if($event->host()->find(Auth::id()))
            <div class="flex place-content-center pt-5">
                <form action="/delete_event/event/{{ $event->id }}" id="alert_delete_event" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="イベントを取り消す" class="text-right text-white bg-rose-500 from-teal-400 via-teal-500 to-teal-600 hover:bg-rose-700 focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"/>
                </form>
                <form action="/host/edit_event/event/{{ $event->id }}" method="GET">
                    @csrf
                    <input type="submit" value="修正する" class="text-right text-white bg-violet-500 from-teal-400 via-teal-500 to-teal-600 hover:bg-violet-700 focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ml-6"/>
                </form>
            </div>
        @else
            <h1 class="text-blue-600 text-center pt-5 pb-4">注意！：ホストアカウントのためイベントの参加登録はできません</h1>
        @endif
    @endif
    <div class="flex justify-center pt-4 pb-20">
        <iframe id='gmap' class="w-3/5 h-96 border-solid border-2 border-black rounded-xl content-center" frameborder='0' src='https://www.google.com/maps/embed/v1/place?key={{ config('services.googlemap.key') }}&q={{ $event->address }}'></iframe>
    </div>
</x-app-layout>