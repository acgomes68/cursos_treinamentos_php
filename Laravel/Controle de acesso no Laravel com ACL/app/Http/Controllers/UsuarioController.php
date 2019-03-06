<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function listar()
    {
        $usuarios = Usuario::all();
        return view('usuarios.listar', compact('usuarios'));
    }

    public function editar($id)
    {
        $this->authorize('update', Usuario::class);

        $usuario = Usuario::find($id);
        return view('usuarios.editar', compact('usuario'));
    }

    public function atualizar(Request $request, $id)
    {
        $this->authorize('update', Usuario::class);
        
        $dados = $request->all();
        $usuario = Usuario::find($id);

        if(!$dados['senha']){
            $senha_antiga = $usuario->senha;
            $dados['senha'] = $senha_antiga;
            $usuario->update($dados);
        }else{
            $senha_nova = Hash::make($dados['senha']);
            $dados['senha'] = $senha_nova;
            $usuario->update($dados);
        }

        return redirect()->route('listar');
    }

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
