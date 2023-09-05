<div class="bg-teal-400 rounded-lg shadow border-2 border-teal-600">
    <div class="p-6">
        <form wire:submit="store">
        <div class="p-2 flex w-full justify-center">
            <span class="text-lg font-semibold text-teal-100 drop-shadow">{{__('Create QR Code')}}</span>
        </div>
        <div class="p-2 mt-2 border border-teal-600 rounded">
            <div class="p-2">
                <x-forms.label-text for="form.name">QR Code Name</x-forms.label-text>
                <x-forms.input-text wire:model.lazy="form.name" required/>
                <div class="p-2 font-semibold text-red-600">@error('form.name') {{ $message }} @enderror</div>
            </div>
            <div class="p-2">
                <x-forms.label-text for="form.description">QR Code Description</x-forms.label-text>
                <x-forms.input-text wire:model.lazy="form.description" required/>
                <div class="p-2 font-semibold text-red-600">@error('form.description') {{ $message }} @enderror</div>
            </div>
            <div class="p-2">
                <x-forms.checkbox model="form.is_public" label="Make QR Code Public?"/>
                <div class="p-2 font-semibold text-red-600">@error('form.is_public') {{ $message }} @enderror</div>
            </div>
        </div>
        <div class="p-2 mt-2 border border-teal-600 rounded">
            <div class="p-2 flex">
                <div class="pr-2 w-1/2">
                    <x-forms.label-text for="form.error_correction">Error Correction</x-forms.label-text>
                    <x-forms.select-option :options="$error_corrections" wire:model.lazy="form.error_correction"/>
                    <div class="p-2 font-semibold text-red-600">@error('form.error_correction') {{ $message }} @enderror</div>
                </div>
                <div class="pl-2 w-1/2">
                    <x-forms.label-text for="form.image_size">Image Size [px]</x-forms.label-text>
                    <x-forms.input-number wire:model.lazy="form.image_size" min="100" max="300"/>
                    <div class="p-2 font-semibold text-red-600">@error('form.image_size') {{ $message }} @enderror</div>
                </div>
            </div>
            <div class="p-2">
                <x-forms.label-text for="form.code_type">QR Code Type</x-forms.label-text>
                <x-forms.select-option :options="$qr_code_types" wire:model.lazy="form.code_type" required/>
                <div class="p-2 font-semibold text-red-600">@error('form.code_type') {{ $message }} @enderror</div>
            </div>
        </div>
        <div class="p-2 mt-2 border border-teal-600 rounded">
            @if($form['code_type'] == 'text')
            <div class="p-2 block">
                <x-forms.label-text for="form.text">Text To Generate</x-forms.label-text>
                <x-forms.input-text wire:model.lazy="form.text"/>
                <div class="p-2 font-semibold text-red-600">@error('form.text') {{ $message }} @enderror</div>
            </div>
            @endif
            @if($form['code_type'] == 'url')
            <div class="p-2 block">
                <x-forms.label-text for="form.url">URL</x-forms.label-text>
                <x-forms.input-text wire:model.lazy="form.url"/>
                <div class="p-2 font-semibold text-red-600">@error('form.url') {{ $message }} @enderror</div>
            </div>
            @endif
            @if($form['code_type'] === 'email')
            <div class="p-2 block">
                <x-forms.label-text for="form.email">E-mail Address</x-forms.label-text>
                <x-forms.input-text wire:model.lazy="form.email"/>
                <div class="p-2 font-semibold text-red-600">@error('form.email') {{ $message }} @enderror</div>
            </div>
            @endif
            @if($form['code_type'] === 'phone')
            <div class="p-2 block">
                <x-forms.label-text for="form.phone">Phone Number</x-forms.label-text>
                <x-forms.input-text wire:model.lazy="form.phone"/>
                <div class="p-2 font-semibold text-red-600">@error('form.phone') {{ $message }} @enderror</div>
            </div>
            @endif
            @if($form['code_type'] === 'gps')
            <div class="p-2 flex">
                <div class="pr-2 w-1/2">
                    <x-forms.label-text for="form.latitude">Latitude</x-forms.label-text>
                    <x-forms.input-text wire:model.lazy="form.latitude"/>
                    <div class="p-2 font-semibold text-red-600">@error('form.latitude') {{ $message }} @enderror</div>
                </div>
                <div class="pl-2 w-1/2">
                    <x-forms.label-text for="form.longitude">Longitude</x-forms.label-text>
                    <x-forms.input-text wire:model.lazy="form.longitude"/>
                    <div class="p-2 font-semibold text-red-600">@error('form.longitude') {{ $message }} @enderror</div>
                </div>
            </div>
            @endif
            @if($form['code_type'] === 'wifi')
            <div class="p-2 block">
                <x-forms.label-text for="form.ssid">WiFi SSID</x-forms.label-text>
                <x-forms.input-text wire:model.lazy="form.wifi_ssid"/>
                <div class="p-2 font-semibold text-red-600">@error('form.wifi_ssid') {{ $message }} @enderror</div>
            </div>
            <div class="p-2 block">
                <x-forms.label-text for="form.ssid">WiFi Password</x-forms.label-text>
                <x-forms.input-text wire:model.lazy="form.wifi_password"/>
                <div class="p-2 font-semibold text-red-600">@error('form.wifi_password') {{ $message }} @enderror</div>
            </div>
            <div class="p-2 block">
                <x-forms.label-text for="form.ssid">Network Encryption</x-forms.label-text>
                <x-forms.input-text wire:model.lazy="form.wifi_encryption"/>
                <div class="p-2 font-semibold text-red-600">@error('form.wifi_encryption') {{ $message }} @enderror</div>
            </div>
            <div class="p-2">
                <x-forms.checkbox model="form.wifi_is_hidden" label="Is Network Hidden?"/>
                <div class="p-2 font-semibold text-red-600">@error('form.wifi_is_hidden') {{ $message }} @enderror</div>
            </div>
            @endif
        </div>


        <div class="p-2">
            <x-forms.primary-button>Generate</x-forms.primary-button>
        </div>
        </form>
        <div class="p-2">
            <x-forms.warning-button wire:click="$dispatch('closeModal')">Cancel</x-forms.warning-button>
        </div>
    </div>
</div>
