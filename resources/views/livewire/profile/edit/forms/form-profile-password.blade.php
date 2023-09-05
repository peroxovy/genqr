<div x-data="{ open : false }" class="p-4 flex flex-col bg-teal-300 border border-teal-400 rounded-md shadow-md">
    <div class="p-2 flex items-center">
        <h2 class="font-semibold text-teal-800 text-xl">{{ __('Password Update') }}</h2>
        <template x-if="!open">
            <button x-on:click="open = ! open" class="ml-2 px-2.5 rounded-md text-xl bg-teal-800 text-teal-200 shadow-xl hover:bg-teal-600 hover:text-teal-400">&darr;</button>
        </template>
        <template x-if="open">
            <button x-on:click="open = ! open" class="ml-2 px-2.5 rounded-md text-xl bg-teal-800 text-teal-200 shadow-xl hover:bg-teal-600 hover:text-teal-400">&uarr;</button>
        </template>
    </div>
    <div x-show="open" x-transition>
        <form wire:submit.prevent='updatePassword'>
            <div class="p-2 mt-2 flex flex-col bg-teal-400 shadow-sm rounded-md">
                <div>
                    <x-forms.label-text>New password</x-forms.label-text>
                    <x-forms.input-text wire:model.defer.blur="new_password" type="password" required/>
                    <div class="p-2 font-semibold text-red-400">@error('new_password') {{ $message }} @enderror</div>
                </div>
            </div>
            <div class="p-2 mt-2 flex flex-col bg-teal-400 shadow-sm rounded-md">
                <div>
                    <x-forms.label-text>Confirm new password</x-forms.label-text>
                    <x-forms.input-text wire:model.defer.blur="new_password_confirmation" type="password" required/>
                    <div class="p-2 font-semibold text-red-400">@error('new_password_confirmation') {{ $message }} @enderror</div>
                </div>
            </div>
            <div class="p-2 mt-2 flex flex-col bg-teal-400 shadow-sm rounded-md">
                <div>
                    <x-forms.label-text>Current password</x-forms.label-text>
                    <x-forms.input-text wire:model.defer.blur="password" type="password" required/>
                    <div class="p-2 font-semibold text-red-400">@error('password') {{ $message }} @enderror</div>
                </div>
            </div>
            <div class="p-2 mt-2 flex flex-col">
                <div>
                    <x-forms.button-action>Save</x-forms.button-action>
                </div>
            </div>
        </form>
    </div>
</div>
