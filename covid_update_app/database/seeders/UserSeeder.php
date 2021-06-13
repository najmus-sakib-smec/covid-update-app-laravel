<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Md.Istyeak Hossain ',
            'email' => 'istyeak.hossain@smec.com',
            'password' => bcrypt('admin@8242')
        ]);

        DB::table('users')->insert([
            'name' => 'Syed Islam',
            'email' => 'syed.islam@smec.com',
            'password' => bcrypt('admin@5868')
        ]);
    }
}
