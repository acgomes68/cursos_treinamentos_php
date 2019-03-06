<?php

use Illuminate\Database\Seeder;

class ClientesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Cliente', 10)->create()->each(function ($cli) {
        		$cli->telefones()->save(factory('App\Telefone')->make());
        });
    }
}
