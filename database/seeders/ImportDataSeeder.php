<?php

namespace Database\Seeders;

use App\Imports\PostsImport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

//use Maatwebsite\Excel\Excel;

class ImportDataSeeder extends Seeder
{

    const DATA_FILES_AND_DIRS = [
        ['file' => 'data/death_list.xlsx', 'photos' => '/data/death_photo', 'type' => 'death'],
        ['file' => 'data/detained_list.xlsx', 'photos' => '/data/detained_photo', 'type' => 'detained']
    ];

    private function importData($fileObj)
    {
        $import = new PostsImport(Storage::disk('local')->url($fileObj['photos']), $fileObj['type']);
        Excel::import($import, $fileObj['file'], 'local');

    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach (self::DATA_FILES_AND_DIRS as $fileObj) {
            $this->importData($fileObj);
        }
    }
}
