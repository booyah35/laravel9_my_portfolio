<x-app-layout>
    <form action="{{ route('host_update_profile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if ($errors->any())
    	    <div class="alert alert-danger">
    	        <ul>
    	            @foreach ($errors->all() as $error)
    	                <li class="text-orange-700">{{ $error }}</li>
    	            @endforeach
    	        </ul>
    	    </div>
    	@endif
    	<h1 class="text-center py-3">こちらは{{ Auth::user()->name }}さんのプロフィール修正ページです</h1>
    	<div id="fade_picture" class="flex flex-col items-center py-3">
            @if (Auth::user()->profile_image === null)
               <img id="prf_img" class="mb-3 w-48 h-48 rounded-full shadow-lg" src="{{ asset('images/noimage.jpg') }}" alt="プロフィール画像">
            @else
               <img id="prf_img" class="mb-3 w-48 h-48 rounded-full shadow-lg" src="{{ Storage::url(Auth::user()->profile_image) }}" alt="プロフィール画像">
            @endif
        </div>
        <div class="flex flex-col items-center py-3">
            <div id="preview"></div>
        </div>
        <div class="flex flex-col items-center pb-4">            
            <input id="profile_image" name="profile_image" type="file" class="form-control @error('profile-image') is-invalid @enderror" value="{{ Auth::user()->profile_image }}" accept="image/png, image/jpeg, image/jpg">
        </div>
        <div class="flex justify-center">
            <table class="bg-cyan-100 border-separate border-2 border-gray-500 w-3/5 rounded-md">
                <tr>
                    <th class="w-2/6 border border-gray-400 py-2">項目</th>
                    <th class="w-4/6 border border-gray-400">内容</th>
                </tr>
                <tr>
                    <th class="border border-gray-400 py-2">氏名</th>
                    <td class="border border-gray-400"><p class="text-center"></p>
                        <div>
                            <input id="name" type="text" name="host[name]" required value="{{ Auth::user()->name }}" class="flex w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="例：アマスポ太郎"></input>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400">メールアドレス</th>
                    <td class="border border-gray-400">
                        <input id="email" name="host[email]" rows="4" required value="{{ Auth::user()->email }}" class="w-full mt-auto mb-auto flex text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400">ホームタウン</th>
                    <td class="border border-gray-400">
                        <input id="hometown" type="text" name="host[hometown]" required value="{{ Auth::user()->hometown }}" class="flex w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="例：東京都世田谷区"></input>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400">電話番号</th>
                    <td class="border border-gray-400">
                        <input id="telephone" type="tel" name="host[telephone]" required value="{{ Auth::user()->telephone }}" pattern="[0-9]{2,3}-[0-9]{3,4}-[0-9]{3,4}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="半角数字、ハイフン必須"></input>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400">年齢</th>
                    <td class="border border-gray-400">
                        <input id="age" type="number" name="host[age]" required value="{{ Auth::user()->age }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="半角数字"></input>
                    </td>
                </tr>
            </table>
        </div>
        <div class="flex justify-center pt-10">
            <button type="submit" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">プロフィールを修正する</button>
        </div>
    </form>
</x-app-layout>