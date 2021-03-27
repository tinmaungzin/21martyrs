<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stats', function (Blueprint $table) {
            $table->dropColumn('today_dead');
            $table->dropColumn('today_detained');
            $table->dropColumn('today_hurt');
            $table->dropColumn('total_dead');
            $table->dropColumn('total_detained');
            $table->dropColumn('total_hurt');
            $table->double('total_death')->default(0);
            $table->double('headshot')->default(0);
            $table->double('gunshot')->default(0);
            $table->double('assault')->default(0);
            $table->double('abducted')->default(0);
            $table->double('released')->default(0);
        });
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
