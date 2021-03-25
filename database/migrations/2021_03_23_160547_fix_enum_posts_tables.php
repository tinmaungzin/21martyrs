<?php

use App\Utility\MigrationUtility;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixEnumPostsTables extends Migration
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
            Schema::disableForeignKeyConstraints();
            MigrationUtility::modifyEnum($table_name, 'gender', ['male', 'female', 'other']);
            MigrationUtility::modifyEnum($table_name, 'occupation',
                ['student', 'cdm staff', 'government official', strtolower('Political Party Member'),
                    strtolower('Journalist'), strtolower('Civilian'), strtolower('Other'), null]);
            Schema::enableForeignKeyConstraints();
//            Schema::table($table_name, function (Blueprint $table) {
//            })
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
