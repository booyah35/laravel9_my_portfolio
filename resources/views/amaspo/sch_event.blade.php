<x-app-layout>
    
    <div class="search">
        <form action="{{ route('sch_rslt') }}" method="GET">
            @csrf
            <div class="form-group">
                <div>
                    <label for="">キーワード
                    <div>
                        <input type="text" name="keyword" value="">
                    </div>
                    </label>
                </div>

                <div>
                    <label for="">ジャンル
                    <div>
                        <select name="sport" data-toggle="select">
                            <option value="">全て</option>
                            @foreach ($sports as $sport)
                                <option value="{{ $sport->id }}" @if($sport=='{{ $sport->name }}') selected @endif>{{ $sport->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </label>
                </div>

                <div>
                    <label for="">レベル
                    <div>
                        <select name="level" data-toggle="select">
                            <option value="">全て</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}" @if($level=='{{ $level->name }}') selected @endif>{{ $level->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </label>
                </div>
                
                <div>
                    <label for="">日程
                    <div>
                        <select name="event" data-toggle="select">
                            <option value="">全て</option>
                            @foreach ($events as $event)
                                <option value="{{ $event->event_date }}" @if($event=='{{ $event->event_date }}') selected @endif>{{ $event->event_date }}</option>
                            @endforeach
                        </select>
                    </div>
                    </label>
                </div>

                <div>
                    <!--<input type="submit" class="btn" value="検索">-->
                    <button type="submit" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">検索する</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
