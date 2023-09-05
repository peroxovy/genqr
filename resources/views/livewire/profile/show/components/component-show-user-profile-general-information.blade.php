<div class="p-2 md:flex flex-col bg-teal-300 border border-teal-400 rounded-md shadow-md">
    <div class="flex flex-col md:flex-row ">
        <div class="p-2 flex justify-center">
            <img src="https://i.pravatar.cc" class="rounded-md w-64 md:w-32 shadow-md">
        </div>
        <div class="p-2 flex flex-col items-center md:items-start">
            <div>
                <h2 class="font-semibold text-teal-800 text-lg md:text-2xl">{{ $user->username }}</h2>
            </div>
            <div>
                <span class="text-teal-950 md:text-lg">{{ $user->email }}</span>
            </div>
        </div>
    </div>
    <div class="p-2 mt-2 border-t border-teal-700 flex flex-col">
        <div class="p-2 flex items-center">
            <h2 class="font-semibold text-teal-800 text-xl">{{ __('General Information') }}</h2>
        </div>
        <div class="flex flex-col md:flex-row">
            <div class="w-full flex">
                <label class="font-semibold text-teal-700 p-2">{{__('Firstname:')}}</label>
                <span class="p-2 text-teal-800">{{$user->user_details->firstname != null ? $user->user_details->firstname : ''}}</span>
            </div>
            <div class="w-full flex">
                <label class="font-semibold text-teal-700 p-2">{{__('Lastname:')}}</label>
                <span class="p-2 text-teal-800">{{$user->user_details->lastname != null ? $user->user_details->lastname : ''}}</span>
            </div>
        </div>
        <div class="flex flex-col md:flex-row">
            <div class="w-full flex">
                <label class="font-semibold text-teal-700 p-2">{{__('City:')}}</label>
                <span class="p-2 text-teal-800">{{$user->user_details->city != null ? $user->user_details->city : ''}}</span>
            </div>
            <div class="w-full flex">
                <label class="font-semibold text-teal-700 p-2">{{__('Country:')}}</label>
                <span class="p-2 text-teal-800">{{$user->user_details->country != null ? $user->user_details->country : ''}}</span>
            </div>
        </div>
    </div>
    <div class="p-2 mt-2 border-t border-teal-700 flex flex-col">
        <div class="p-2 flex items-center">
            <h2 class="font-semibold text-teal-800 text-xl">{{ __('Bio') }}</h2>
        </div>
        <div class="flex flex-col md:flex-row">
            <div class="p-2 w-full flex">
                <span class="text-teal-800">{{$user->user_details->about != null ? $user->user_details->about : ''}}</span>
            </div>
        </div>
    </div>
    <div class="p-2 mt-2 border-t border-teal-700 flex flex-col">
        <div class="p-2 flex items-center">
            <h2 class="font-semibold text-teal-800 text-xl">{{ __('Socials') }}</h2>
        </div>

        <div class="flex flex-row flex-wrap justify-center">
            @if($user->user_details->url_facebook != null && $user->user_details->url_facebook != '')
                <a
                    href="{{$user->user_details->url_facebook}}"
                    target="_blank"
                    class="p-2 hover:-translate-y-2 duration-300 border-b-2 border-transparent hover:border-teal-400"
                    >
                    <x-images.socials.facebook/>
                </a>
            @endif

            @if($user->user_details->url_github != null && $user->user_details->url_github != '')
                <a
                    href="{{$user->user_details->url_github}}"
                    target="_blank"
                    class="p-2 hover:-translate-y-2 duration-300 border-b-2 border-transparent hover:border-teal-400">
                    <x-images.socials.github/>
                </a>
            @endif

            @if($user->user_details->url_instagram != null && $user->user_details->url_instagram != '')
                <a
                    href="{{$user->user_details->url_instagram}}"
                    target="_blank"
                    class="p-2 hover:-translate-y-2 duration-300 border-b-2 border-transparent hover:border-teal-400">
                    <x-images.socials.instagram/>
                </a>
            @endif

            @if($user->user_details->url_linkedin != null && $user->user_details->url_linkedin != '')
                <a
                    href="{{$user->user_details->url_linkedin}}"
                    target="_blank"
                    class="p-2 hover:-translate-y-2 duration-300 border-b-2 border-transparent hover:border-teal-400">
                    <x-images.socials.linkedin/>
                </a>
            @endif

            @if($user->user_details->url_youtube != null && $user->user_details->url_youtube != '')
                <a
                    href="{{$user->user_details->url_youtube}}"
                    target="_blank"
                    class="p-2 hover:-translate-y-2 duration-300 border-b-2 border-transparent hover:border-teal-400">
                    <x-images.socials.youtube/>
                </a>
            @endif

            @if($user->user_details->url_twitter != null && $user->user_details->url_twitter != '')
                <a
                    href="{{$user->user_details->url_twitter}}"
                    class="p-2 hover:-translate-y-2 duration-300 border-b-2 border-transparent hover:border-teal-400">
                    <x-images.socials.twitter/>
                </a>
            @endif
        </div>

    </div>
</div>
