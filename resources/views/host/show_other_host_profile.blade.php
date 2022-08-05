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
        <h1 class="text-blue-600 text-center pt-1">ホストアカウントのため</br>他のホストをフォローすることはできません</h1>
    </div>
    <div class="flex justify-center pt-3">
        <table class="bg-red-100 border-separate border-2 border-gray-500 w-2/6 rounded-md">
            <tr><th class="w-1/2 border border-gray-400 py-2">項目</th><th class="w-1/2 border border-gray-400">内容</th></tr>
            <tr><th class="border border-gray-400 py-2">氏名</th><td class="border border-gray-400"><p class="text-center">{{ $host->name }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">年齢</th><td class="border border-gray-400"><p class="text-center">{{ $host->age }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">性別</th><td class="border border-gray-400"><p class="text-center">{{ $host->gender }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">スポーツ</th><td class="border border-gray-400"><p class="text-center">{{ $host->sport->name }}</p></td></tr>
        </table>
    </div>
</x-app-layout>