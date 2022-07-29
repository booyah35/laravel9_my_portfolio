<x-guest-layout>
    <div class="text-center pt-20" id="user_mk_review">
        <h1 class="py-4">アマスポではイベントを作成して参加者を募集することができます。</h1>
        <h1 class="py-4">イベントを作成するにはホストアカウントの登録が必要です。</h1>
        <h3 class="py-4 text-rose-500">注意：ユーザーアカウントではイベントの作成はできません。</h1>
        <div class="flex justify-center pt-2">
            <form method="GET" action="{{ route('host_login') }}">
                @csrf
                <input type="submit" value="ホストログインをする" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"/>
            </form>
        </div>
    </div>
</x-guest-layout>