<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'username' =>'admin',
        	'name' => 'Trần Duy Hưng',
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('123'),
        	'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'username' =>'test',
            'name' => 'Mạnh mèo',
            'email' => 'manhmeo@gmail.com',
            'password' => bcrypt('123'),
            'store_id' => '1',
        ]);
    }
}
