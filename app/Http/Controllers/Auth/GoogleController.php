<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\User\Details\InitUserDetailsService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->intended('dashboard');

            }else{

                $adjustedUsername = strtolower(preg_replace('/\s+/', '', $user->name)) . uniqid();

                $newUser = User::create([
                    'username' => $adjustedUsername,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => bcrypt(uniqid($user->email.$user->name))
                ]);

                $newUserDetails = app(InitUserDetailsService::class)->initDetails($newUser);

                Auth::login($newUser);

                return redirect()->intended('dashboard');
            }

        } catch (Exception $e) {

            return redirect()->route('login')->with('error', $e->getMessage());
        }
    }
}
