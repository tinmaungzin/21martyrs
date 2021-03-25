<?php

namespace Database\Seeders;

use App\Models\City;
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


        $cities = [
            [
                'name' => 'Yangon',
                'state_id' => 13
            ],
            ['name' => 'Mandalay',
                'state_id' => 12
            ],
            ['name' => 'Naypyidaw',
                'state_id' => 15
            ],
            [
                'name' => 'Mawlamyine',
                'state_id' => 5
            ],
            ['name' => '	Taunggyi',
                'state_id' => 7
            ],
            [
                'name' => 'Bago',
                'state_id' => 10
            ],
            ['name' => 'Monywa',
                'state_id' => 8
            ],
            [
                'name' => 'Myitkyina',
                'state_id' => 1
            ],
            ['name' => '	Pathein',
                'state_id' => 14
            ],
            [
                'name' => 'Sittwe',
                'state_id' => 6
            ],
            ['name' => 'Pyay',
                'state_id' => 10
            ],
            [
                'name' => 'Pakokku',
                'state_id' => 11
            ],
            ['name' => 'Myeik',
                'state_id' => 9
            ],
            [
                'name' => 'Meiktila',
                'state_id' => 12
            ],
            ['name' => 'Taungoo',
                'state_id' => 10
            ],
            [
                'name' => 'Myingyan',
                'state_id' => 12
            ],
            ['name' => 'Mogok',
                'state_id' => 12
            ],
            [
                'name' => 'Magway',
                'state_id' => 11
            ],
            ['name' => 'Hinthada',
                'state_id' => 14
            ],
            [
                'name' => 'Sagaing',
                'state_id' => 8
            ],
            ['name' => '	Thanlyin',
                'state_id' => 13
            ],
            [
                'name' => 'Dawei',
                'state_id' => 9
            ],
            ['name' => 'Nyaunglebin',
                'state_id' => 10
            ],
            [
                'name' => 'Shwebo',
                'state_id' => 8
            ],
            ['name' => 'Bhamo',
                'state_id' => 1
            ],
            [
                'name' => 'Aunglan',
                'state_id' => 11
            ],
            ['name' => '	Yenangyaung',
                'state_id' => 11
            ],
            [
                'name' => 'Bogale',
                'state_id' => 14
            ],
            ['name' => 'Minbu',
                'state_id' => 11
            ],
            [
                'name' => 'Hlegu',
                'state_id' => 13
            ],
            ['name' => 'Tharrawaddy',
                'state_id' => 10
            ],
            [
                'name' => 'Hakha',
                'state_id' => 4
            ],
            ['name' => 'Thayet',
                'state_id' => 11
            ],
        ];
        DB::transaction(function () use ($cities) {
            foreach ($cities as $city) {
                City::firstOrCreate($city);
            }
        });

    }
}
