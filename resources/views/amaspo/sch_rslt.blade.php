<x-app-layout>
    <div class="py-1">
        <h1 class="text-center text-xl">検索結果</h1>
    </div>
    <form action="{{ route('sch_rslt') }}" method="GET">
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
                    <label for="event_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">日程
                    <div>
                        <input id="event_date" type="date" name="event_date" value="{{ old('event_date') }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></input>
                    </div>
                    </label>
                </div>
            </div>
            <div>
                <button type="submit" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mt-6 mb-6">検索する</button>
            </div>
        </div>
    </form>
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
                        <!--aaa-->
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
        {{ $searched_events->appends(request()->query())->links() }}
    </div>
</x-app-layout>