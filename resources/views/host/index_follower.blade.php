<x-app-layout>
    <div class="py-1">
        <h1 class="text-center text-xl">フォロワーリスト</h1>
    </div>
    <div class="flex justify-center overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-4/6 text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-cyan-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-2 py-3">
                        アイコン
                    </th>
                    <th scope="col" class="px-2 py-3">
                        氏名
                    </th>
                    <th scope="col" class="px-2 py-3">
                        性別
                    </th>
                    <th scope="col" class="px-2 py-3">
                        年齢
                    </th>
                    <th scope="col" class="px-2 py-3">
                        
                    </th>
                </tr>
            </thead>
            @foreach ($users as $user)
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-2 py-1">
                        @if ($user->profile_image === null)
                           <img class="w-12 h-12 rounded-full shadow-lg" src="{{ asset('images/noimage.jpg') }}" alt="プロフィール画像">
                        @else
                           <img class="w-12 h-12 rounded-full shadow-lg" src="{{ Storage::url($user->profile_image) }}" alt="プロフィール画像">
                        @endif
                    </td>
                    <td class="px-2 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{ $user->name }}
                    </td>
                    <td class="px-2 py-4">
                        {{ $user->gender }}
                    </td>
                    <td class="px-2 py-4">
                        {{ $user->age }}
                    </td>
                    <td class="px-2 py-4 text-left">
                        <a href="/host/show_user_profile/user/{{$user->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">詳細へ</a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</x-app-layout>