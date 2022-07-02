<x-guest-layout>
    <x-auth-card>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="GET" action="{{ route('host_login') }}">
            @csrf
            <h1 class="mb-5">注意：これはホストアカウントのログインフォームです</h1>
            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('メール')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('パスワード')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('ログインを保持する') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('パスワードをお忘れですか？') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('ログイン') }}
                </x-button>
            </div>
        </form>
        <div class="mt-40 mb-5">
            <h3 class="text-center text-sm text-gray-600">ホストアカウントをお持ちでないですか？</h3>
            <h3 class="text-center text-sm text-gray-600">ホストになるとイベントを作ることができます</h3>
            <x-button class="mt-4" onclick="location.href='/host/register'" method="GET" action="{{ route('host_register') }}">
                {{ __('ホストアカウントの新規作成') }}
            </x-button>
        </div>
        
    </x-auth-card>
</x-guest-layout>
