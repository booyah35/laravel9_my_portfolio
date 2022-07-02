<x-app-layout>
    <table class="m-10">
        <tr class="">
            <div class="pt-5">
                <th>イベント名</th>
                <th>ジャンル</th>
                <th>レベル</th>
                <th>場所</th>
                <th>日程</th>
                <th class="px-3">開始時間</th>
                <th>終了時間</th>
                <th>参加定員</th>
                <th>概要</th>
                <th>参加登録</th>
            </div>
        </tr>

        @foreach ($searched_events as $searched_event)
        <tr>
            <div class="px-3">
                <td>{{ $searched_event->name }}</td>
                <td>{{ $searched_event->sport->name }}</td>
                <td>{{ $searched_event->level->name }}</td>
                <td>{{ $searched_event->address }}</td>
                <td>{{ $searched_event->event_date }}</td>
                <td>{{ $searched_event->start_time }}</td>
                <td>{{ $searched_event->finish_time }}</td>
                <td class="text-center" >{{ $searched_event->capacity }}</td>
                <td class="w-2/6" >{{ $searched_event->outline }}</td>
                <th value="searched_event->id"class="text-black bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                    <a href="/detail_event/event/{{$searched_event->id}}">詳細を見る</a>
                </th>
                
            </div>
        </tr>
        @endforeach
    </table>
</x-app-layout>