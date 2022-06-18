<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('氏名')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('メール')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('パスワード')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('パスワード（確認用）')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>
            
            <!-- hometown -->
            <div class="mt-4">
                <x-label for="hometown" :value="__('hometown')" />

                <x-input id="hometown" class="block mt-1 w-full" type="text" name="hometown" :value="old('hometown')" required />
            </div>
            
            <!-- telephpne -->
            <div class="mt-4">
                <x-label for="telephone" :value="__('電話番号')" />

                <x-input id="telephone"　placeholder="半角数字、ハイフン必須" class="block mt-1 w-full" type="tel" pattern="\d{2,4}-\d{3,4}-\d{3,4}" maxlength="13"　name="telephone" :value="old('telephone')" required />
            </div>
            
            <!-- age -->
            <div class="mt-4">
                <x-label for="age" :value="__('年齢')" />

                <x-input id="age" class="block mt-1 w-full" type="integer" name="age" :value="old('age')" required />
            </div>
            
            <!-- gender -->
            <div class="mt-4">
                <x-label for="gender" :value="__('性別')" />

                <x-input id="gender" class="block mt-1 w-full" type="radio" name="gender" :value="old('男性')" {{ old('gender') == "男性" ? 'checked' : ''}} required />男性
                <x-input id="gender" class="block mt-1 w-full" type="radio" name="gender" :value="old('女性')" {{ old('gender') == "男性" ? 'checked' : ''}} required />女性
            </div>
            
            <!-- interest -->
            <div class="mt-4">
                <x-label for="interest" :value="__('興味のあるスポーツ')" />

                <x-input id="interest" class="block mt-1 w-full" type="radio" name="interest" :value="old('')" required />
            </div>
            
            <!--  -->
            <div class="mt-4">
                <x-label for="" :value="__('')" />

                <x-input id="" class="block mt-1 w-full" type="text" name="" :value="{{ $sport->id }}" {{ old('interest') == $sport->id ? 'checked' : ''}} required /> {{ $sport->name }}
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('登録済みですか？?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('新規登録') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
