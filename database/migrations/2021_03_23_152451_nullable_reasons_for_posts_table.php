<?php

use App\Utility\MigrationUtility;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class NullableReasonsForPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        foreach (['posts', 'pending_posts'] as $table_name) {
//            drop enum constraint if pgsql
            if (config('database.default') == 'pgsql') {
                DB::statement("ALTER TABLE " . $table_name . " DROP CONSTRAINT IF EXISTS " . $table_name . "_" . 'reason_of_arrest' . "_check");
                DB::statement("ALTER TABLE " . $table_name . " DROP CONSTRAINT IF EXISTS " . $table_name . "_" . 'reason_of_dead' . "_check");
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
