<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            'name' => 'Kachin',
        ]);
        DB::table('states')->insert([
            'name' => 'Kayah',
        ]);
        DB::table('states')->insert([
            'name' => 'Kayin',
        ]);
        DB::table('states')->insert([
            'name' => 'Chin',
        ]);
        DB::table('states')->insert([
            'name' => 'Mon',
        ]);
        DB::table('states')->insert([
            'name' => 'Rakhine',
        ]);
        DB::table('states')->insert([
            'name' => 'Shan',
        ]);
        DB::table('states')->insert([
            'name' => 'Sagaing',
        ]);
        DB::table('states')->insert([
            'name' => 'Tanintharyi',
        ]);
        DB::table('states')->insert([
            'name' => 'Bago',
        ]);
        DB::table('states')->insert([
            'name' => 'Magway',
        ]);
        DB::table('states')->insert([
            'name' => 'Mandalay',
        ]);
        DB::table('states')->insert([
            'name' => 'Yangon',
        ]);
        DB::table('states')->insert([
            'name' => 'Ayeyarwady',
        ]);
        DB::table('states')->insert([
            'name' => 'Naypyidaw',
        ]);

    }
}
