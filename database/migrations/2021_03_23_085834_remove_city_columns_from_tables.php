<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveCityColumnsFromTables extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach (['posts', 'pending_posts'] as $table_name) {
            Schema::table($table_name, function (Blueprint $table) {
                $table->dropForeign(['city_id']);
                $table->dropColumn('city_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach (['posts', 'pending_posts'] as $table_name) {
            Schema::table($table_name, function (Blueprint $table) {
                $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
            });
        }
    }
}
