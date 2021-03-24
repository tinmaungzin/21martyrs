<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'name' => 'Yangon',
            'state_id' => 13
        ]);
        DB::table('cities')->insert([
            'name' => 'Mandalay',
            'state_id' => 12
        ]);
        DB::table('cities')->insert([
            'name' => 'Naypyidaw',
            'state_id' => 15
        ]);
        DB::table('cities')->insert([
            'name' => 'Mawlamyine',
            'state_id' => 5
        ]);
        DB::table('cities')->insert([
            'name' => '	Taunggyi',
            'state_id' => 7
        ]);
        DB::table('cities')->insert([
            'name' => 'Bago',
            'state_id' => 10
        ]);
        DB::table('cities')->insert([
            'name' => 'Monywa',
            'state_id' => 8
        ]);
        DB::table('cities')->insert([
            'name' => 'Myitkyina',
            'state_id' => 1
        ]);
        DB::table('cities')->insert([
            'name' => '	Pathein',
            'state_id' => 14
        ]);
        DB::table('cities')->insert([
            'name' => 'Sittwe',
            'state_id' => 6
        ]);
        DB::table('cities')->insert([
            'name' => 'Pyay',
            'state_id' => 10
        ]);
        DB::table('cities')->insert([
            'name' => 'Pakokku',
            'state_id' => 11
        ]);
        DB::table('cities')->insert([
            'name' => 'Myeik',
            'state_id' => 9
        ]);
        DB::table('cities')->insert([
            'name' => 'Meiktila',
            'state_id' => 12
        ]);
        DB::table('cities')->insert([
            'name' => 'Taungoo',
            'state_id' => 10
        ]);
        DB::table('cities')->insert([
            'name' => 'Myingyan',
            'state_id' => 12
        ]);
        DB::table('cities')->insert([
            'name' => 'Mogok',
            'state_id' => 12
        ]);
        DB::table('cities')->insert([
            'name' => 'Magway',
            'state_id' => 11
        ]);
        DB::table('cities')->insert([
            'name' => 'Hinthada',
            'state_id' => 14
        ]);
        DB::table('cities')->insert([
            'name' => 'Sagaing',
            'state_id' => 8
        ]);
        DB::table('cities')->insert([
            'name' => '	Thanlyin',
            'state_id' => 13
        ]);
        DB::table('cities')->insert([
            'name' => 'Dawei',
            'state_id' => 9
        ]);
        DB::table('cities')->insert([
            'name' => 'Nyaunglebin',
            'state_id' => 10
        ]);
        DB::table('cities')->insert([
            'name' => 'Shwebo',
            'state_id' => 8
        ]);
        DB::table('cities')->insert([
            'name' => 'Bhamo',
            'state_id' => 1
        ]);
        DB::table('cities')->insert([
            'name' => 'Aunglan',
            'state_id' => 11
        ]);
        DB::table('cities')->insert([
            'name' => '	Yenangyaung',
            'state_id' => 11
        ]);
        DB::table('cities')->insert([
            'name' => 'Bogale',
            'state_id' => 14
        ]);
        DB::table('cities')->insert([
            'name' => 'Minbu',
            'state_id' => 11
        ]);
        DB::table('cities')->insert([
            'name' => 'Hlegu',
            'state_id' => 13
        ]);
        DB::table('cities')->insert([
            'name' => 'Tharrawaddy',
            'state_id' => 10
        ]);
        DB::table('cities')->insert([
            'name' => 'Hakha',
            'state_id' => 4
        ]);
        DB::table('cities')->insert([
            'name' => 'Thayet',
            'state_id' => 11
        ]);




    }
}
