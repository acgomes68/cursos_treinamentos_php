<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
	protected $fillable = ['titulo','numero'];
		
    public function cliente() {
    	return $this->belongsTo('App\Cliente');
    }
}
