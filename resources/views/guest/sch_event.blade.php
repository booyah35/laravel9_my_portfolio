<x-guest-layout>
    <div class="search ">
        <div class="py-1 bg-cyan-100">
            <h1 class="text-center text-xl">検索条件</h1>
        </div>
        <form action="{{ route('guest_sch_rslt') }}" method="GET">
            @csrf
            <div class="flex items-stretch bg-cyan-100 h-24">
                <div class="flex-1 text-gray-700 text-center bg-emerald-300 rounded-xl px-4 py-2 m-2">
                    <label for="sport" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">ジャンル
                        <div>
                            <select name="sport" data-toggle="select" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">全て</option>
                                @foreach ($sports as $sport)
                                    <option value="{{ $sport->id }}" @if($sport=='{{ $sport->name }}') selected @endif>{{ $sport->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </label>
                </div>
                <div class="self-auto flex-1 text-gray-800 text-center bg-emerald-300 rounded-xl px-4 py-2 m-2">
                    <div>
                        <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">レベル
                        <div>
                            <select name="level" data-toggle="select" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">全て</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}" @if($level=='{{ $level->name }}') selected @endif>{{ $level->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        </label>
                    </div>
                </div>
                <div class="flex-1 text-gray-700 text-center bg-emerald-300 rounded-xl px-4 py-2 m-2">
                    <div>
                        <label for="event" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">日程
                        <div>
                            <select name="event" data-toggle="select" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">全て</option>
                                @foreach ($events as $event)
                                    <option value="{{ $event->event_date }}" @if($event=='{{ $event->event_date }}') selected @endif>{{ $event->event_date }}</option>
                                @endforeach
                            </select>
                        </div>
                        </label>
                    </div>
                </div>
                <div>
                    <!--<input type="submit" class="btn" value="検索">-->
                    <button type="submit" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mt-6 mb-6">検索する</button>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>
