<x-app-layout>
    <h1 class="text-center py-3">レビューの作成ページです</h1>
    <form action="{{ route('str_review') }}" method="POST">
        @csrf
        
        @if ($errors->any())
    	    <div class="alert alert-danger">
    	        <ul>
    	            @foreach ($errors->all() as $error)
    	                <li class="text-orange-700">{{ $error }}</li>
    	            @endforeach
    	        </ul>
    	    </div>
    	@endif
        
        <div class="flex justify-center">
            <table class="bg-cyan-100 border-separate border-2 border-gray-500 w-3/5 rounded-md">
                <tr>
                    <th class="w-2/6 border border-gray-400 py-2">項目</th>
                    <th class="w-4/6 border border-gray-400">内容</th>
                </tr>
                <tr>
                    <th class="border border-gray-400 py-2">ホストを選択</th>
                    <td class="border border-gray-400"><p class="text-center"></p>
                        <div>
                            <select name="host_id" data-toggle="select" required class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">選択する</option>
                                @foreach ($hosts as $host)
                                    <option value="{{ $host->id }}" @if($host=='{{ $host->name }}') selected @endif>{{ $host->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400 py-2">５段階評価</th>
                    <td class="border border-gray-400"><p class="text-center"></p>
                        <div>
                            <div class="flex items-center mb-4">
                                <input id="evaluation" type="radio" name="evaluation" value="5" required class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="evaluation" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">⭐⭐️⭐⭐️⭐</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="evaluation" type="radio" name="evaluation" value="4" required class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="evaluation" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">⭐⭐️⭐️⭐</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="evaluation" type="radio" name="evaluation" value="3" required class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="evaluation" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">⭐⭐️⭐</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="evaluation" type="radio" name="evaluation" value="2" required class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="evaluation" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">⭐️⭐</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="evaluation" type="radio" name="evaluation" value="1" required class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="evaluation" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">️⭐</label>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="border border-gray-400">コメント</th>
                    <td class="border border-gray-400">
                        <textarea id="comments" name="comments" rows="4" value="{{ old('comments') }}" class="w-full h-full mt-auto mb-auto flex text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="コメント必須。最大８００文字"></textarea>
                    </td>
                </tr>
            </table>
        </div>
    
        <!--<div class="flex justify-center pt-5">-->
        <!--    <label for="host_id" class="pt-2 pr-4 text-gray-900 dark:text-gray-400">ホストを選択</label>-->
        <!--        <div>-->
        <!--            <select name="host_id" data-toggle="select" class="w-60 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">-->
        <!--                <option value="">選択する</option>-->
        <!--                @foreach ($hosts as $host)-->
        <!--                    <option value="{{ $host->id }}" @if($host=='{{ $host->name }}') selected @endif>{{ $host->name }}</option>-->
        <!--                @endforeach-->
        <!--            </select>-->
        <!--        </div>-->
        <!--    </label>-->
        <!--</div>-->
        
        <!--<input id="evaluation" type="checkbox" name="evaluation" value="5" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">-->
        <!--<div class="flex justify-center pt-5">-->
        <!--    <h1>５段階評価</h1>-->
        <!--    <div>-->
        <!--        <div class="flex items-center mb-4">-->
        <!--            <input id="evaluation" type="radio" name="evaluation" value="5" required class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">-->
        <!--            <label for="evaluation" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">⭐⭐️⭐⭐️⭐</label>-->
        <!--        </div>-->
        <!--        <div class="flex items-center mb-4">-->
        <!--            <input id="evaluation" type="radio" name="evaluation" value="4" required class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">-->
        <!--            <label for="evaluation" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">⭐⭐️⭐️⭐</label>-->
        <!--        </div>-->
        <!--        <div class="flex items-center mb-4">-->
        <!--            <input id="evaluation" type="radio" name="evaluation" value="3" required class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">-->
        <!--            <label for="evaluation" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">⭐⭐️⭐</label>-->
        <!--        </div>-->
        <!--        <div class="flex items-center mb-4">-->
        <!--            <input id="evaluation" type="radio" name="evaluation" value="2" required class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">-->
        <!--            <label for="evaluation" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">⭐️⭐</label>-->
        <!--        </div>-->
        <!--        <div class="flex items-center mb-4">-->
        <!--            <input id="evaluation" type="radio" name="evaluation" value="1" required class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">-->
        <!--            <label for="evaluation" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">️⭐</label>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!--<div class="flex justify-center">-->
        <!--    <label for="comments" class="pt-10 pr-3 text-sm font-medium text-gray-900 dark:text-gray-400">コメント</label>-->
        <!--    <textarea id="comments" name="comments" rows="4" value="{{ old('comments') }}" class="w-3/5 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="コメント必須。最大８００文字"></textarea>-->
        <!--</div>-->

        <!--送信ボタン-->
        <div class="flex justify-center pt-4">
            <button type="submit" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">レビューを投稿する</button>
        </div>
    </form>
</x-app-layout>