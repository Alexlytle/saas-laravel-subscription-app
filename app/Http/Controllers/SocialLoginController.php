<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;

class SocialLoginController extends Controller
{
    public function facebookRedirect()
    {
      
       return Socialite::driver('facebook')->redirect();
    }

    public function googleRedirect()
    {
        // dd('hello');
       return Socialite::driver('google')->redirect();
    }


    public function loginWithFacebook()
    
    {
     
        $user = Socialite::driver('facebook')->user();
        $isUser = User::where('fb_id',$user->id)->first();
   
        if($isUser){
            Auth::login($isUser);
            return redirect('/dashboard');

        }else{

         
            // Validator::make($user,[
            //     $user->email => 'required|email|unique',
            // ]);
            // Validator::make(['email' => $user->email], ['email' => 'required|unique']);
       
            $createUser = User::create([
                'name'=>$user->name,
                'email'=>$user->email,
                'fb_id'=>$user->id,
                // 'avatar'=>$avatar,
                'password'=>encrypt('admin123')
            ]);
            Auth::login($createUser);
            return redirect('/dashboard');
        }
   
    }

    public function loginWithGoogle()
    {
        $user = Socialite::driver('google')->user();
        $isUser = User::where('gg_id',$user->id)->first();
   
        if($isUser){
            Auth::login($isUser);
            return redirect('/dashboard');

        }else{
            $createUser = User::create([
                'name'=>$user->name,
                'email'=>$user->email,
                'gg_id'=>$user->id,
                // 'avatar'=>$avatar,
                'password'=>encrypt('admin123')
            ]);
            Auth::login($createUser);
            return redirect('/dashboard');
        }
    }
  
}
