<x-app-layout>
    <div class="text-center pt-20" id="user_mk_review">
        <h1>このアカウントはユーザーアカウントのため、<br>イベントを作成することはできません。</h1>
        <h1 class="py-4">イベントを作成する場合はホストアカウントの登録が必要です。</h1>
        <h1>イベントを作成したい場合は、一度ユーザーアカウントからログアウトし、<br>ホストアカウントでログインしてください。</h1>
        <div class="flex justify-center pt-2">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <input type="submit" value="ログアウトする" class="content-center text-white bg-rose-500 from-teal-400 via-teal-500 to-teal-600 hover:bg-rose-700 focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-2 mx-2"/>
            </form>
        </div>
    </div>
</x-app-layout>