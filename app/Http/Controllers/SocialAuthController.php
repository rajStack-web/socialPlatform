<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->id)->first();

            if ($user) {
                Auth::login($user);
                return redirect()->intended('dashboard');
            } else {
                // Check if user with same email exists
                $userByEmail = User::where('email', $googleUser->email)->first();

                if ($userByEmail) {
                    // Update existing user with google_id
                    $userByEmail->update([
                        'google_id' => $googleUser->id,
                    ]);
                    Auth::login($userByEmail);
                } else {
                    // Create new user
                    $newUser = User::create([
                        'name' => $googleUser->name,
                        'email' => $googleUser->email,
                        'google_id' => $googleUser->id,
                        'password' => encrypt('dummy_password') // Secure practice would be different, but this is a common starting point
                    ]);
                    Auth::login($newUser);
                }

                return redirect()->intended('dashboard');
            }
        } catch (Exception $e) {
            return redirect('login')->with('error', 'Something went wrong while logging in with Google.');
        }
    }
}
