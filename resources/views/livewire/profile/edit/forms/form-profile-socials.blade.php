<div x-data="{ open : false }" class="p-4 flex flex-col bg-teal-300 border border-teal-400 rounded-md shadow-md">
    <div class="p-2 flex items-center">
        <h2 class="font-semibold text-teal-800 text-xl">{{ __('Socials') }}</h2>
        <template x-if="!open">
            <button x-on:click="open = ! open" class="ml-2 px-2.5 rounded-md text-xl bg-teal-800 text-teal-200 shadow-xl hover:bg-teal-600 hover:text-teal-400">&darr;</button>
        </template>
        <template x-if="open">
            <button x-on:click="open = ! open" class="ml-2 px-2.5 rounded-md text-xl bg-teal-800 text-teal-200 shadow-xl hover:bg-teal-600 hover:text-teal-400">&uarr;</button>
        </template>
    </div>
    <div x-show="open" x-transition>
        <form wire:submit.prevent="updateSocials">
        <div class="md:p-2 mt-2 flex flex-col md:flex-row bg-teal-400 shadow-sm rounded-md">
            <div class="p-2 md:p-0 w-full md:mr-2">
                <x-forms.label-text>Github URL</x-forms.label-text>
                <x-forms.input-text wire:model.lazy="url_github" value="{{$user->user_details->url_github != null ? $user->user_details->url_github : ''}}"/>
                <div class="p-2 font-semibold text-red-400">@error('url_github') {{ $message }} @enderror</div>
            </div>
            <div class="p-2 md:p-0 w-full mr-2">
                <x-forms.label-text>Linkedin URL</x-forms.label-text>
                <x-forms.input-text wire:model.lazy="url_linkedin" value="{{$user->user_details->url_linkedin != null ? $user->user_details->url_linkedin : ''}}"/>
                    <div class="p-2 font-semibold text-red-400">@error('url_linkedin') {{ $message }} @enderror</div>
            </div>
        </div>
        <div class="md:p-2 mt-2 flex flex-col md:flex-row bg-teal-400 shadow-sm rounded-md">
            <div class="p-2 md:p-0 w-full md:mr-2">
                <x-forms.label-text>Youtube URL</x-forms.label-text>
                <x-forms.input-text wire:model.lazy="url_youtube" value="{{$user->user_details->url_youtube != null ? $user->user_details->url_youtube : ''}}"/>
                <div class="p-2 font-semibold text-red-400">@error('url_youtube') {{ $message }} @enderror</div>
            </div>
            <div class="p-2 md:p-0 w-full mr-2">
                <x-forms.label-text>Facebook URL</x-forms.label-text>
                <x-forms.input-text wire:model.lazy="url_facebook" value="{{$user->user_details->url_facebook != null ? $user->user_details->url_facebook : ''}}"/>
                <div class="p-2 font-semibold text-red-400">@error('url_facebook') {{ $message }} @enderror</div>
            </div>
        </div>
        <div class="md:p-2 mt-2 flex flex-col md:flex-row bg-teal-400 shadow-sm rounded-md">
            <div class="p-2 md:p-0 w-full md:mr-2">
                <x-forms.label-text>Instagram URL</x-forms.label-text>
                <x-forms.input-text wire:model.lazy="url_instagram" value="{{$user->user_details->url_instagram != null ? $user->user_details->url_instagram : ''}}"/>
                <div class="p-2 font-semibold text-red-400">@error('url_instagram') {{ $message }} @enderror</div>
            </div>
            <div class="p-2 md:p-0 w-full mr-2">
                <x-forms.label-text>Twitter URL</x-forms.label-text>
                <x-forms.input-text wire:model.lazy="url_twitter" value="{{$user->user_details->url_twitter != null ? $user->user_details->url_twitter : ''}}"/>
                <div class="p-2 font-semibold text-red-400">@error('url_twitter') {{ $message }} @enderror</div>
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
