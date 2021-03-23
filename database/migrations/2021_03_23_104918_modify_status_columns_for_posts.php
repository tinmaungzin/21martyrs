<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ModifyStatusColumnsForPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        foreach (['pending_posts', 'posts'] as $table_name) {
            if (config('database.default') === 'pgsql') {
                DB::transaction(function () use ($table_name) {
                    DB::statement("ALTER TABLE " . $table_name . " DROP CONSTRAINT " . $table_name . "_status_check");
                    DB::statement("ALTER TABLE " . $table_name . " ADD CONSTRAINT " . $table_name .
                        "_status_check CHECK (status::TEXT = ANY (ARRAY['detained'::CHARACTER VARYING, 'dead'::CHARACTER VARYING, 'released'::CHARACTER VARYING]::TEXT[]))");
                });
            } else {
                DB::statement("ALTER TABLE " . $table_name . " MODIFY COLUMN status ENUM('detained','dead','released')");
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
