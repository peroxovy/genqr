<div class="p-6 md:w-1/2">
    <div>
        <x-session.session-status />
    </div>
    <div class="mobile:w-full mobile:py-2 laptop:py-4 mt-5">
        <div>
            <x-cards.header-card :message="'Now you can generate your own QR Code!'" :buttonText="'Generate QR Code'" :routeName="$routeName"></x-cards.header-card>
        </div>
        <div class="w-full md:flex items-start">
            <div class="w-full p-6 mt-5 md:mr-2 bg-teal-300 border border-teal-400 rounded-lg shadow-md">
                @if (!count($userQrCodes))
                    <div>
                        <x-cards.oops-card :message="'Unfortunately you don\'t have any QR Codes...'"></x-cards.oops-card>
                    </div>
                @else
                    <div class="md:flex justify-center items-center p-4">
                        <div>
                            <h2 class="font-semibold text-teal-900 drop-shadow">
                                {{ __('There are your latest QR Codes') }}</h2>

                        </div>
                    </div>
                    @foreach ($userQrCodes as $qrcode)
                        <livewire:codes.dashboard.code-card :qrcode="$qrcode" :ownership="'user'"
                            wire:key="dashboard-user-code-{{ $qrcode->id }}">
                    @endforeach
                    <div class="w-full p-2 m-2 flex justify-center items-center">
                        <x-navigation.primary-nav-link :href="route('qrcodes')"
                            wire:navigate>{{ __('See all your QR Codes') }}</x-navigation.primary-nav-link>
                    </div>
                @endif
            </div>
            <div class="w-full p-6 mt-5 md:ml-2 bg-teal-300 border border-teal-400 rounded-lg shadow-md">
                @if (!count($communityQrCodes))
                    <div>
                        <x-cards.oops-card :message="'No Community QR Codes found...'"></x-cards.oops-card>
                    </div>
                @else
                    <div class="md:flex justify-center items-center p-4">
                        <div>
                            <h2 class="font-semibold text-teal-900 drop-shadow">
                                {{ __('There are latest community QR Codes') }}</h2>

                        </div>
                    </div>
                    @foreach ($communityQrCodes as $qrcode)
                        <livewire:codes.dashboard.code-card :qrcode="$qrcode" :ownership="'community'"
                            wire:key="dashboard-community-code-{{ $qrcode->id }}">
                    @endforeach
                    <div class="w-full p-2 m-2 flex justify-center items-center">
                        <x-navigation.primary-nav-link :href="route('community')"
                            wire:navigate>{{ __('Check community QR Codes') }}</x-navigation.primary-nav-link>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
