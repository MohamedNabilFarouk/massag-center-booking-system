<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        //dd("Current Url : " . url()->full());
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        $value = request()->input('identify');
        // $field = filter_var($value, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        $field = 'phone';
        request()->merge([$field =>$value ]);
        return  $field;
    }


    // socialite

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }



    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();

        $provider_user= Provider::where('provider_id', $user->getId())->first();

        if(!$provider_user){
            // register
                // check if this email exsist
                $userGetReal = User::where('email', $user->getEmail())->first();
                if(!$userGetReal){
                    $userGetReal = new User;
                    $userGetReal->name=$user->getName();
                    $userGetReal->email=$user->getEmail();
                    // $userGetReal->image=$user->getAvatar();
                    $userGetReal->save(); //save in users table
                }
             $provider_user = new Provider ;
            $provider_user->provider_id= $user->getId();
            $provider_user->provider= $provider;
            $provider_user->user_id= $userGetReal->id;
            $provider_user->save(); //save in providers table


        }else{
            // login
            $userGetReal = User::find($provider_user->user_id);

        }

        auth()->login($userGetReal);
        return redirect('/account');



        //dd($user);
        // $user->token;
    }


}
