<div x-data="{ open : false }" class="p-4 flex flex-col bg-teal-300 border border-teal-400 rounded-md shadow-md">
    <div class="p-2 flex items-center">
        <h2 class="font-semibold text-teal-800 text-xl">{{ __('User Details') }}</h2>
        <template x-if="!open">
            <button x-on:click="open = ! open" class="ml-2 px-2.5 rounded-md text-xl bg-teal-800 text-teal-200 shadow-xl hover:bg-teal-600 hover:text-teal-400">&darr;</button>
        </template>
        <template x-if="open">
            <button x-on:click="open = ! open" class="ml-2 px-2.5 rounded-md text-xl bg-teal-800 text-teal-200 shadow-xl hover:bg-teal-600 hover:text-teal-400">&uarr;</button>
        </template>
    </div>
    <div x-show="open" x-transition>
        <form wire:submit.prevent="updateUserDetails">
        <div class="md:p-2 mt-2 flex flex-col md:flex-row bg-teal-400 shadow-sm rounded-md">
            <div class="p-2 md:p-0 w-full md:mr-2">
                <x-forms.label-text>First Name</x-forms.label-text>
                <x-forms.input-text wire:model.defer="firstname" value="{{$user->user_details->firstname != null ? $user->user_details->firstname : ''}}"/>
                <div class="p-2 font-semibold text-red-400">@error('firstname') {{ $message }} @enderror</div>
            </div>
            <div class="p-2 md:p-0 w-full mr-2 ">
                <x-forms.label-text>Last Name</x-forms.label-text>
                <x-forms.input-text wire:model.defer="lastname" value="{{$user->user_details->lastname != null ? $user->user_details->lastname : ''}}"/>
                <div class="p-2 font-semibold text-red-400">@error('lastname') {{ $message }} @enderror</div>
            </div>
        </div>
        <div class="md:p-2 mt-2 flex flex-col md:flex-row bg-teal-400 shadow-sm rounded-md">
            <div class="p-2 md:p-0 w-full md:mr-2">
                <x-forms.label-text>Country</x-forms.label-text>
                <x-forms.input-text wire:model.defer="country" value="{{$user->user_details->country != null ? $user->user_details->country : ''}}"/>
                <div class="p-2 font-semibold text-red-400">@error('country') {{ $message }} @enderror</div>
            </div>
            <div class="p-2 md:p-0 w-full mr-2">
                <x-forms.label-text>City</x-forms.label-text>
                <x-forms.input-text wire:model.defer="city" value="{{$user->user_details->city != null ? $user->user_details->city : ''}}"/>
                <div class="p-2 font-semibold text-red-400">@error('city') {{ $message }} @enderror</div>
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
