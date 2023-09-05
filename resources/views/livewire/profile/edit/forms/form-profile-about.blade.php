<div x-data="{ open : false }" class="p-4 flex flex-col bg-teal-300 border border-teal-400 rounded-md shadow-md">
    <div class="p-2 flex items-center">
        <h2 class="font-semibold text-teal-800 text-xl">{{ __('Bio') }}</h2>
        <template x-if="!open">
            <button x-on:click="open = ! open" class="ml-2 px-2.5 rounded-md text-xl bg-teal-800 text-teal-200 shadow-xl hover:bg-teal-600 hover:text-teal-400">&darr;</button>
        </template>
        <template x-if="open">
            <button x-on:click="open = ! open" class="ml-2 px-2.5 rounded-md text-xl bg-teal-800 text-teal-200 shadow-xl hover:bg-teal-600 hover:text-teal-400">&uarr;</button>
        </template>
    </div>
    <div x-show="open" x-transition>
        <form wire:submit.prevent="updateAbout">
        <div class="md:p-2 flex flex-col md:flex-row bg-teal-400 shadow-sm rounded-md">
            <div class="p-2 mt-2 md:p-0 w-full md:mr-2">
                <x-forms.label-text>About</x-forms.label-text>
                <x-forms.textarea wire:model.defer="about">{{$user->user_details->about != null ? $user->user_details->about : ''}}</x-forms.textarea>
                <div class="p-2 font-semibold text-red-400">@error('about') {{ $message }} @enderror</div>
            </div>
        </div>
        <div class="md:p-2 mt-2 flex flex-col md:flex-row">
            <div>
                <x-forms.button-action>Save</x-forms.button-action>
            </div>
        </div>
        </form>
    </div>
</div>
