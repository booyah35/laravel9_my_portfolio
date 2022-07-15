<x-app-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                        場所
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
            @foreach ($searched_events as $searched_event)
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-2 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{ $searched_event->name }}
                    </th>
                    <td class="px-2 py-4">
                        {{ $searched_event->sport->name }}
                    </td>
                    <td class="px-2 py-4">
                        {{ $searched_event->level->name }}
                    </td>
                    <td class="px-2 py-4">
                        {{ $searched_event->address }}
                    </td>
                    <td class="px-2 py-4">
                        {{ $searched_event->event_date }}
                    </td>
                    <td class="px-2 py-4">
                        {{ substr($searched_event->start_time, 0, 5) }}
                    </td>
                    <td class="px-2 py-4">
                        {{ substr($searched_event->finish_time, 0, 5) }}
                    </td>
                    <td class="px-2 py-4 text-left">
                        <a href="/detail_event/event/{{$searched_event->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">詳細へ</a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</x-app-layout>