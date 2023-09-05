<div>
    @if ($routeName == 'qrcodes')
        <div
            class="flex flex-col md:w-64 p-4 m-2 bg-teal-400 hover:bg-teal-500 border border-teal-500 hover:border-teal-600 rounded shadow-md">

            <div class="p-2 flex justify-center">
                <img class="w-48" src="{{ asset('storage/' . $qrcode->image_path) }}">
            </div>
            <div class="flex items-center justify-between border-b border-teal-700">
                <livewire:like-button wire:key="user-{{ $qrcode->id }}" :qrcode="$qrcode">
                    <div class="m-2 p-2 flex space-x-1 text-teal-800 ">
                        <span class="text-xs font-semibold">{{ __('Views:') }}</span>
                        <span class="text-xs font-semibold">{{ $qrcode->qr_code_details->views }}</span>
                    </div>
            </div>
            <div class="p-2 flex justify-left">
                <div>
                    <div class="">
                        <span class="font-semibold text-lg text-teal-800">{{ $qrcode->qr_code_name }}</span>
                    </div>
                    <div class="mobile:hidden md:block">
                        <span
                            class="text-sm text-teal-700  break-all">{{ strlen($qrcode->qr_code_description) > 20 ? substr($qrcode->qr_code_description, 0, 20) . '...' : $qrcode->qr_code_description }}</span>
                    </div>
                </div>
            </div>

            <div class="mt-auto">
                <div class="p-2">
                    <div class="block">
                        <x-forms.primary-button
                            wire:click="$dispatch('openModal', {component: 'modals.code-details-modal', arguments: {qrcodeId: {{ $qrcode->id }}}})">Details</x-forms.primary-button>
                    </div>
                </div>
                <div class="p-2">
                    <div class="block">
                        <x-forms.danger-button
                            wire:click="$dispatch('openModal', {component: 'modals.code-delete-modal', arguments: {qrcodeId: {{ $qrcode->id }}}})">Delete</x-forms.danger-button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ($routeName == 'community')
        <div
            class="p-4 m-2 bg-teal-400 hover:bg-teal-500 border border-teal-500 hover:border-teal-600 rounded shadow-md">

            <div class="p-2 flex justify-center">
                <div class="flex flex-col">
                    <x-navigation.user-profile-link href="{{ route('user.show', $qrcode->user->id) }}"
                        wire:navigate.hover>{{ $qrcode->user->username }}</x-navigation.user-profile-link>
                </div>
            </div>
            <div class="p-2 flex justify-center">
                <img class="w-48" src="{{ asset('storage/' . $qrcode->image_path) }}">
            </div>
            <div class="flex items-center justify-between border-b border-teal-700">
                <livewire:like-button wire:key="community-{{ $qrcode->id }}" :qrcode="$qrcode">
                    <div class="m-2 p-2 flex space-x-1 text-teal-800 ">
                        <span class="text-xs font-semibold">{{ __('Views:') }}</span>
                        <span class="text-xs font-semibold">{{ $qrcode->qr_code_details->views }}</span>
                    </div>
            </div>
            <div class="p-2 flex justify-left">
                <div>
                    <div>
                        <span class="font-semibold text-lg text-teal-800">{{ $qrcode->qr_code_name }}</span>
                    </div>
                    <div class="mobile:hidden md:block">
                        <span class="text-sm text-teal-700">{{ $qrcode->qr_code_description }}</span>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <div class="block">
                    <x-forms.primary-button
                        wire:click="$dispatch('openModal', {component: 'modals.code-details-modal', arguments: {qrcodeId: {{ $qrcode->id }}}})">Details</x-forms.primary-button>
                </div>
            </div>
            <div class="p-2">
                <livewire:download-code wire:key="download-{{ $qrcode->id }}" :qrcode="$qrcode">
            </div>
        </div>
    @endif
</div>
