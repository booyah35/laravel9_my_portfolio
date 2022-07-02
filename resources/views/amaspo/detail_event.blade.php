<x-app-layout>
    <h1>こちらはイベントの詳細確認ページです</h1>
    
    <h3>イベント名</h3>
    <p>{{ $event->name }}</p>
    <h3>スポーツ名</h3>
    <p>{{ $event->sport->name }}</p>
    
    <h3>レベル</h3>
    <p>{{ $event->level->name }}</p>
    
    <h3>開催地</h3>
    <p>{{ $event->address }}</p>
    <h3>日程</h3>
    <p>{{ $event->event_date }}</p>
    <h3>開始時間</h3>
    <p>{{ $event->start_time }}</p>
    <h3>終了時間</h3>
    <p>{{ $event->finish_time }}</p>
    <h3>参加定員</h3>
    <p>{{ $event->capacity }}</p>
    <h3>概要</h3>
    <p>{{ $event->outline }}</p>
    
    <form action="/join_event/{{ $event->id }}" method="POST">
        @csrf
        <input type="submit" value="参加登録する" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"/>
    </form>
    

        <!--<table class="sample">-->
        <!--   <tr><th>No.</th><th>記事タイトル</th></tr>-->
        <!--   <tr><th>1</th><td><a href="https://allabout.co.jp/gm/gc/406307/">無料のウェブ作成ソフトMicrosoft Expression Web 4</a></td></tr>-->
        <!--   <tr><th>2</th><td><a href="https://allabout.co.jp/gm/gc/23770/">移転先へ自動移動(転送/リダイレクト)させる方法</a></td></tr>-->
        <!--   <tr><th>3</th><td><a href="https://allabout.co.jp/gm/gc/402551/">アイコンをWebフォントで表示！ Font Awesomeの使い方</a></td></tr>-->
        <!--   <tr><th>4</th><td><a href="https://allabout.co.jp/gm/gc/31800/">ホームページの作り方：4通りの作成方法から選ぶ</a></td></tr>-->
        <!--   <tr><th>5</th><td><a href="https://allabout.co.jp/gm/gc/23917/">アドレス欄やタブに独自アイコン「ファビコン」を表示</a></td></tr>-->
        <!--   <tr><th>6</th><td><a href="https://allabout.co.jp/gm/gc/406310/">CSS3を使って画像や文字を任意の角度で回転させる方法</a></td></tr>-->
        <!--</table>-->
        
    </table>
</x-app-layout>