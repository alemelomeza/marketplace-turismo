<div>
    @if($statusSubmit)
        Usuario Registrado!
    @endif
    <form wire:submit.prevent="submit" class="w-full p-6">
        @csrf
        <div class="flex flex-wrap mb-6">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                {{ __('Name') }}:
            </label>

            <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" wire:model="name" wire:debounce.500ms autofocus>

            @error('name')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="flex flex-wrap mb-6">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                {{ __('E-Mail Address') }}:
            </label>

            <input id="email" type="email" class="form-input w-full @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" wire:model="email">

            @error('email')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="flex flex-wrap mb-6">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                {{ __('Password') }}:
            </label>

            <input id="password" type="password" class="form-input w-full @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password" wire:model="password">

            @error('password')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="flex flex-wrap mb-6">
            <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">
                {{ __('Confirm Password') }}:
            </label>

            <input id="password-confirm" type="password" class="form-input w-full" name="password_confirmation" required autocomplete="new-password" wire:model="password_confirmation">
        </div>

        <div class="flex flex-wrap">
            <button type="submit" class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">
                {{ __('Register') }}
            </button>

            <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">
                {{ __('Already have an account?') }}
                <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('login') }}">
                    {{ __('Login') }}
                </a>
            </p>
        </div>
    </form>
</div>
