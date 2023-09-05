<div class="p-4 flex flex-col bg-teal-300 border border-teal-400 rounded-md shadow-md">
    <div class="p-2">
        <h2 class="font-semibold text-teal-800 text-xl">{{ __('Statistics') }}</h2>
    </div>
    <div class="mt-12 md:mt-5 md:p-4 flex flex-col md:flex-row items-center justify-center space-y-12 md:space-y-0 space-x-0 md:space-x-6">
        <div class="p-4 w-full md:w-44 h-32 bg-teal-400 shadow-md rounded-md">
            <div class="relative flex items-start justify-center">
                <div class="absolute border border-teal-500 bg-teal-200 rounded-full -top-10 text-teal-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                </div>
            </div>
            <div class="p-2 flex flex-col items-center">
                <div class="mt-3">
                    <span class="text-teal-950 font-bold text-2xl">{{$user->user_details->profile_views}}</span>
                </div>
                <div class="mt-2">
                    <span class="text-teal-950 font-semibold">{{__('Profile Views')}}</span>
                </div>
            </div>
        </div>
        <div class="p-4 w-full md:w-44 h-32 bg-teal-400 shadow-md rounded-md">
            <div class="relative flex items-start justify-center">
                <div class="absolute border border-teal-500 bg-teal-200 rounded-full -top-10 text-teal-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="p-2 w-12 h-12">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75h.75v.75h-.75v-.75zM6.75 16.5h.75v.75h-.75v-.75zM16.5 6.75h.75v.75h-.75v-.75zM13.5 13.5h.75v.75h-.75v-.75zM13.5 19.5h.75v.75h-.75v-.75zM19.5 13.5h.75v.75h-.75v-.75zM19.5 19.5h.75v.75h-.75v-.75zM16.5 16.5h.75v.75h-.75v-.75z" />
                      </svg>
                </div>
            </div>
            <div class="p-2 flex flex-col items-center">
                <div class="mt-3">
                    <span class="text-teal-950 font-bold text-2xl">{{$user->user_details->generated_qr_codes}}</span>
                </div>
                <div class="mt-2">
                    <span class="text-teal-950 font-semibold">{{__('QR\'s Created')}}</span>
                </div>
            </div>
        </div>
        <div class="p-4 w-full md:w-44 h-32 bg-teal-400 shadow-md rounded-md">
            <div class="relative flex items-start justify-center">
                <div class="absolute border border-teal-500 bg-teal-200 rounded-full -top-10 text-teal-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="p-2 w-12 h-12">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                      </svg>
                </div>
            </div>
            <div class="p-2 flex flex-col items-center">
                <div class="mt-3">
                    <span class="text-teal-950 font-bold text-2xl">{{$user->likedQRCodes->count()}}</span>
                </div>
                <div class="mt-2">
                    <span class="text-teal-950 font-semibold">{{__('Liked QR\'s')}}</span>
                </div>
            </div>
        </div>
        <div class="p-4 w-full md:w-44 h-32 bg-teal-400 shadow-md rounded-md">
            <div class="relative flex items-start justify-center">
                <div class="absolute border border-teal-500 bg-teal-200 rounded-full -top-10 text-teal-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="p-2 w-12 h-12">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                </div>
            </div>
            <div class="p-2 flex flex-col items-center">
                <div class="mt-3">
                    <span class="text-teal-950 font-bold text-2xl">{{$user->user_details->time_spent}}</span>
                </div>
                <div class="mt-2">
                    <span class="text-teal-950 font-semibold">{{__('Time spent')}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
