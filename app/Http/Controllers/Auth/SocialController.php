<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    //
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try{
            $user = Socialite::driver($provider)->user();
        } catch(\Exception $e){
            return redirect('/login')->with('An Error Occurred');
        }

        $findUser = User::where('email', $user->email)->first();

        if($findUser){
            Auth::login($findUser);
            return redirect('/');
        } else{

            $social_user = User::updateOrCreate([
                'provider_id' => $user->id,
                'provider' => $provider
            ], [
                'name' => $user->name,
                'email' => $user->email,
                'provider_token' => $user->token
            ]);

            Auth::login($social_user);

            return redirect('/');
        }
    }
}
