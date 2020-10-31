<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User_infoTabseeder extends Seeder
{

    public function run()
    {
        DB::table('user_info')->truncate();
        for ($i=1;$i<=20;$i++){


        DB::table('user_info')->insert(
            [
                'user_id' => $i,
                'fullname' => 'hung'.$i
            ]);
        }
    }

}
