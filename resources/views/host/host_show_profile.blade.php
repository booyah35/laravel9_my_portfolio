<x-app-layout>
    <h1 class="text-center pt-4">こちらは{{ Auth::user()->name }}さんのプロフィールページです</h1>
    <div class="flex justify-center pt-3">
        <table class="bg-red-100 border-separate border-2 border-gray-500 w-3/5 rounded-md">
            <tr><th class="w-2/6 border border-gray-400 py-2">項目</th><th class="w-4/6 border border-gray-400">内容</th></tr>
            <tr><th class="border border-gray-400 py-2">氏名</th><td class="border border-gray-400"><p class="text-center">{{ Auth::user()->name }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">メールアドレス</th><td class="border border-gray-400"><p class="text-center">{{ Auth::user()->email }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">ホームタウン</th><td class="border border-gray-400"><p class="text-center">{{ Auth::user()->hometown }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">電話番号</th><td class="border border-gray-400"><p class="text-center">{{ Auth::user()->telephone }}</p></td></tr>
            <tr><th class="border border-gray-400 py-2">年齢</th><td class="border border-gray-400"><p class="text-center">{{ Auth::user()->age }}</p></td></tr>
        </table>
    </div>
        <div class="flex justify-center pt-2">
            <button class="content-center text-white bg-rose-500 from-teal-400 via-teal-500 to-teal-600 hover:bg-rose-700 focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-2 mx-2">
                <a href="/host/host_edit_profile">プロフィールを編集する</a>
            </button>    
        </div>
    </div>
</x-app-layout>