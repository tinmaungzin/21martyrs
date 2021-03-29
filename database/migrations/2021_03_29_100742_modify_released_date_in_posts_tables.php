<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyReleasedDateInPostsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach (['pending_posts', 'posts'] as $table_name) {
            Schema::table($table_name, function (Blueprint $table) {
                $table->date('released_date')->nullable()->change();
            });

        };
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts_tables', function (Blueprint $table) {
            //
        });
    }
}
