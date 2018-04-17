<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
     public function run()
    {
        Eloquent::unguard();    
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $tabelas = DB::select('SHOW TABLES');
        $nomeDB = env('DB_DATABASE');
        $campoNomeTabela = "Tables_in_".$nomeDB;
        foreach($tabelas as $tabela):
            if ($tabela->{$campoNomeTabela} != 'migrations')
                DB::table($tabela->{$campoNomeTabela})->truncate();
        endforeach;
        $this->call('usersSeed');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}


class usersSeed extends Seeder 
{
    public function run()
    {
      	DB::table('users')->insert([
            'name' => "ERP Copy Supply",
            'secret_id' => uniqid(),
            'secret_password' => uniqid()
        ]);
    }
}
