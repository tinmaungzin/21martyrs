<?php

namespace Database\Seeders;

use App\Models\PendingPost;
use App\Models\Post;
use App\Utility\Constants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FixEnumSeeder extends Seeder
{

    private function fixEnum($models)
    {
        foreach ($models as $model) {
            echo "Seeding no: {$model->id} \n";
            $model->gender = in_array(strtolower($model->gender), Constants::GENDER_ENUM) ? strtolower($model->gender) : 'other';
            $model->occupation = in_array(strtolower($model->occupation), Constants::OCCUPATIONS_ENUM) ? strtolower($model->occupation) : null;
        }
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::transaction(function () {
            echo "===> Seeding posts.\n";
            $this->fixEnum(Post::all());
            echo "===> Seeding penidng posts.\n";
            $this->fixEnum(PendingPost::all());
        });
    }
}
