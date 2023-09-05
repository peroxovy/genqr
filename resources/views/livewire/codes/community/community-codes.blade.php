<div class="p-6 md:w-1/2">
    <div>
        <x-session.session-status />
    </div>
    <div class="mobile:w-full mobile:py-2 laptop:py-4 mt-5">
        @if (!$communityHasCodes)
            <div>
                <x-cards.no-codes-header-card :title="'Unluckily, there are no published QR Codes by Community...'" :message="'But you can be the first one, just :'" :buttonText="'Generate and share QR Code!'" :routeName="$routeName"></x-cards.header-card>
            </div>
        @else
            <div>
                <x-cards.header-card :message="'You can share Code also:'" :buttonText="'See your codes'" :routeName="$routeName"></x-cards.header-card>
            </div>
            <div
                class="p-6 mt-5 bg-teal-300 border border-teal-400 rounded-lg flex justify-center items-center shadow-md">
                <div class="w-full">
                    <div class="md:flex justify-between items-center space-x-2 p-4 bg-teal-400 shadow-md rounded-md">
                        <div>
                            <h2 class="md:text-xl font-semibold text-teal-900 drop-shadow">
                                {{ __('This is the list all public QR Codes') }}</h2>
                        </div>
                        <div class="flex">
                            <x-forms.input-text wire:model.lazy="search" placeholder="Search..."></x-forms.input-text>
                        </div>
                    </div>
                    <div class="mt-2 flex justify-center flex-wrap">
                        @foreach ($qrcodes as $qrcode)
                            <livewire:codes.cards.code-card :qrcode='$qrcode' :routeName='$routeName'
                                wire:key="community-card-{{ $qrcode->id }}">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="w-full p-2">
                {{ $qrcodes->links() }}
            </div>
        @endif
    </div>
</div>
