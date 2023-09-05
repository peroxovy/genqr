<div class="p-6 mt-5 bg-teal-300 border border-teal-400 rounded-lg flex justify-center items-center">
    <div class="flex flex-col justify-center items-center p-4">
        <div class="p-2">
            <p class="text-lg md:text-xl font-semibold text-teal-900 drop-shadow">
                {{ __($title) }}</p>
        </div>
        <div class="p-2 mt-5">
            <img
                class="w-32 tablet:w-36 md:w-42 desktop:w-64"src="data:image/png;base64, {!! base64_encode(
                    QrCode::format('png')->size(200)->generate('Make me into an QrCode!'),
                ) !!} ">
        </div>
        <div class="p-2 mt-5 mb-5">
            <p class="md:text-lg text-teal-900 drop-shadow">
                {{ __($message) }}</p>
        </div>
        <div class="w-full mt-5">
            <x-forms.primary-button
                wire:click="$dispatch('openModal', { component: 'modals.code-create-modal' })">{{ __($buttonText) }}</x-forms.primary-button>
        </div>
    </div>
</div>
