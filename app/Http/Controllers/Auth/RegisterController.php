<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:t_user'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
        ],
        [
            'name.required' => 'Họ và tên không được bỏ trống!',
            'name.max:55' => 'Họ và tên quá dài!',
            'email.email' => 'Email không đúng định dạng! Vui lòng kiểm tra lại',
            'email.unique'=> 'Email đã được đăng ký!',
            'email.required'=> 'Email không được bỏ trống!', 
            'password.required' => 'Mật khẩu không được bỏ trống!',
            'password.min' => 'Mật khẩu quá ngắn!',
            'password.max' => 'Mật khẩu quá dài!',
            'passsword.confirmed' => 'Vui lòng xác nhận lại mật khẩu!',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'm_address'=>$data['m_address'],
            
        ]);
    }
    
}