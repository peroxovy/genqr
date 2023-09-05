<div class="p-4 flex flex-col bg-teal-300 border border-teal-400 rounded-md shadow-md">
    <div class="p-2 flex items-center bg-teal-400 rounded-md shadow-sm">
        <h2 class="font-semibold mr-2 text-teal-800 text-xl">{{ __('Shared QR codes: ') }}</h2>
    </div>
    <div>
        <div class="md:p-2 mt-2 flex flex-col md:flex-row bg-teal-400 rounded-md shadow-sm">
            <div class="p-2 md:p-0 w-full md:mr-2">
                <div class="flex justify-center flex-wrap">
                    @foreach ($qrcodes as $qrcode)
                        <div
                            class="flex flex-col md:w-64 p-4 m-2 bg-teal-300 hover:bg-teal-200 border-2 border-teal-200 hover:border-teal-100 rounded shadow-md">

                            <div class="p-2 flex justify-center">
                                <img class="w-48" src="{{ asset('storage/' . $qrcode->image_path) }}">
                            </div>
                            <div class="flex items-center justify-between border-b border-teal-400">
                                <livewire:like-button wire:key="profile-{{$qrcode->id}}" :qrcode="$qrcode">
                                    <div class="m-2 p-2 flex space-x-1 text-teal-900 ">
                                        <span class="text-xs font-semibold">{{ __('Views:') }}</span>
                                        <span
                                            class="text-xs font-semibold">{{ $qrcode->qr_code_details->views }}</span>
                                    </div>
                            </div>
                            <div class="p-2 flex justify-left">
                                <div>
                                    <div class="">
                                        <span class="font-semibold text-lg">{{ $qrcode->qr_code_name }}</span>
                                    </div>
                                    <div class="mobile:hidden md:block">
                                        <span
                                            class="text-sm text-gray-600  break-all">{{ strlen($qrcode->qr_code_description) > 20 ? substr($qrcode->qr_code_description, 0, 20) . '...' : $qrcode->qr_code_description }}</span>
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
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="w-full p-2 ">
            {{ $qrcodes->links() }}
        </div>
    </div>
</div>
