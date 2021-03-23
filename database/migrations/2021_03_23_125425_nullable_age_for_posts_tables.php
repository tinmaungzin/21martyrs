<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NullableAgeForPostsTables extends Migration
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
            Schema::table($table_name, function (Blueprint $table) {
                $table->integer('age')->nullable()->change();
            });
        }
    }

    /**
     * Reverse the migrations.

     * @return void
     */
    public function down()
    {
        //
        foreach (['posts', 'pending_posts'] as $table_name) {
            Schema::table($table_name, function (Blueprint $table) {
                $table->integer('age')->change();
            });

        }
    }
}
