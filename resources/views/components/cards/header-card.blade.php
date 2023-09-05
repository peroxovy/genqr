<div>
    <div class="p-4 mt-5 bg-teal-300 border border-teal-400 rounded-lg flex justify-center items-center shadow-md">
        <div class="flex w-full justify-center items-center p-4">
            <div class="p-2 flex flex-col justify-center items-center">
                <div class="p-2">
                    <h2 class="text-xl md:text-2xl font-semibold text-teal-900 drop-shadow">
                        {{ __('Hello ' . auth()->user()->username . ',') }}</h2>
                </div>
                <div class="p-2 mt-4 mb-5">
                    <span class="md:text-lg drop-shadow text-teal-900">{{ __($message) }}</span>
                </div>
                @if($routeName == 'dashboard' || $routeName == 'community')
                <div class="w-full">
                    <x-navigation.primary-nav-link :href="route('qrcodes')"
                        wire:navigate>{{ __($buttonText) }}</x-navigation.primary-nav-link>
                </div>
                @endif
                @if($routeName == 'qrcodes')
                <div class="w-full">
                    <x-forms.primary-button
                        wire:click="$dispatch('openModal', { component: 'modals.code-create-modal' })">
                        {{ __('Generate QR Code!') }}
                    </x-forms.primary-button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
