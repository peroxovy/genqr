<div class="p-4 flex flex-col bg-teal-300 border border-teal-400 rounded-md shadow-md">
    <div class="p-2">
        <h2 class="font-semibold text-teal-800 text-xl">{{ __('Account Data') }}</h2>
    </div>
    <form wire:submit.prevent='updateAccountData'>
    <div class="p-2 mt-2 flex flex-col bg-teal-400 shadow-sm rounded-md">
        <div>
            <x-forms.label-text>Username</x-forms.label-text>
            <x-forms.input-text wire:model.lazy="username" required/>
            <div class="p-2 font-semibold text-red-400">@error('username') {{ $message }} @enderror</div>
        </div>
    </div>
    <div class="p-2 mt-2 flex flex-col bg-teal-400 shadow-sm rounded-md">
        <div>
            <x-forms.label-text>E-mail</x-forms.label-text>
            <x-forms.input-text wire:model.lazy="email" required/>
            <div class="p-2 font-semibold text-red-400">@error('email') {{ $message }} @enderror</div>
        </div>
    </div>
    <div class="p-2 mt-2 flex flex-col">
        <div>
            <x-forms.button-action>Save</x-forms.button-action>
        </div>
    </div>
    </form>
</div>
