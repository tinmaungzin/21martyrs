<?php

namespace Database\Seeders;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::firstOrCreate(
            ['email' => 'admin@martyrs21mm.com'], [
            'name' => 'Ko Admin',
            'password' => bcrypt(env('INITIAL_ADMIN_PASSWORD', 'password')),
        ]);
    }
}
