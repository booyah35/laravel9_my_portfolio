<x-app-layout>
    <h1 class="text-center pt-4">こちらは{{ $host->name }}さんのプロフィールページです</h1>
    <div class="flex flex-col items-center py-3">
        @if (Auth::user()->profile_image === null)
           <img class="mb-3 w-48 h-48 rounded-full shadow-lg" src="{{ asset('images/noimage.jpg') }}" alt="プロフィール画像">
        @else
           <img class="mb-3 w-48 h-48 rounded-full shadow-lg" src="{{ Storage::url($host->profile_image) }}" alt="プロフィール画像">
        @endif
    </div>
    <div>
        @if ($host->users()->find(Auth::id()))
            <h1 class="text-blue-600 text-center pt-1">ステータス：フォロー中です</h1>
            <div class="flex justify-center pt-2">
                <form action="/unfollow_host/{{ $host->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="フォローを解除" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"/>
                </form>
            </div>
        @else
            <div class="flex justify-center pt-2">
                <form action="/follow_host/{{ $host->id }}" method="POST">
                    @csrf
                    <input type="submit" value="フォローする" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"/>
                </form>
            </div>
        @endif
    </div>
    <div class="flex justify-center pt-3">
        <table class="bg-red-100 border-separate border-2 border-gray-500 w-2/6 rounded-md">
            <tr><th class="w-1/2 border border-gray-400 py-2">項目</th><th class="w-1/2 border border-gray-400">内容</th></tr>
            <tr><th class="border border-gray-400 py-2">氏名</th><td class="border border-gray-400"><p class="text-center">{{ $host->name }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">年齢</th><td class="border border-gray-400"><p class="text-center">{{ $host->age }}歳</p></td></tr>
            <tr><th class="border border-gray-400 py-2">性別</th><td class="border border-gray-400"><p class="text-center">{{ $host->gender }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">スポーツ</th><td class="border border-gray-400"><p class="text-center">{{ $host->sport->name }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">フォロワー数</th><td class="border border-gray-400"><p class="text-center">{{ $host->users()->count() }}人</p></td></tr>
        </table>
    </div>
</x-app-layout>