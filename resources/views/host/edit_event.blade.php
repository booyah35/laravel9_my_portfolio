<x-app-layout>
    <form action="{{ route('update_event', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        @if ($errors->any())
    	    <div class="alert alert-danger">
    	        <ul>
    	            @foreach ($errors->all() as $error)
    	                <li class="text-orange-700">{{ $error }}</li>
    	            @endforeach
    	        </ul>
    	    </div>
    	@endif
    	<h1 class="text-center py-3">こちらはイベント修正ページです</h1>
    	<div class="flex justify-center">
            <table class="bg-cyan-100 border-separate border-2 border-gray-500 w-3/5 rounded-md">
                <tr>
                    <th class="w-2/6 border border-gray-400 py-2">項目</th>
                    <th class="w-4/6 border border-gray-400">内容</th>
                </tr>
                <tr>
                    <th class="border border-gray-400 py-2">イベント名</th>
                    <td class="border border-gray-400"><p class="text-center"></p>
                        <div>
                            <input id="name" type="text" name="event[name]" required value="{{ $event->name }}" class="flex w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="５０文字以内"></input>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400">イベントの概要</th>
                    <td class="border border-gray-400">
                        <textarea id="outline" name="event[outline]" rows="4" required value="{{ $event->outline }}" class="w-full mt-auto mb-auto flex text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="入力必須。３００字以内">{{ $event->outline }}</textarea>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400">開催地の住所</th>
                    <td class="border border-gray-400">
                        <input id="address" type="text" name="event[address]" required value="{{ $event->address }}" class="flex w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400">開催日程</th>
                    <td class="border border-gray-400">
                        <input id="event_date" type="date" name="event[event_date]" required value="{{ $event->event_date }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></input>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400">開始時間</th>
                    <td class="border border-gray-400">
                        <input id="start_time" type="time" name="event[start_time]" required value="{{ $event->start_time }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></input>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400">終了時間</th>
                    <td class="border border-gray-400">
                        <input id="finish_time" type="time" name="event[finish_time]" required value="{{ $event->finish_time }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></input>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400">参加定員</th>
                    <td class="border border-gray-400">
                        <input id="capacity" type="number" name="event[capacity]" required value="{{ $event->capacity }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></input>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400">スポーツ名</th>
                    <td class="border border-gray-400">
                        <select id="sport_id" name="event[sport_id]" data-toggle="select" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($sports as $sport)
                                <!--<option value="{{ $event->sport_id }}" @if($event->sport_id=='{{ $sport->id }}') selected @endif>{{ $sport->name }}</option>-->
                                <option value="{{ $sport->id }}" @if($event->sport->name == $sport->name) selected @endif>
                                    {{ $sport->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400">レベル</th>
                    <td class="border border-gray-400">
                        <select id="level_id" name="event[level_id]" data-toggle="select" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}" @if($event->level->name == $level->name) selected @endif>
                                    {{ $level->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        <div class="flex justify-center pt-10">
            <button type="submit" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">イベントを修正する</button>
        </div>
    </form>
</x-app-layout>