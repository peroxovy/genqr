<div class="p-6 w-full md:w-3/4">
    <div>
        <x-session.session-status/>
    </div>
    <div class="py-2 md:py-4 mt-5">
        <div class="md:flex md:space-x-4 space-y-4 md:space-y-0">
            <div class="md:flex md:flex-col w-full md:w-1/3 space-y-4">
                <livewire:profile.show.components.component-show-user-profile-general-information :user="$user">
            </div>
            <div class="md:flex md:flex-col w-full md:w-2/3 space-y-4">
                <livewire:profile.show.components.component-show-user-profile-codes :userId="$user->id">
            </div>
        </div>
    </div>
</div>
