<div class="bg-teal-400 rounded-lg shadow border-2 border-teal-600">
    <div class="p-6">
        <div class="p-2 w-full">
            <div class="p-2 flex">
                <span class="text-teal-800 font-semibold">{{__('Are you sure, that you want to delete this QRCode?')}}</span>
            </div>
            <div class="mt-5 p-2 flex justify-center space-x-2">
                <div  class="flex">
                    <x-forms.danger-button wire:click="delete({{$qrcodeId}})">Yes, delete!</x-forms.danger-button>
                </div>
                <div class="flex">
                    <x-forms.warning-button wire:click="$dispatch('closeModal')">No, Cancel</x-forms.warning-button>
                </div>
            </div>
        </div>
    </div>
</div>
