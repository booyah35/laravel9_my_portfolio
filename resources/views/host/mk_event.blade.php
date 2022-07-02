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
        
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">イベント名</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="５０文字以内"></input>
        
        <label for="outline" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">イベントの概要</label>
        <textarea id="outline" name="outline" rows="4" value="{{ old('outline') }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="３００文字以内"></textarea>
        
        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">開催地の住所</label>
        <input id="address" type="text" name="address" value="{{ old('address') }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></input>
        
        <label for="event_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">開催日程</label>
        <input id="event_date" type="date" name="event_date" value="{{ old('event_date') }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></input>
        
        <label for="start_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">開始時間</label>
        <input id="start_time" type="time" name="start_time" value="{{ old('start_time') }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></input>
        
        <label for="finish_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">終了時間</label>
        <input id="finish_time" type="time" name="finish_time" value="{{ old('finish_time') }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></input>
        
        <label for="capacity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">参加定員</label>
        <input id="capacity" type="number" name="capacity" value="{{ old('capacity') }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></input>
        
        <label for="sport_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">スポーツ名</label>
        <select id="sport_id" name="sport_id" data-toggle="select" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach ($sports as $sport)
                <option value="{{ $sport->id }}" @if($sport=='{{ $sport->name }}') selected @endif>{{ $sport->name }}</option>
            @endforeach
        </select>

        <label for="level_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">レベル</label>
        <select id="level_id" name="level_id" data-toggle="select" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach ($levels as $level)
                <option value="{{ $level->id }}" @if($level=='{{ $level->name }}') selected @endif>{{ $level->name }}</option>
            @endforeach
        </select>
        
        <button type="submit" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">イベントを作成する</button>
        
        <!--<h4>タイトル</h4>-->
        <!--<input type="text" name="name" placeholder=""/><br>-->
        <!--<h4>イベントの概要</h4>-->
        <!--<textarea name="outline" placeholder=""></textarea>-->
        <!--<h4>開催地の住所</h4>-->
        <!--<textarea name="address"  placeholder=""/></textarea>-->
        <!--<h4>開催日程</h4>-->
        <!--<input type="date" name="event_date" placeholder=""/><br>-->
        <!--<h4>開始時間</h4>-->
        <!--<input type="time" name="start_time" placeholder=""/><br>-->
        <!--<h4>終了時間</h4>-->
        <!--<input type="time" name="finish_time" placeholder=""/><br>-->
        <!--<h4>参加定員</h4>-->
        <!--<input type="number" name="capacity" placeholder=""/><br>-->
        
    </form>
</x-app-layout>