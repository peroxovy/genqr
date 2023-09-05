<div class=" bg-teal-400 rounded-lg shadow border-2 border-teal-600">
    <div class="p-6">
        <div class="p-2">
            <div class="p-2 flex justify-center">
                <img class="w-48"
                    src="{{ asset('storage/' . $qrcode->image_path) }}">
            </div>
        </div>
        <div class="p-2">
            <div class="p-2 bg-teal-300 border border-teal-600 drop-shadow rounded">
                <div class="p-2">
                    <span class="font-semibold text-lg text-teal-800">{{ $qrcode->qr_code_name }}</span>
                </div>
                <div class="p-2 ml-2">
                    <span class="text-md text-teal-800">{{ $qrcode->qr_code_description }}</span>
                </div>
            </div>

            <div class="mt-2 p-2 bg-teal-300 border border-teal-600 drop-shadow rounded">
                <div class="flex divide-x-2 justify-between items-center divide-teal-400 p-2">
                    <livewire:like-button :qrcode="$qrcode">
                    <div class="p-2 flex space-x-1">
                        <span class="text-xs font-semibold text-teal-800">{{ __('Views:') }}</span>
                        <span class="text-xs font-semibold text-teal-800">{{ $qrcode->qr_code_details->views }}</span>
                    </div>
                    <div class="p-2 flex space-x-1">
                        <span class="text-xs font-semibold text-teal-800">{{ __('Downloads:') }}</span>
                        <span class="text-xs font-semibold text-teal-800">{{ $qrcode->qr_code_details->downloads }}</span>
                    </div>
                    <div class="p-2 flex space-x-1">
                        <span class="text-xs font-semibold text-teal-800">{{ __('Shares:') }}</span>
                        <span class="text-xs font-semibold text-teal-800">{{ $qrcode->qr_code_details->shares }}</span>
                    </div>
                </div>
            </div>

            <div class="mt-2 p-2 bg-teal-300 border border-teal-600 drop-shadow rounded">
                <div class="p-2 mb-2">
                    <h2 class="font-semibold text-teal-800 text-lg">{{__('Details')}}</h2>
                </div>
                @if($qrcode->user_id == auth()->user()->id)
                <div class="p-2 flex items-center justify-between border-b border-teal-400">
                    <div>
                        <span class="font-semibold text-teal-900 ">{{__('Public?:')}}</span>
                        <span class="text-teal-800">{{ $qrcode->is_public ? 'Yes' : 'No' }}</span>
                    </div>
                    <div>
                        <x-forms.primary-button wire:click="changePrivacy">Change privacy</x-forms.primary-button>
                    </div>
                </div>
                @endif
                <div class="p-2  border-b border-teal-400">
                    <span class="font-semibold text-teal-900">{{__('Type:')}}</span>
                    <span class="text-teal-800">{{ $qrcode->qr_code_type->type_name }}</span>
                </div>
                <div class="p-2  border-b border-teal-400">
                    <span class="font-semibold text-teal-900">{{__('Error correction:')}}</span>
                    <span class="text-teal-800">{{ $qrcode->error_correction->error_correction_name }}</span>
                </div>
            </div>

        </div>
        <div class="p-2">
            <livewire:download-code :qrcode="$qrcode">
        </div>
        <div class="p-2">
            <x-forms.warning-button wire:click="$dispatch('closeModal')" wire:ignore>Close</x-forms.warning-button>
        </div>
    </div>
</div>
