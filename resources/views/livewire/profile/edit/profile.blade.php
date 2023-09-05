<div class="p-6 w-full md:w-3/4">
    <div>
        <x-session.session-status/>
    </div>
    <div class="py-2 md:py-4 mt-5">
        <div class="md:flex md:space-x-4 space-y-4 md:space-y-0">
            <div class="md:flex md:flex-col w-full md:w-1/3 space-y-4">
                <div>
                    <livewire:profile.edit.forms.form-profile-avatar :user="$user">
                </div>
                <div>
                    <livewire:profile.edit.forms.form-profile-account-data :user="$user">
                </div>
                <div>
                    <livewire:profile.edit.forms.form-profile-password :user="$user">
                </div>
            </div>
            <div class="md:flex md:flex-col w-full md:w-2/3 space-y-4">
                <div>
                    <livewire:profile.edit.components.profile-stats :user="$user">
                </div>
                <div>
                    <livewire:profile.edit.forms.form-profile-about :user="$user">
                </div>
                <div>
                    <livewire:profile.edit.forms.form-profile-user-details :user="$user">
                </div>
                <div>
                    <livewire:profile.edit.forms.form-profile-socials :user="$user">
                </div>
            </div>
        </div>
    </div>
</div>
