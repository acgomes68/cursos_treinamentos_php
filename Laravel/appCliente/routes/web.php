<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

	// array_add()
	$array = ['nome' => 'Camila', 'idade' => '20']; 
	$array = array_add($array, 'email', 'camila@mail.com');
	$array = array_add($array, 'amigo', 'Guilherme');
	//dd($array);
	
	// array_collapse()
	$array = [['banana', 'limao'], ['vermelho', 'azul']];
	$array = array_collapse($array);
	//dd($array);
	
	// array_divide()
	list($key, $value) = array_divide(['nome' => 'Camila', 'idade' => '20']);
	//dd($key, $value);
	
	// array_except()
	$array = ['nome' => 'Camila', 'idade' => '20'];
	$array = array_except($array, ['idade']);
	//dd($array);
	
	// base_path()
	$path = base_path('config');
	//dd($path);

	// database_path()
	$path = database_path();
	//dd($path);

	// public_path()
	$path = public_path();
	//dd($path);

	// storage_path()
	$path = storage_path();
	//dd($path);

	// camel_case()
	$text = 'Guilherme esta criando uma nova aula';
	$text = camel_case($text);
	//dd($text);

	// snake_case()
	$text = 'Guilherme esta criando uma nova aula';
	$text = snake_case($text);
	//dd($text);

	// str_limit()
	$text = 'Guilherme esta criando uma nova aula';
	$text = str_limit($text, 5);
	//dd($text);
	
   return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cliente', ['uses' => 'ClienteController@index', 'as' => 'cliente.index']);
Route::get('/cliente/adicionar', ['uses' => 'ClienteController@adicionar', 'as' => 'cliente.adicionar']);
Route::post('/cliente/salvar', ['uses' => 'ClienteController@salvar', 'as' => 'cliente.salvar']);
Route::get('/cliente/editar/{id}', ['uses' => 'ClienteController@editar', 'as' => 'cliente.editar']);
Route::put('/cliente/atualizar/{id}', ['uses' => 'ClienteController@atualizar', 'as' => 'cliente.atualizar']);
Route::get('/cliente/excluir/{id}', ['uses' => 'ClienteController@excluir', 'as' => 'cliente.excluir']);
Route::get('/cliente/detalhe/{id}', ['uses' => 'ClienteController@detalhe', 'as' => 'cliente.detalhe']);

Route::get('/telefone/adicionar/{cliente_id}', ['uses' => 'TelefoneController@adicionar', 'as' => 'telefone.adicionar']);
Route::post('/telefone/salvar/{cliente_id}', ['uses' => 'TelefoneController@salvar', 'as' => 'telefone.salvar']);
Route::get('/telefone/editar/{id}', ['uses' => 'TelefoneController@editar', 'as' => 'telefone.editar']);
Route::put('/telefone/atualizar/{id}', ['uses' => 'TelefoneController@atualizar', 'as' => 'telefone.atualizar']);
Route::get('/telefone/excluir/{id}', ['uses' => 'TelefoneController@excluir', 'as' => 'telefone.excluir']);
