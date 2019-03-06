<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    public function __construct()
    {
        	$this->middleware('auth');
    }
    
    public function adicionar($cliente_id) {
    		$cliente = \App\Cliente::find($cliente_id);
    		return view('telefone.adicionar', compact('cliente'));
    }

    public function salvar(\App\Http\Requests\TelefoneRequest $request, $cliente_id) {
    	
    	$telefone = new \App\Telefone;
    	$telefone->titulo = $request->input('titulo');
    	$telefone->numero = $request->input('numero');
    	
    	\App\Cliente::find($cliente_id)->addTelefone($telefone);
    	
    	\Session::flash('flash_message', [
    		'msg' => 'Telefone adicionado com sucesso!',
    		'class' => 'alert-success'
  		]);
    		
    	return redirect()->route('cliente.detalhe', $cliente_id);
    }
    
    public function editar($id) {
    		$telefone = \App\Telefone::find($id);
    		
    		if(!$telefone) {
		    	\Session::flash('flash_message', [
		    		'msg' => 'Telefone não cadastrado!',
		    		'class' => 'alert-danger'
		  		]);
		  		return redirect()->route('cliente.detalhe', $telefone->cliente->id);
    		}
    		
    		return view('telefone.editar', compact('telefone'));
    }
    
    public function atualizar(\App\Http\Requests\TelefoneRequest $request, $id) {
    	
    		$telefone = \App\Telefone::find($id);
    		\App\Telefone::find($id)->update($request->all());
    		
	    	\Session::flash('flash_message', [
	    		'msg' => 'Telefone atualizado com sucesso!',
	    		'class' => 'alert-success'
	  		]);
	  		
		  	return redirect()->route('cliente.detalhe', $telefone->cliente->id);
    }

    public function excluir($id) {
    		$telefone = \App\Telefone::find($id);
    		$telefone->delete();

	    	\Session::flash('flash_message', [
	    		'msg' => 'Telefone excluído com sucesso!',
	    		'class' => 'alert-success'
	  		]);
    		
    		return redirect()->route('cliente.detalhe', $telefone->cliente->id);
    }
    
}
