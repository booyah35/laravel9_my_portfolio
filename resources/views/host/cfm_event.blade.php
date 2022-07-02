<x-app-layout>
    <h1>ホストのイベント確認ページです</h1>
    <table border="2" width="1000">
        <tr>
            <th class="10%">イベント名</th>
            <th class="15%">スポーツ名</th>
            <th class="10%">レベル</th>
            <th class="15%">開催地</th>
            <th class="5%">日程</th>
            <th class="10%">開始時間</th>
            <th class="10%">終了時間</th>
            <th class="5%">参加定員</th>
            <!--<th class="20%">概要</th>-->
        </tr>

        @foreach ($events as $event)
        <tr>
            <td>{{ $event->name }}</td>
            <td>{{ $event->sport->name }}</td>
            <td>{{ $event->level->name }}</td>
            <td>{{ $event->address }}</td>
            <td>{{ $event->event_date }}</td>
            <td>{{ $event->start_time }}</td>
            <td>{{ $event->finish_time }}</td>
            <td>{{ $event->capacity }}</td>
            <!--<td>{{ $event->outline }}</td>-->
        </tr>
        @endforeach
    </table>
</x-app-layout>