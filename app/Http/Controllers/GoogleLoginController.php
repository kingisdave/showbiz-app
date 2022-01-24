<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
// use Socialite;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleLoginController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->stateless()->user();
        // $getInfo = Socialite::driver($provider)->user();

        $user = $this->createUser($getInfo,$provider);

        auth()->login($user);

        return redirect()->to('/index');

    }
    // protected function sendFailedResponse($msg = null)
    // {
    //     dd('mistake');
    //     return redirect()->route('login')
    //         ->withErrors(['msg' => $msg ?: 'Unable to login, try with another provider to login.']);
    // }

    function createUser($getInfo,$provider){

        $user = User::where('provider_id', $getInfo->id)->first();
         // if user already found
        if ($user) {
            // update the avatar and provider that might have changed
            $user->update([
                'provider' => $provider,
                'provider_id' => $getInfo->id,
                'access_token' => $getInfo->token
            ]);
        } else {
            $user = User::create([
                'full_name' => $getInfo->name,
                'user_name' => $getInfo->name,
                'email' => $getInfo->email,
                'password'=>md5(rand(1,10000)),
                'provider' => $provider,
                'provider_id' => $getInfo->id
            ]);
            $user->markEmailAsVerified();
        }
        return $user;
    }
}
