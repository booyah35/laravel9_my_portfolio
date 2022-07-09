<x-app-layout>
    <h1>あなたが予約登録したイベントの一覧です</h1>
    
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-cyan-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-2 py-3">
                    イベント名
                </th>
                <th scope="col" class="px-2 py-3">
                    ジャンル
                </th>
                <th scope="col" class="px-2 py-3">
                    レベル
                </th>
                <th scope="col" class="px-2 py-3">
                    日程
                </th>
                <th scope="col" class="px-2 py-3">
                    開始時間
                </th>
                <th scope="col" class="px-2 py-3">
                    終了時間
                </th>
                <th scope="col" class="px-2 py-3">
                    概要
                </th>
            </tr>
        </thead>
        @foreach ($events as $event)
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-2 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    {{ $event->name }}
                </th>
                <td class="px-2 py-4">
                    {{ $event->sport->name }}
                </td>
                <td class="px-2 py-4">
                    {{ $event->level->name }}
                </td>
                <td class="px-2 py-4">
                    {{ $event->event_date }}
                </td>
                <td class="px-2 py-4">
                    {{ substr($event->start_time, 0, 5) }}
                </td>
                <td class="px-2 py-4">
                    {{ substr($event->finish_time, 0, 5) }}
                </td>
                <td class="px-2 py-4 text-left">
                    <a href="/detail_event/event/{{$event->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">詳細へ</a>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</x-app-layout>