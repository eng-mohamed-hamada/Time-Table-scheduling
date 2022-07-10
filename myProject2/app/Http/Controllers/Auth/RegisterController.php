<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;

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
    protected $redirectTo = '/student/subjects';

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
            'email' => 'required|string|email|max:255|unique:users|unique:users,email',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'photo' => 'required',
            'user_id' => 'required|unique:users,user_id',
            'permission' => 'required|string',
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
        $file = request()->file('photo');
        $name = $file->getClientOriginalName();
        $extention = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $mime = $file->getMimeType();
        $realPath =$file->getRealPath();
        $file->move(public_path('images'), $name/*$this->counter.'.'.$extention*/);
        return User::create([
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'photo' => $name,
            'user_id' => $data['user_id'],
            'permission' => $data['permission'],
        ]);
    }
}
