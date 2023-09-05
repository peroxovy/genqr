<div>
    <div class="hidden md:block w-full">
        <div class="flex p-2 bg-teal-600 justify-between items-center shadow-lg">
            <div class="pl-4 flex items-center">
                <div class="px-4">
                    <a href="{{route('dashboard')}}" wire:navigate>
                        <x-app.application-logo/>
                    </a>
                </div>
                <div class="px-4">
                    <x-navigation.nav-link :href="route('dashboard')" wire:navigate.hover>{{__('Dashboard')}}</x-navigation.nav-link>
                </div>
                <div class="px-4">
                    <x-navigation.nav-link :href="route('qrcodes')" wire:navigate.hover>{{__('Your QR\'s')}}</x-navigation.nav-link>
                </div>
                <div class="px-4">
                    <x-navigation.nav-link :href="route('community')" wire:navigate.hover>{{__('Community')}}</x-navigation.nav-link>
                </div>
            </div>
            <div class="relative pr-6" x-data="{ isOpen: false}">
                <button
                        @click="isOpen = !isOpen"
                        @keydown.escape="isOpen = false"
                        class="flex items-center"
                >
                    <span class="font-semibold text-lime-400 hover:text-lime-300 pr-2">{{auth()->user()->username}}</span>
                    @if(auth()->user()->user_details->avatar_path != null)
                    <img src="{{ asset('storage/' . auth()->user()->user_details->avatar_path) }}" alt="avatar" class="w-8 h-8 rounded-full">
                    @else
                    <img src="http://www.gravatar.com/avatar?d=mm" alt="avatar" class="w-8 h-8 rounded-full">
                    @endif
                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="stroke-teal-900"><path d="M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z" class="heroicon-ui"></path></svg>
                </button>
                <div x-show="isOpen"
                    @click.away="isOpen = false"
                    class="p-2 absolute font-normal bg-teal-600 drop-shadow overflow-hidden rounded w-48 border border-teal-800 mt-2 py-1 right-0 z-20"
                >
                    <div class="px-4">
                        <x-navigation.nav-link :href="route('profile')" wire:navigate.hover>{{__('Profile')}}</x-navigation.nav-link>
                    </div>
                    <div class="px-4">
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button class="py-2 text-md font-semibold text-teal-950 hover:text-teal-400 border-b-2 border-transparent hover:border-teal-400" type='submit'>
                                {{ __('Logout') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="block md:hidden w-full" x-data="{ isOpen: false}">
        <div class="bg-teal-600 justify-between items-center">
            <div class="p-2 flex justify-between items-center border-b-2 border-teal-700">
                <a href="{{route('dashboard')}}" wire:navigate>
                    <x-app.application-logo/>
                </a>
                <button
                    @click="isOpen = !isOpen"
                    @keydown.escape="isOpen = false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 stroke-teal-400 drop-shadow" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <div x-show="isOpen"
            @click.away="isOpen = false">
                <div class="p-2 flex justify-center bg-teal-600 w-full border-b-2 border-teal-700">
                    <div>
                        <div class="p-2">
                            <x-navigation.responsive-nav-link :href="route('dashboard')" wire:navigate.hover>{{__('Dashboard')}}</x-navigation.responsive-nav-link>
                        </div>
                        <div class="p-2">
                            <x-navigation.responsive-nav-link :href="route('qrcodes')" wire:navigate.hover>{{__('QR Codes')}}</x-navigation.responsive-nav-link>
                        </div>
                        <div class="p-2">
                            <x-navigation.responsive-nav-link :href="route('community')" wire:navigate.hover>{{__('Community')}}</x-navigation.responsive-nav-link>
                        </div>
                    </div>
                </div>
                <div class="p-2 flex justify-center bg-teal-600 w-full ">
                    <div>
                        <div class="p-2">
                            <x-navigation.responsive-nav-link :href="route('profile')" wire:navigate.hover>{{__('Profile')}}</x-navigation.responsive-nav-link>
                        </div>
                        <div class="p-2">
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button class="py-2 text-md font-semibold drop-shadow text-teal-900 hover:text-teal-400 border-b-2 border-transparent hover:border-teal-400" type='submit'>{{ __('Logout') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
