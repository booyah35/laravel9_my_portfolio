<x-app-layout>
    <h1>こちらはイベントの詳細確認ページです</h1>
    
    <table class="w-auto">
       <tr><th class="w-2/5">項目</th>             <th class="w-3/5">内容</th></tr>
       <tr><th>イベント名</th>      <td><p class="text-center">{{ $event->name }}</p></td></tr>
       <tr><th>主催者</th>          <td><p class="text-center">{{ $event->host->name }}</p></td></tr>
       <tr><th>スポーツ名</th>      <td><p class="text-center">{{ $event->sport->name }}</p></td></tr>
       <tr><th>レベル</th>          <td><p class="text-center">{{ $event->level->name }}</p></td></tr>
       <tr><th>開催地</th>          <td><p class="text-center">{{ $event->address }}</p></td></tr>
       <tr><th>日程</th>            <td><p class="text-center">{{ $event->event_date }}</p></td></tr>
       <tr><th>開始時間</th>        <td><p class="text-center">{{ $event->start_time }}</p></td></tr>
       <tr><th>終了時間</th>        <td><p class="text-center">{{ $event->finish_time }}</p></td></tr>
       <tr><th>参加定員</th>        <td><p class="text-center">{{ $event->capacity }}</p></td></tr>
       <tr><th>概要</th>            <td><p class="text-center">{{ $event->outline }}</p></td></tr>
    </table>
    
    <form action="/cancel_join_event/event/{{ $event->id }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="修正する" class="text-white bg-rose-500 from-teal-400 via-teal-500 to-teal-600 hover:bg-rose-700 focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"/>
    </form>
</x-app-layout>