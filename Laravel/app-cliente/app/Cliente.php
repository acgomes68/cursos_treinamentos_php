<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	protected $fillable = ['nome','email','endereco'];
	
    public function telefones() {
    	return $this->hasMany('App\Telefone');
    }
    
    public function addTelefone(Telefone $tel) {
    	return $this->telefones()->save($tel);
    }
    
    public function excluirTelefones() {
    	foreach($this->telefones as $tel) {
    		$tel->delete();
    	}
    	
    	return true;
    }
}
