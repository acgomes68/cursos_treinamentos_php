<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ],[
    			'name.required' => 'Preencha um nome',
    			'name.string' => 'Preencha um nome válido',
    			'nome.max' => 'Nome deve ter até 255 caracteres',
    			'email.required' => 'Preencha um e-mail',
    			'email.string' => 'Preencha um e-mail válido',
    			'email.email' => 'Preencha um e-mail válido',
    			'email.max' => 'E-mail deve ter até 255 caracteres',
    			'email.unique:users' => 'E-mail já cadastrado',
    			'password.required' => 'Preencha uma senha',
    			'password.string' => 'Preencha uma senha válida',
    			'password.min' => 'Senha deve ter ao menos 6 caracteres',
    			'password.confirmed' => 'Senha não foi devidamente confirmada'
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
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
