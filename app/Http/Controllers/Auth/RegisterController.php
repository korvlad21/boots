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
			'surname' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
			'otchestvo' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
		[
			'surname.required' => 'Фамилия должна быть заполнена.',
			'name.required' => 'Имя должно быть заполнено.',
			'otchestvo.required' => 'Отчество должно быть заполнено.',
			'surname.max' => 'Фамилия не может быть такой длинной.',
			'name.max' => 'Имя не может быть такой длинной.',
			'otchestvo.max' => 'Отчество не может быть такой длинной.',
			'email.required' => 'Email должен быть заполнен.',
			'email.unique' => 'Данный E-mail уже существует.',
			'email.email' => 'Неверно указан E-mail',
			'password.required' => 'Пароль должен быть заполнен.',
			'password.confirmed' => 'Пароли не совпадают.',
			'password.min' => 'Пароль должен быть больше 8 символов.',
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
            'surname' => $data['surname'],
			'name' => $data['name'],
			'otchestvo' => $data['otchestvo'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
