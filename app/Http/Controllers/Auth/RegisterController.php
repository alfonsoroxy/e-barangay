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
            'first_name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-ZÑñ\s]+$/'],
            'last_name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-ZÑñ\s]+$/'],
            'mname' => ['nullable', 'max:255'],
            'suffix' => ['nullable', 'max:255'],

            'houseNumber' => ['required', 'numeric', 'regex:/^[-0-9\+]+$/'],
            'streetName' => ['required'],

            'birthday' => ['required', 'date'],
            'nationality' => ['required', 'regex:/^[a-zA-ZÑñ\s]+$/'],
            'gender' => ['required'],
            'maritalStatus' => ['required'],

            'contact' => ['nullable', 'string', 'regex:/^[-0-9\+]+$/', 'max:11'],
            'image' => ['image', 'mimes:jpg,jpeg,png|max:1024',],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'terms' => ['required'],
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
        if (request()->hasfile('image')) {
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->storeAs('verification', $imageName, 'documents');
        }
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'mname' => $data['mname'],
            'suffix' => $data['suffix'],

            'houseNumber' => $data['houseNumber'],
            'streetName' => $data['streetName'],

            'birthday' => $data['birthday'],
            'nationality' => $data['nationality'],
            'gender' => $data['gender'],
            'maritalStatus' => $data['maritalStatus'],

            'contact' => $data['contact'],
            'image' => $imageName ?? NULL,

            'email' => $data['email'],
            'password' => Hash::make($data['password']),

            'terms' => $data['terms'],
        ]);
    }
}
