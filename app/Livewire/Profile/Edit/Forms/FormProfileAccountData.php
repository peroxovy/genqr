<?php

namespace App\Livewire\Profile\Edit\Forms;


use App\Livewire\Profile\Edit\Profile;
use App\Models\User;
use App\Services\QrCode\QrCodeService;
use App\Services\User\Details\ChangeUserAvatarUrlService;
use Illuminate\Validation\Rule;
use Livewire\Component;

class FormProfileAccountData extends Component
{
    public User $user;
    public string $username = '';
    public string $email = '';

    public function mount(User $user)
    {
        $this->fill($user);
    }

    public function render()
    {
        return view('livewire.profile.edit.forms.form-profile-account-data');
    }

    public function rules()
    {
        return [
            'username' => ['required', 'min:3', 'max:30', Rule::unique('users', 'username')->ignore($this->user->id)],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user->id)],
        ];
    }

    public function updateAccountData()
    {
        $this->validate();

        $userOldUsername = $this->user->username;
        $userNewUsername = $this->username;

        $this->user->update(
            $this->all()
        );

        app(QrCodeService::class)->renameUserDirecory(auth()->user(), $userOldUsername, $userNewUsername);
        app(ChangeUserAvatarUrlService::class)->execute(auth()->user(), $userNewUsername);

        session()->flash('success', 'Account data has been updated!');

        $this->redirect(Profile::class);
    }
}
