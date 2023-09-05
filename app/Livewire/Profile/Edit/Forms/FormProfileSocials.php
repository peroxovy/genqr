<?php

namespace App\Livewire\Profile\Edit\Forms;

use App\Livewire\Profile\Edit\Profile;
use App\Models\User;
use Livewire\Component;

class FormProfileSocials extends Component
{
    public User $user;

    public ?string $url_github = '';
    public ?string $url_linkedin = '';
    public ?string $url_youtube = '';
    public ?string $url_facebook = '';
    public ?string $url_instagram = '';
    public ?string $url_twitter = '';

    public function mount(User $user)
    {
        $this->url_github = $user->user_details->url_github;
        $this->url_linkedin = $user->user_details->url_linkedin;
        $this->url_youtube = $user->user_details->url_youtube;
        $this->url_facebook = $user->user_details->url_facebook;
        $this->url_instagram = $user->user_details->url_instagram;
        $this->url_twitter = $user->user_details->url_twitter;
    }

    public function render()
    {
        return view('livewire.profile.edit.forms.form-profile-socials');
    }

    public function rules()
    {
        return [
            'url_github' => ['nullable', 'string', 'regex:/^https:\/\/github\.com\/.*/i'],
            'url_linkedin' => ['nullable', 'string', 'regex:/^https:\/\/www\.linkedin\.com\/.*/i'],
            'url_youtube' => ['nullable', 'string', 'regex:/^https:\/\/www\.youtube\.com\/.*/i'],
            'url_facebook' => ['nullable', 'string', 'regex:/^https:\/\/www\.facebook\.com\/.*/i'],
            'url_instagram' => ['nullable', 'string', 'regex:/^https:\/\/www\.instagram\.com\/.*/i'],
            'url_twitter' => ['nullable', 'string', 'regex:/^https:\/\/www\.twitter\.com\/.*/i'],
        ];
    }

    public function updateSocials()
    {
        $this->validate();

        $this->user->user_details->update([
            'url_github' => $this->url_github,
            'url_linkedin' => $this->url_linkedin,
            'url_youtube' => $this->url_youtube,
            'url_facebook' => $this->url_facebook,
            'url_instagram' => $this->url_instagram,
            'url_twitter' => $this->url_twitter,
        ]);

        session()->flash('success', 'Socials has been updated!');

        $this->redirect(Profile::class);
    }
}
