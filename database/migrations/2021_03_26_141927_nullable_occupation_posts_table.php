<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class NullableOccupationPostsTable extends Migration
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
            if (config('database.default') == 'pgsql') {
                DB::statement("ALTER TABLE {$table_name} ALTER COLUMN occupation DROP NOT NULL;");
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
