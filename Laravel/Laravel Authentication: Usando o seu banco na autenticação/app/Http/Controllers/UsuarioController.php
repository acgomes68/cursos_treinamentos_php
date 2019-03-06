<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{
    public function registrar()
    {
        return view('usuarios.registrar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();
        $dados['senha'] = bcrypt($dados['senha']);
        Usuario::create($dados);

        return redirect()->route('home');
    }
}
