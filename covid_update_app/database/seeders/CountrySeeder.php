<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('country')->insert([
            'country_name' => 'Afghanistan'
        ]);

        DB::table('country')->insert([
            'country_name' => 'India'
        ]);
        DB::table('country')->insert([
            'country_name' => 'Kazaksthan'
        ]);
        DB::table('country')->insert([
            'country_name' => 'Tajikisthan'
        ]);
        DB::table('country')->insert([
            'country_name' => 'Georgia'
        ]);
        DB::table('country')->insert([
            'country_name' => 'Pakistan'
        ]);
        DB::table('country')->insert([
            'country_name' => 'Srilanka'
        ]);
        DB::table('country')->insert([
            'country_name' => 'Nepal'
        ]);
        DB::table('country')->insert([
            'country_name' => 'Bangladesh'
        ]);
    }
}
