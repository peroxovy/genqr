<div class="w-full p-4 m-2 bg-teal-400 hover:bg-teal-500 border border-teal-500 hover:border-teal-600 rounded shadow-sm">
    @if($ownership == 'community')
    <div class="flex justify-center space-x-1 ">
        <x-navigation.user-profile-link href="{{ route('user.show', $qrcode->user->id) }}"
            wire:navigate.hover>{{ $qrcode->user->username }}</x-navigation.user-profile-link>
        <span class="font-semibold text-teal-950">{{ __('shared:') }}</span>
    </div>
    @endif
    @if($ownership == 'user')
    <div class="flex justify-center space-x-1 text-teal-700">
        <span class="font-semibold text-sm">{{ __('Created:') }}</span>
        <span class="font-semibold text-sm">{{ $qrcode->created_at }}</span>
    </div>
    @endif
    <div class="flex justify-between items-center">
        <div class="p-2 flex justify-center">
            <img class="w-16" src="{{ asset('storage/' . $qrcode->image_path) }}">
        </div>
        <div class="p-2 flex justify-left text-teal-800 drop-shadow">
            <span class="font-semibold text-lg">{{ $qrcode->qr_code_name }}</span>
        </div>

        <div class="p-2">
            <x-forms.primary-button
                wire:click="$dispatch('openModal', {component: 'modals.code-details-modal', arguments: {qrcodeId: {{ $qrcode->id }}}})">Details</x-forms.primary-button>
        </div>
    </div>
    <div class="flex items-center justify-between border-t border-teal-900">
        <livewire:like-button :qrcode="$qrcode">
            <div class="m-2 p-2 flex space-x-1 text-teal-900 ">
                <span class="text-xs font-semibold">{{ __('Views:') }}</span>
                <span class="text-xs font-semibold">{{ $qrcode->qr_code_details->views }}</span>
            </div>
    </div>
</div>
