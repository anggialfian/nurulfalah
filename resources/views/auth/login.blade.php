<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
<div class="mt-4">
    <x-input-label for="password" :value="__('Password')" />

    <div class="relative">
        <input id="password" type="password" name="password"
            class="block mt-1 w-full pr-10 border-gray-300 rounded-md shadow-sm"
            required>

        <span onclick="togglePassword()" 
            class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer text-gray-500">

            <svg xmlns="http://www.w3.org/2000/svg" 
                class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>

        </span>
    </div>

    <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600">Remember me</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                href="{{ route('password.request') }}">
                    Forgot your password?
                </a>
            @endif

            <x-primary-button class="ms-3">
                Log in
            </x-primary-button>
        </div>

        <!-- 🔥 REGISTER LINK -->
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-500">
                Belum punya akun?
                <a href="{{ route('register') }}" 
                class="font-medium text-indigo-600 hover:text-indigo-500">
                    Daftar sekarang
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>

<script>
function togglePassword() {
    const password = document.getElementById('password');

    if (password.type === "password") {
        password.type = "text";
    } else {
        password.type = "password";
    }
}
</script>