<?php

namespace Database\Seeders;

use App\Models\State;
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
        $states = [
            [
                'name' => 'Kachin',
            ],
            [
                'name' => 'Kayah',
            ],
            [
                'name' => 'Kayin',
            ],
            [
                'name' => 'Chin',
            ],
            [
                'name' => 'Mon',
            ],
            [
                'name' => 'Rakhine',
            ],
            [
                'name' => 'Shan',
            ],
            [
                'name' => 'Sagaing',
            ],
            [
                'name' => 'Tanintharyi',
            ],
            [
                'name' => 'Bago',
            ],
            [
                'name' => 'Magway',
            ],
            [
                'name' => 'Mandalay',
            ],
            [
                'name' => 'Yangon',
            ],
            [
                'name' => 'Ayeyarwady',
            ],
            [
                'name' => 'Naypyidaw',
            ],
        ];
        DB::transaction(function () use ($states) {
            foreach ($states as $state) {
                State::firstOrCreate($state);
            }
        });
    }
}
