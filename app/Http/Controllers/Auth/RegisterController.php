<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'employee_id'=>'required|integer',
            'contact_id'=>'required|integer',
            'username' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
            'company_id'=>'required|integer',
            'pic_url'=>'string',
            'role_id'=>'required|integer'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'employee_id' => $data['employee_id'],
            'contact_id' => $data['contact_id'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'company_id'=>$data['company_id'],
            'pic_url'=>$data['pic_url'],
            'role_id'=>$data['role_id']
        ]);
        return $user;
    }
}