<div class="p-2 flex flex-col md:flex-row items-center bg-teal-300 border border-teal-400 rounded-md shadow-md">
    <div class="p-2 flex drop-shadow">
        @if(auth()->user()->user_details->avatar_path != null)
            <img src="{{ asset('storage/' . $user->user_details->avatar_path) }}" alt="avatar" class="rounded-md w-64 md:w-32 shadow-md">
        @else
            <img src="http://www.gravatar.com/avatar?d=mm" alt="avatar" class="rounded-md w-64 md:w-32 shadow-md">
        @endif
    </div>
    <div class="p-2 flex flex-col">
        <div>
            <h2 class="font-semibold text-teal-800 text-lg md:text-2xl">{{ $user->username }}</h2>
        </div>
        <div>
            <span class="text-teal-800 md:text-lg">{{ $user->email }}</span>
        </div>
        <div class="p-2">
            <x-forms.input-file>{{__('Change Avatar')}}</x-forms.input-file>
        </div>
    </div>
</div>
