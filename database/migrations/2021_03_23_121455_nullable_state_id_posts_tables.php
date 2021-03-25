<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NullableStateIdPostsTables extends Migration
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
            Schema::table($table_name, function (Blueprint $table) {
                $table->foreignId('state_id')->nullable()->change();
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
        //
        foreach (['pending_posts', 'posts'] as $table_name) {
            Schema::table($table_name, function (Blueprint $table) {
//                $table->dropForeign(['state_id']);
//                $table->dropColumn('state_id');
                $table->foreignId('state_id')->change();
            });
        }
    }
}
