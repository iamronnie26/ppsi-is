<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;

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


    public function redirectTo(){

            if(Auth::user()->role === 'poc'){
                return "/poc/dashboard";
            }elseif(Auth::user()->role === 'admin'){
                return "/admin/dashboard";
            }elseif(Auth::user()->role === 'recept'){
                return "/recept/dashboard";
            }elseif(Auth::user()->role === 'supervisor'){
            return "/supervisor/dashboard";
            }elseif(Auth::user()->role === 'logistic'){
                return "/logistic/dashboard";
            }elseif(Auth::user()->role === 'encoder'){
                return "/encoder/dashboard";
            }
        
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function username(){
        return 'username';
    }

    protected function validatesLogin(Request $request){
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

}
