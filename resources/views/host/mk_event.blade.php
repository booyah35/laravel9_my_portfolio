<x-app-layout>
    <form action="{{ route('str_event') }}" method="POST">
        @csrf
        @if ($errors->any())
    	    <div class="alert alert-danger">
    	        <ul>
    	            @foreach ($errors->all() as $error)
    	                <li class="text-orange-700">{{ $error }}</li>
    	            @endforeach
    	        </ul>
    	    </div>
    	@endif
    	<h1 class="text-center py-3">こちらはイベント作成ページです</h1>
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
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required class="flex w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="５０文字以内"></input>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400">イベントの概要</th>
                    <td class="border border-gray-400">
                        <textarea id="outline" name="outline" rows="4" required class="w-full mt-auto mb-auto flex text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="入力必須。３００文字以内">{{ old('outline') }}</textarea>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400">開催地の住所</th>
                    <td class="border border-gray-400">
                        <input id="address" type="text" name="address" value="{{ old('address') }}" required class="flex w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"placeholder="郵便番号不要。正確な住所を入力してください"></input>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400">開催日程</th>
                    <td class="border border-gray-400">
                        <input id="event_date" type="date" name="event_date" value="{{ old('event_date') }}" required class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></input>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400">開始時間</th>
                    <td class="border border-gray-400">
                        <input id="start_time" type="time" name="start_time" value="{{ old('start_time') }}" required class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></input>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400">終了時間</th>
                    <td class="border border-gray-400">
                        <input id="finish_time" type="time" name="finish_time" value="{{ old('finish_time') }}" required class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></input>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400">参加定員</th>
                    <td class="border border-gray-400">
                        <input id="capacity" type="number" name="capacity" value="{{ old('capacity') }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="半角数字で入力してください"></input>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400">スポーツ名</th>
                    <td class="border border-gray-400">
                        <select id="sport_id" name="sport_id" data-toggle="select" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">選択してください</option>
                            @foreach ($sports as $sport)
                                <option value="{{ $sport->id }}" @if($sport=='{{ $sport->name }}') selected @endif>{{ $sport->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400">レベル</th>
                    <td class="border border-gray-400">
                        <select id="level_id" name="level_id" data-toggle="select" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">選択してください</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}" @if($level=='{{ $level->name }}') selected @endif>{{ $level->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        <div class="flex justify-center pt-10">
            <button type="submit" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">イベントを作成する</button>
        </div>
    </form>
</x-app-layout>