<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Usuario;

class AutenticacaoController extends Controller
{
    public function home()
    {
        return view('publica');
    }

    public function privada()
    {
        return view('privada');
    }

    public function login()
    {
        return view('autenticacao.login');
    }

    public function logar(Request $request)
    {
        $dados = $request->all();

        $login = $dados['login'];
        $senha = $dados['senha'];

        $usuario = Usuario::where('login', $login)->first();

        if(Auth::check() || ($usuario && Hash::check($senha, $usuario->senha))){
            Auth::login($usuario);
            return redirect(route('dashboard'));
        } else {
            return redirect(route('login'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }

    
}
