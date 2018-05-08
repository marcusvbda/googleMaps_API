<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table("users")->truncate();
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
