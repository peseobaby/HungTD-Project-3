<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Chuột fulen',
            'number' => '100',
            'store_id' => '1',
        ]);
        DB::table('products')->insert([
            'name' => 'Bàn phím',
            'number' => '100',
            'store_id' => '1',
        ]);
        DB::table('products')->insert([
            'name' => 'Màn hình',
            'number' => '100',
            'store_id' => '1',
        ]);
        DB::table('products')->insert([
            'name' => 'case',
            'number' => '100',
            'store_id' => '1',
        ]);
    }
}
