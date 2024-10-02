<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect($provider){

        return Socialite::driver($provider)->redirect(); 

    }

    public function callback($provider) {
        
            $getInfo = Socialite::driver($provider)->user();

            $user = $this->createUser($getInfo, $provider);
            auth()->login($user);
            return redirect('http://127.0.0.1:3000/login/' . $provider . '/' . $user->api_token . '/' . $user->id);
            
    }

    public function createUser($getInfo, $provider){
        $user = User::where('provider_id', $getInfo->id)->first();
        if(!$user) {
            $user = User::create([
                'name' => $getInfo->name,
                'email' => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id,
                'api_token' => Str::random(60)
            ]);
        }
        return $user;
    }
}
