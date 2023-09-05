<div class="py-12">
    <div class="relative py-12">
        <div
            class="absolute top-0 -left-2 md:-left-4 w-24 h-24 md:w-72 md:h-72 bg-lime-400 rounded-full  filter blur-xl opacity-70 animate-blob">
        </div>
        <div
            class="absolute top-0 -right-2 md:-right-4 w-24 h-24 md:w-72 md:h-72 bg-teal-600 rounded-full  filter blur-xl opacity-70 animate-blob animation-delay-2000">
        </div>
        <div
            class="absolute -bottom-8 left-10 md:left-20 w-24 h-24 md:w-72 md:h-72 bg-green-400 rounded-full  filter blur-xl opacity-70 animate-blob animation-delay-4000">
        </div>
        <div class="relative">
            <div class="p-6 flex justify-center">
                <x-app.application-logo />
            </div>
            <div class="p-6 bg-teal-400 rounded-xl drop-shadow border-2 border-teal-600">
                <div>
                    <x-session.session-status/>
                </div>
                <form wire:submit="login">
                    <div class="p-2">
                        <x-forms.label-text>E-mail</x-forms.label-text>
                        <x-forms.input-text wire:model.lazy='email' type='email' required />
                        <div class="p-2 font-semibold text-red-400">@error('email') {{ $message }} @enderror</div>
                    </div>
                    <div class="p-2">
                        <x-forms.label-text>Password</x-forms.label-text>
                        <x-forms.input-text wire:model.lazy.blur='password' type="password" required />
                        <div class="p-2 font-semibold text-red-400">@error('password') {{ $message }} @enderror</div>
                    </div>
                    <div class="p-2">
                        <x-forms.primary-button type='submit'
                            wire:loading.attr="disabled">Login</x-forms.primary-button>
                    </div>
                    <div class="p-2">
                        <div class="flex space-x-1">
                            <span class="text-xs text-teal-900">{{ __('Do not have an account?') }}</span>
                            <a href="{{ route('register') }}"
                                class="text-xs font-semibold text-teal-900 hover:text-sky-400">Register</a>
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="flex items-center justify-end">
                            <a href="{{route('login.google')}}">
                                <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
