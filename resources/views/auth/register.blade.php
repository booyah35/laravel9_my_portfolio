<x-guest-layout>
    <x-auth-card>
        

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <h1 class="text-center">アマスポに新規登録する</h3>
            </div>
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('氏名')" />

                <x-input id="name" placeholder="例：アマスポ太郎" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('メールアドレス')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('パスワード')" />

                <x-input id="password" placeholder="半角英数、８文字以上" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('パスワード（確認用）')" />

                <x-input id="password_confirmation" placeholder="半角英数、８文字以上" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>
            
            <!-- hometown -->
            <div class="mt-4">
                <x-label for="hometown" :value="__('ホームタウン')" />

                <x-input id="hometown" placeholder="例：東京都世田谷区" class="block mt-1 w-full" type="text" name="hometown" :value="old('hometown')" required />
            </div>
            
            <div class="mt-4">
                <x-label for="telephone" :value="__('電話番号')" />

                <x-input id="telephone" placeholder="半角数字、ハイフン必須" class="block mt-1 w-full" type="tel" pattern="[0-9]{2,3}-[0-9]{3,4}-[0-9]{3,4}" name="telephone" :value="old('telephone')" required />
            </div>
            
            <!-- age -->
            <div class="mt-4">
                <x-label for="age" :value="__('年齢')" />

                <x-input id="age" placeholder="半角数字" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required />
            </div>
            
            <!-- gender -->
            <!--<div x-data="{gender: ''}" class="mt-4 flex w-full">-->
            <!--    <x-label for="gender" :value="__('性別')" />-->
            <!--    <div class="flex space-x-12 mx-auto mt-1">-->
            <!--        <x-input id="gender" class="flex mt-1" type="radio" name="gender" value="男性" x-model="gender" required />男性-->
            <!--        <x-input id="gender" class="flex mt-1" type="radio" name="gender" value="女性" x-model="gender" required />女性-->
            <!--    </div>-->
            <!--</div>-->
            
            <!-- gender -->
            <div x-data="{gender: ''}" class="mt-4 block">
                <x-label for="gender" :value="__('性別')" />
                <div class="block">
                    <x-input id="gender" class="" type="radio" name="gender" value="男性" x-model="gender" required />
                    <label class="" for="gender">男性 <br></label>
                    <x-input id="gender" class="" type="radio" name="gender" value="女性" x-model="gender" required />
                    <label class="" for="gender">女性</label>
                </div>
            </div>
            
            <!-- interest -->
            <div x-data="{interest: ''}" class="mt-4 block">
                <x-label for="interest" :value="__('興味のあるスポーツ')" />
                <div class="block">
                    @foreach ($sports as $sport)
                        <input id="interest" class="" type="radio" name="interest" :value="{{ $sport->id }}" x-model="interest" required >
                        <label class="" for="interest">{{ $sport->name }} <br></label>
                    @endforeach
                </div>
            </div>
        
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('登録済みですか？') }}
                </a>

                <x-button class="ml-4">
                    {{ __('新規登録') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
