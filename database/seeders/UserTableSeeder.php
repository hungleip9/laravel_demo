<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        for($i=1; $i<=20;$i++){
        DB::table('users')->insert([


                    'name' => 'admin'.$i,
                    'email' =>'admin2'.$i.'@gmail.com',
                    'password' => bcrypt('admin123456')


        ]);
        }
    }
}
