<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />

            <div class="relative">
                <input id="update_password_current_password" name="current_password" type="password"
                    class="mt-1 block w-full pr-10 border-gray-300 rounded-md shadow-sm">

                <span onclick="togglePassword('update_password_current_password')" 
                    class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer text-gray-500">
                    👁️
                </span>
            </div>

            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />

            <div class="relative">
                <input id="update_password_password" name="password" type="password"
                    class="mt-1 block w-full pr-10 border-gray-300 rounded-md shadow-sm">

                <span onclick="togglePassword('update_password_password')" 
                    class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer text-gray-500">
                    👁️
                </span>
            </div>

            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

       <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />

            <div class="relative">
                <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                    class="mt-1 block w-full pr-10 border-gray-300 rounded-md shadow-sm">

                <span onclick="togglePassword('update_password_password_confirmation')" 
                    class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer text-gray-500">
                    👁️
                </span>
            </div>

            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>

        <!-- 🔥 NOTIFIKASI -->
        @if (session('status') === 'password-updated')
            <div class="mt-4 bg-green-100 text-green-700 px-4 py-2 rounded">
                Password berhasil diganti
            </div>
        @endif
    </form>
</section>

<script>
function togglePassword(id) {
    const input = document.getElementById(id);

    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}
</script>