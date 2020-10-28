<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('products')->truncate();
        for ($i=1;$i<=20;$i++){


        DB::table('products')->insert(
            [
                'name' => 'sanpham'.$i,
                'status' =>$i,
            ]);
        }
    }
}
